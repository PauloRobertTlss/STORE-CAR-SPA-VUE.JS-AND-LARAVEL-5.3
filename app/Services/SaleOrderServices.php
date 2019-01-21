<?php
/**
 * Created by PhpStorm.
 * User: Paulo
 * Date: 21/01/2019
 * Time: 14:22
 */

namespace StoreTI\Services;



use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use StoreTI\Repositories\Interfaces\CustomerRepository;
use StoreTI\Repositories\Interfaces\SaleOrderRepository;
use StoreTI\Validators\AddressValidator;
use StoreTI\Validators\ClientValidator;
use StoreTI\Validators\ContactValidator;

/**
 * Centralização das Regras de Negócio de Vendas
 * Class SaleOrderServices
 * @package StoreTI\Services
 */
class SaleOrderServices
{

    /**
     * @var SaleOrderRepository
     */
    private $orderRepository;
    /**
     * @var CustomerRepository
     */
    private $customerRepository;
    /**
     * @var ClientValidator
     */
    private $clientValidator;
    /**
     * @var AddressValidator
     */
    private $addressValidator;
    /**
     * @var ContactValidator
     */
    private $contactValidator;

    public function __construct(SaleOrderRepository $orderRepository, CustomerRepository $customerRepository,ClientValidator $clientValidator,AddressValidator $addressValidator,ContactValidator $contactValidator)
    {
        $this->orderRepository = $orderRepository;
        $this->customerRepository = $customerRepository;
        $this->clientValidator = $clientValidator;
        $this->addressValidator = $addressValidator;
        $this->contactValidator = $contactValidator;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(array $data)
    {

        /*
         * * - Validação
         * 1 - Cadastrar client
         * 2 - Cadastrar imóvel
         * 3 - Efetivar Pedido de Venda
         * 4 - ...
         */
            if(!isset($data['customer']) || !isset($data['address']) || !isset($data['lines'])){
                return response()->json(['sale'=> 'unprocessable sale' ],422);
            }

            $customer = $data['customer'];
            $address = $data['address'];
            $lines = $data['lines'];

            unset($data);
                try {
                    $this->clientValidator->with($customer)->passesOrFail(ValidatorInterface::RULE_CREATE);
                } catch (ValidatorException  $e) {
                    return response()->json(['error' => true, 'message' => $e->getMessageBag()],422);
                }

                try {
                    $this->addressValidator->with($address)->passesOrFail(ValidatorInterface::RULE_CREATE);
                } catch (ValidatorException  $e) {
                    return response()->json(['error' => true, 'message' => $e->getMessageBag()],422);
                }

                if(count($lines) == 0){
                    return response()->json(['error' => true, 'message' => 'unprocessable sale'],422);
                }


            $client = $this->customerRepository->skipPresenter()->create(['name'=>$customer['name']]);
            $client->contacts()->create(['contact'=>$customer['contact']]);
            $client->contacts()->create(['contact'=>$customer['email']]);

            $address = $client->addresses()->create($address);
            $sale = $client->sales()->create(['address_id'=>$address->id]);

            unset($address);
            unset($client);
            unset($customer);

            $sale = $this->orderRepository->skipPresenter()->find($sale->id);

            foreach ($lines as $line){
                $sale->lines()->create($line);
            }

            return response()->json(['sale'=>'Success! sale processed'],200);


    }

}