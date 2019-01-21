<?php

namespace StoreTI\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use StoreTI\Criteria\FindByColumnEqualCriteria;
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
        $search = $request->get($searchParam);
        $field = explode('-',$search);
        $this->productRepository->popCriteria(RequestCriteria::class);
        $this->productRepository->popCriteria(FindByColumnEqualCriteria::class);

        //return response()->json($field,422);
        switch (count($field)){
            case 2:{
                list($field,$search_id) = $field;
                $this->productRepository->pushCriteria(new FindByColumnEqualCriteria($search_id, $field));
                break;
            }
            default:
                $this->productRepository->pushCriteria(app(RequestCriteria::class));
        }


        return $this->productRepository->paginate($limit);
    }
    

    public function show($id){
        $this->productRepository->setPresenter(ProductDetailsPresenter::class);
        return $this->productRepository->find($id);
    }
    

    
}
