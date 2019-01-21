<?php
/**
 * Created by PhpStorm.
 * User: Paulo
 * Date: 21/01/2019
 * Time: 14:22
 */

namespace StoreTI\Services;


use StoreTI\Repositories\Interfaces\CustomerRepository;
use StoreTI\Repositories\Interfaces\SaleOrderRepository;

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

    public function __construct(SaleOrderRepository $orderRepository, CustomerRepository $customerRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->customerRepository = $customerRepository;
    }


    public function create(array $data)
    {

        /*
         * cadastrar client
         */

        /**
         * cadastrar imóvel
         */


        /**
         * Efetivar Pedido de Venda
         */

    }

}