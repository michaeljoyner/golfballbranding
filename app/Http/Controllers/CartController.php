<?php

namespace App\Http\Controllers;

use App\Stock\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    public function add($itemId)
    {
        $product = Product::findOrFail($itemId);
        Cart::add($product->id, $product->name, 1, 0.00, []);

        return response()->json([
            'id' => $product->id,
            'name' => $product->name
        ]);
    }

    public function remove($itemId)
    {
        $id = intval($itemId);

        $item = Cart::search(function($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        })->first();
        Cart::remove($item->rowId);


        return response()->json([
            'id' => $item->id,
            'name' => $item->name
        ]);
    }

    public function getContents(Request $request, $timestamp)
    {
        if(! $request->ajax()) {
            return response('invalid request', 403);
        }

        $items = [];

        $contents = Cart::content();
        foreach($contents as $item) {
            $items[] = $item;
        }

        return response()->json($items);
    }

    public function viewCart()
    {
        $contents = Cart::content();

        return view('front.testcheckout')->with(compact('contents'));
    }

    public function destroy(Request $request)
    {
        Cart::destroy();

        if($request->ajax()) {
            return response()->json('ok');
        }

        return redirect()->to('/checkout');
    }
}
