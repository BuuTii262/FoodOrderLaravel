<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Cart;


// use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;

class CartController extends Controller
{
    public function insert(Request $request)
    {
        $food = Food::where('uuid',$request->food_id)->first();

        Cart::add([
            'id' => $request->food_id,
            'qty' => $request->qty,
            'name' => $food->name,
            'price' => $food->price,
            'weight' => 50,
            'options' => 
            [
                'food_image' => $food->food_image,
                
            ],
        ]);
        // dd('ok');

        return redirect()->route('cart_show');

    }

    public function show()
    {
        $cartfoods = Cart::content();
        // return $cartfoods;
        return view('front.cart.show', compact('cartfoods'));
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);

        return back();
    }

    public function update(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
        return back();
    }
}
