<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{

    public function index()
    {

        $cart = session()->get('cart', []);

        return view('cart', compact('cart'));
    }


    public function add($id)
    {

        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;
        } else {

            $cart[$id] = [

                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1

            ];
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }



    public function remove($id)
    {

        $cart = session()->get('cart', []);

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        echo ($total);

        return redirect()->back();
    }
}
