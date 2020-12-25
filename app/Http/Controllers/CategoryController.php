<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index($id)
    {
        $category = SubCategory::where('id',$id)->first();

        if ($category)
        {
            $products = Product::where('sub_cat_id',$id)->paginate(12);

            return view('categories.category',compact('products','category'));
        }
        return 'Page Not Found!';

    }

}
