<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view('app.categories.index', compact('categories', 'search'));
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Category::class);

        return view('app.categories.create');
    }

    /**
     * @param \App\Http\Requests\CategoryStoreRequest $request
     * @return Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $this->authorize('create', Category::class);

        $validated = $request->validated();

        $category = Category::create($validated);

        return redirect()
            ->route('categories.edit', $category)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param Request $request
     * @param \App\Models\Category $category
     * @return Response
     */
    public function show(Request $request, Category $category)
    {
        $this->authorize('view', $category);

        return view('app.categories.show', compact('category'));
    }

    /**
     * @param Request $request
     * @param \App\Models\Category $category
     * @return Response
     */
    public function edit(Request $request, Category $category)
    {
        $this->authorize('update', $category);

        return view('app.categories.edit', compact('category'));
    }

    /**
     * @param \App\Http\Requests\CategoryUpdateRequest $request
     * @param \App\Models\Category $category
     * @return Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $this->authorize('update', $category);

        $validated = $request->validated();

        $category->update($validated);

        return redirect()
            ->route('categories.edit', $category)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param Request $request
     * @param \App\Models\Category $category
     * @return Response
     */
    public function destroy(Request $request, Category $category)
    {
        $this->authorize('delete', $category);

        $category->delete();

        return redirect()
            ->route('categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
