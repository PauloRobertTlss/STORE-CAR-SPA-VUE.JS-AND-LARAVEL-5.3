<?php

namespace StoreTI\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use StoreTI\Http\Controllers\Controller;
use Prettus\Repository\Criteria\RequestCriteria;
use StoreTI\Presenters\ProductDetailsPresenter;
use StoreTI\Repositories\Interfaces\ProductRepository;

class ProductsController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;


    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    
    public function index(Request $request)
    {

        $limit = $request->query->get('limit',10);
        $searchParam = config('repository.criteria.params.search');

        $this->productRepository->pushCriteria(app(RequestCriteria::class));
        return $this->productRepository->paginate($limit);
    }
    

    public function show($id){
        $this->productRepository->setPresenter(ProductDetailsPresenter::class);
        return $this->productRepository->find($id);
    }
    

    
}
