<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function categories()
    {
        $categories = Category::get();
        return view('admin.cats.index',compact('categories'));
    }

    public function products()
    {
        $products = Product::get();
        return view('admin.products.index',compact('products'));
    }

    public function orders()
    {
        $orders = Order::get();
        return view('admin.orders.index',compact('orders'));
    }

    public function add_products()
    {
        $cats = SubCategory::get();

        return view('admin.products.add',compact('cats'));
    }

    public function save_product(Request $request): \Illuminate\Http\RedirectResponse
    {
        if ($request->name)
        {
            $product = new Product();
            $product->name        = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->sub_cat_id = $request->sub_cat_id;
            $product->img = $request->image ? $request->image->store('product_image') : null;

            $product->save();
        }

        return redirect()->back();
    }
    public function sub_categories($id)
    {
        $categories = SubCategory::where('cat_id',$id)->get();
        return view('admin.cats.sub',compact('categories','id'));
    }

    public function add_categories()
    {

        return view('admin.cats.add');
    }

    public function add_sub_categories($id)
    {

        return view('admin.cats.add_sub',compact('id'));
    }

    public function save_categories(Request $request): \Illuminate\Http\RedirectResponse
    {
        if ($request->name)
        {
            $category = new Category();
            $category->name        = $request->name;
            $category->description = $request->description;
            $category->save();
        }

        return redirect()->back();
    }

    public function save_sub_categories(Request $request): \Illuminate\Http\RedirectResponse
    {
        if ($request->name)
        {
            $category = new SubCategory();
            $category->name        = $request->name;
            $category->description = $request->description;
            $category->cat_id = $request->cat_id;
            $category->save();
        }

        return redirect()->back();
    }
}
