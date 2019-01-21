<?php

namespace StoreTI\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use StoreTI\Http\Controllers\Controller;
use Prettus\Repository\Criteria\RequestCriteria;
use StoreTI\Presenters\ProductDetailsPresenter;
use StoreTI\Repositories\Interfaces\ProductRepository;
use StoreTI\Repositories\Interfaces\SaleOrderRepository;

class SaleOrdersController extends Controller
{


    /**
     * @var SaleOrderRepository
     */
    private $orderRepository;

    public function __construct(SaleOrderRepository $orderRepository)
    {

        $this->orderRepository = $orderRepository;
    }
    

    

    public function store(Request $request){

        $data = $request->all();
        return $this->productRepository->find($id);
    }
    

    
}
