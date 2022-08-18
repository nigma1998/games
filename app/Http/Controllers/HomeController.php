<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    //  $newList = Cart::select(Cart::$allowedFields)->get();
    //  $yonList = Cart::select(Cart::$yonListt)->get();
        return view('home',
        [//'newList' => $newList,
      //    'lad' => 'ghjdthrf'
      ]);
    }
}
