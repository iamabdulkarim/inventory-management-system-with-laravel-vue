<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CardController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        $data = array();
        $data['pro_id'] = $id;
        $data['pro_name'] = $product->product_name;
        $data['pro_quantity'] = 1;
        $data['product_price'] = $product->selling_price;
        $data['sub_total'] = $product->selling_price;

        DB::table('pos')->insert($data);
    }

    public function CartProduct()
    {
        $cart = DB::table('pos')->get();
        return response()->json($cart);
    }

    public function RemoveCart($id)
    {
        DB::table('pos')->where('id', $id)->delete();
        return response('Done');
    }
}