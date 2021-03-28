<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartCollection;
use App\Http\Requests\CartStoreRequest;
use App\Http\Requests\CartUpdateRequest;
use Illuminate\Http\Response;

class CartController extends Controller
{
    /**
     * @param Request $request
     * @return CartCollection
     * @throws AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Cart::class);

        $search = $request->get('search', '');

        $carts = Cart::search($search)
            ->latest()
            ->paginate();

        return new CartCollection($carts);
    }

    /**
     * @param CartStoreRequest $request
     * @return CartResource
     * @throws AuthorizationException
     */
    public function store(CartStoreRequest $request)
    {
        $this->authorize('create', Cart::class);

        $validated = $request->getFormData();
        $validated['identifier'] =  $request->cookie('cart_identifier');

        $cart = Cart::create($validated);

        return new CartResource($cart);
    }

    /**
     * @param Request $request
     * @param Cart $cart
     * @return CartResource
     * @throws AuthorizationException
     */
    public function show(Request $request, Cart $cart)
    {
        $this->authorize('view', $cart);

       $cart_identifier = $request->cookie('cart_identifier');

        $userCart = Cart::where('identifier', $cart_identifier)->get();

        return new CartResource($userCart);
    }

    /**
     * @param CartUpdateRequest $request
     * @param Cart $cart
     * @return CartResource
     * @throws AuthorizationException
     */
    public function update(CartUpdateRequest $request, Cart $cart)
    {
        $this->authorize('update', $cart);

        $validated = $request->validated();

        $cart->update($validated);

        return new CartResource($cart);
    }

    /**
     * @param Request $request
     * @param Cart $cart
     * @return Response
     * @throws AuthorizationException
     */
    public function destroy(Request $request, Cart $cart)
    {
        $this->authorize('delete', $cart);

        $cart->delete();

        return response()->noContent();
    }
}
