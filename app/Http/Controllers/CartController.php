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
        # code...

        return redirect()->route('cart.view');
    }

    public function update($id)
    {
        $quantity = request('quantity', 1);



        return redirect()->route('cart.view');

        # code...
    }

    public function clear()
    {
        # code...


        return redirect()->route('cart.view');
    }
}
