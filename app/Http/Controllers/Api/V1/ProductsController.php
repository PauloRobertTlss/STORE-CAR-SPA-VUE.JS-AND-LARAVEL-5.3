<?php

namespace StoreTI\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use StoreTI\Http\Controllers\Controller;
use Prettus\productRepository\Criteria\RequestCriteria;
use StoreTI\Repositories\Interfaces\ProductproductRepository;

class DepartmentsController extends Controller
{
    private $productRepository;
    /**
     * @var ProductproductRepository
     */
    private $productproductRepository;


    public function __construct(ProductproductRepository $productproductRepository)
    {

        $this->productproductRepository = $productproductRepository;
    }
    
    public function index(Request $request)
    {

        $limit = $request->query->get('limit',10);
        $searchParam = config('productRepository.criteria.params.search');

        $this->productRepository->pushCriteria(app(RequestCriteria::class));
        return $this->productRepository->paginate($limit);
    }
    

    public function show($id){
        
        return $this->productRepository->find($id);
    }
    

    
}
