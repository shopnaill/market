<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
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

    public function order_some()
    {

         if (session('cart'))
         {
             $cart = session('cart');
             return view('products.order_some',compact('cart'));
         }

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

    public function cart()
    {
        return view('products.cart');
    }


    public function addToCart($id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::where('id',$id)->first();
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "product_id" => $product->id,
                    "price" => $product->price,
                    "photo" => $product->img
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "product_id" => $product->id,
            "price" => $product->price,
            "photo" => $product->img
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function create_order_item(Request $request): \Illuminate\Http\RedirectResponse
    {
      //  $product = Product::where('id',$id)->first();


            $order = new Order();
            $order->product_id = null;
            $order->user_id = Auth::user()->id;
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->quantity = null;
            $order->save();

            foreach (session('cart') as $cart)
            {
                $order_item = new OrderItem();
                $order_item->product_id = $cart['product_id'];
                $order_item->quantity   = $cart['quantity'];
                $order_item->order_id = $order->id;
                $order_item->user_id = Auth::user()->id;
                $order_item->save();

            }


        return   redirect()->route('success');
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
            $order->quantity = null;
            $order->save();

            $order_item = new OrderItem();
            $order_item->product_id = $id;
            $order_item->quantity   = $request->quantity;
            $order_item->order_id = $order->id;
            $order_item->user_id = Auth::user()->id;
            $order_item->save();


        }

        return   redirect()->route('success');
    }
}
