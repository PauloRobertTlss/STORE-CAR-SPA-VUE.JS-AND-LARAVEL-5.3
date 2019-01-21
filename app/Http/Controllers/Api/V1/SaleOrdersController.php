<?php

namespace StoreTI\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use StoreTI\Http\Controllers\Controller;
use Prettus\Repository\Criteria\RequestCriteria;
use StoreTI\Presenters\ProductDetailsPresenter;
use StoreTI\Repositories\Interfaces\ProductRepository;
use StoreTI\Repositories\Interfaces\SaleOrderRepository;
use StoreTI\Services\SaleOrderServices;

class SaleOrdersController extends Controller
{
    /**
     * @var SaleOrderServices
     */
    private $services;
    /**
     * @var SaleOrderRepository
     */
    private $orderRepository;

    public function __construct(SaleOrderRepository $orderRepository,SaleOrderServices $orderServices)
    {
        $this->services = $orderServices;
        $this->orderRepository = $orderRepository;
    }

    public function index(Request $request){

        $limit = $request->query->get('limit',10);
        $this->orderRepository->pushCriteria(app(RequestCriteria::class));
        return $this->orderRepository->paginate($limit);

    }


    public function store(Request $request){
        $data = $request->all();
        return $this->services->create($data);
    }
    

    
}
