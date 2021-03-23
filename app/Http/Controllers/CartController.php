<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Requests\CartStoreRequest;
use App\Http\Requests\CartUpdateRequest;

class CartController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Cart::class);

        $search = $request->get('search', '');

        $carts = Cart::search($search)
            ->latest()
            ->paginate(5);

        return view('app.carts.index', compact('carts', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Cart::class);

        return view('app.carts.create');
    }

    /**
     * @param \App\Http\Requests\CartStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartStoreRequest $request)
    {
        $this->authorize('create', Cart::class);

        $validated = $request->validated();

        $cart = Cart::create($validated);

        return redirect()
            ->route('carts.edit', $cart)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Cart $cart)
    {
        $this->authorize('view', $cart);

        return view('app.carts.show', compact('cart'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Cart $cart)
    {
        $this->authorize('update', $cart);

        return view('app.carts.edit', compact('cart'));
    }

    /**
     * @param \App\Http\Requests\CartUpdateRequest $request
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(CartUpdateRequest $request, Cart $cart)
    {
        $this->authorize('update', $cart);

        $validated = $request->validated();

        $cart->update($validated);

        return redirect()
            ->route('carts.edit', $cart)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cart $cart)
    {
        $this->authorize('delete', $cart);

        $cart->delete();

        return redirect()
            ->route('carts.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
