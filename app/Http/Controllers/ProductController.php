<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{

    public function index($id)
    {
        $product = Product::where('id',$id)->first();

       return view('products.product',compact('product'));
    }


    public function order($id)
    {
        $product = Product::where('id',$id)->first();

        return view('products.order',compact('product'));
    }

    public function search(Request $request)
    {

        if (!empty($request->keyword))
        {
            $keyword = $request->keyword;
            $products = Product::where('name','like','%'.$request->keyword.'%')->paginate(12);

            return view('products.search',compact('products','keyword'));
        }
    }

    public function create_order(Request $request,$id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::where('id',$id)->first();

        if ($product)
        {
            $order = new Order();
            $order->product_id = $id;
            $order->user_id = Auth::user()->id;
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->quantity = $request->quantity;
            $order->save();

        }

        return   redirect()->route('success');
    }

}
