<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function view()
    {
        $carts = session('cart') ? session('cart') : [];
        // dd ($carts);
        return view('cart-view', compact('carts'));
    }

    public function add(Product $product)
    {
        $carts = session('cart') ? session('cart') : [];

        $quantity = request('quantity', 1);

        if (isset($carts[$product->id])) {

            $carts[$product->id]->quantity += $quantity;

        } else {
            $cart_item = (object)[
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->sale_price > 0 ? $product->sale_price : $product->price,
                'quantity' => $quantity,
            ];
    
            $carts[$product->id] = $cart_item;
        }
        // lưu session
        session(['cart' => $carts]);
        // dd ($carts);
        return redirect()->route('cart.view');
    }

    public function remove($id)
    {
    
        $carts = session('cart') ? session('cart') : [];
        unset($carts[$id]);
        session(['cart' => $carts]);

        return redirect()->route('cart.view');
    }

    public function update($id)
    {
        $carts = session('cart') ? session('cart') : [];

        $quantity = request('quantity', 1);
        $quantity = $quantity > 0 ? (int) $quantity : 1;
        if (isset($carts[$id])) {

            $carts[$id]->quantity = $quantity;

        }
        session(['cart' => $carts]);
        return redirect()->route('cart.view');

        # code...
    }

    public function clear()
    {
        // session()-forget('cart');
        session(['cart' => null]);
        return redirect()->route('cart.view');
    }
}
