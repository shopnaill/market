<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
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
        $orders = Order::where('user_id',Auth::user()->id)->get();

        return view('user.profile',compact('orders'));
    }


}
