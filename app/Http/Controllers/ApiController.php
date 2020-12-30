<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Response;

class ApiController extends Controller
{
    //  For All Products At the Home

    public function categories()
    {
        $categories = Category::get();
        $sub_categories = SubCategory::get();

        return Response::json(array(
            'categories' => $categories,
            'sub categories' => $sub_categories,
            "success" => 1,
            "state" => 1,
        ));
    }

    public function products()
    {
        $products = Product::get();

        return Response::json(array(
            'products' => $products,
            "success" => 1,
            "state" => 1,
        ));
    }

    public function products_category($id): string
    {
        $category = SubCategory::where('id',$id)->first();

        if ($category)
        {
            $products = Product::where('sub_cat_id',$id)->get();

            return Response::json(array(
                'products' => $products,
                'category' => $category,
                "success" => 1,
                "state" => 1,
            ));
        }
        return 'Page Not Found!';

    }

    public function product($id)
    {
        $product = Product::where('id',$id)->first();

        return Response::json(array(
            'product' => $product,
            "success" => 1,
            "state" => 1,
        ));
    }


    public function profile($id)
    {
        $user = User::where('id',$id)->first();
        $orders = Order::where('user_id',$user->id)->get();

        return Response::json(array(
            'user' => $user,
            'orders' => $orders,
            "success" => 1,
            "state" => 1,
        ));
    }

    public function create_order(Request $request,$id,$user)
    {


        $product = Product::where('id',$id)->first();
        $user = User::where('id',$user)->first();

        if ($product)
        {
            $order = new Order();

            $order->product_id = $id;
            $order->user_id = $user->id;
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->quantity = $request->quantity;
            $order->save();

            if ($order)
            {
                return Response::json(array(
                    'order' => $order,
                    "success" => 1,
                    "state" => 1,
                ));

            }else
            {
                return Response::json(array(
                    'order' => $order,
                    "success" => 0,
                    "state" => 0,
                ));
            }

        }


    }

    public function search(Request $request)
    {

        if (!empty($request->keyword))
        {
            $keyword = $request->keyword;
            $products = Product::where('name','like','%'.$request->keyword.'%')->get();

            return Response::json(array(
                'products' => $products,
                'keyword' => $keyword,
                "success" => 1,
                "state" => 1,
            ));
        }
    }


    public function login (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                return Response::json(array(
                    'user' => $user,
                    "success" => 1,
                    "state" => 1,
                ));
            } else {
                return Response::json(array(
                    "success" => 0,
                    "state" => 5 , // Password miss match
                ));
            }
        } else {

            return Response::json(array(
                "success" => 0,
                "state" => 6 , // User does not exist
            ));
        }
    }

    public function register (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails())
        {
          //  return response(['errors'=>$validator->errors()->all()], 422);

            return Response::json(array(
                "success" => 0,
                "state" => 7 , // Check the inputs
            ));
        }
        $request['password']=Hash::make($request['password']);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return Response::json(array(
            'user' => $user,
            "success" => 1,
            "state" => 1,
        ));
    }

}
