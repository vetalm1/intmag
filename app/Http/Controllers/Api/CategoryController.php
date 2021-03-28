<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @throws AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Category::class);

        $search = $request->get('search', '');

        $categories = Category::search($search)
            ->latest()
            ->paginate();

        return new CategoryCollection($categories);
    }

    public function tree()
    {
        $categories = Category::all()->toArray();


        return $this->makeTree($categories);
        //return new CategoryCollection($categories);
    }


    public function makeTree($arr, $parent_id=0, $tree=[])
    {
        foreach ($arr as $item){
            if ($item['parent_id'] ===$parent_id) {

                $child = $this->makeTree($arr, $item['id']);

                $tree[$item['id']] = [$item];

                !empty($child)
                    ? $tree[$item['id']][] = $child
                    : '';
            }
        }
        return $tree;
    }

    /**
     * @param CategoryStoreRequest $request
     * @return CategoryResource
     * @throws AuthorizationException
     */
    public function store(CategoryStoreRequest $request)
    {
        $this->authorize('create', Category::class);

        $validated = $request->validated();

        $category = Category::create($validated);

        return new CategoryResource($category);
    }

    /**
     * @param Request $request
     * @param \App\Models\Category $category
     * @return Response
     * @throws AuthorizationException
     */
    public function show(Request $request, Category $category)
    {
        $this->authorize('view', $category);

        return new CategoryResource($category);
    }

    /**
     * @param \App\Http\Requests\CategoryUpdateRequest $request
     * @param \App\Models\Category $category
     * @return Response
     * @throws AuthorizationException
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $this->authorize('update', $category);

        $validated = $request->validated();

        $category->update($validated);

        return new CategoryResource($category);
    }

    /**
     * @param Request $request
     * @param \App\Models\Category $category
     * @return Response
     * @throws AuthorizationException
     */
    public function destroy(Request $request, Category $category)
    {
        $this->authorize('delete', $category);

        $category->delete();

        return response()->noContent();
    }
}
