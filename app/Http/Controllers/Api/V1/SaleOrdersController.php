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

    public function __construct(SaleOrderServices $orderServices)
    {
        $this->services = $orderServices;
    }
    

    public function store(Request $request){
        $data = $request->all();
        return $this->services->create($data);
    }
    

    
}
