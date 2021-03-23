<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * @param Request $request
     * @return ProductCollection
     * @throws AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Product::class);

        $search = $request->get('search', '');

        $products = Product::search($search)
            ->latest()
            ->paginate();

        return new ProductCollection($products);
    }

    /**
     * @param ProductStoreRequest $request
     * @return ProductResource
     * @throws AuthorizationException
     */
    public function store(ProductStoreRequest $request)
    {
        $this->authorize('create', Product::class);

        $validated = $request->validated();

        $product = Product::create($validated);

        return new ProductResource($product);
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return ProductResource
     * @throws AuthorizationException
     */
    public function show(Request $request, Product $product)
    {
        $this->authorize('view', $product);

        return new ProductResource($product);
    }

    /**
     * @param ProductUpdateRequest $request
     * @param Product $product
     * @return ProductResource
     * @throws AuthorizationException
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $this->authorize('update', $product);

        $validated = $request->validated();

        $product->update($validated);

        return new ProductResource($product);
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return Response
     */
    public function destroy(Request $request, Product $product)
    {
        $this->authorize('delete', $product);

        $product->delete();

        return response()->noContent();
    }
}
