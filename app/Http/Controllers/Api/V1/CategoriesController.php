<?php

namespace StoreTI\Http\Controllers\Api\V1;



use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use StoreTI\Http\Controllers\Controller;
use StoreTI\Repositories\Interfaces\CategoryRepository;


class CategoriesController extends Controller
{

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request){

        $limit = $request->query->get('limit',10);
        $searchParam = config('repository.criteria.params.search');

        $this->categoryRepository->pushCriteria(app(RequestCriteria::class));
        return $this->categoryRepository->paginate($limit);

    }

}
