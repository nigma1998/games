<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Images;
use App\Models\Schablon;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $schablon = Schablon::select(Schablon::$yonListt)->get();

      $user = Auth::user()->name;
    //  $npsList = Cart::select(Cart::$yonListt)->where($user, '=', 'user')->get();
      $userList =  DB::table('cart')->where('user', $user)->get();
        return view('gem.cart', [
          'laf' => $userList,
          'has' => $schablon,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validated = $request->validate([
        'user' => ['required', 'string']
      ]);

      $data = $request->only(['user']);
      $userList = Cart::create($data);


      if($userList){
        return redirect()->route('gem.gem.index')->with('success', 'камера успешно куплена');
      }

      return back()->withInput()->with('error', 'Не удолось купить камеру');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Cart $gem
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $gem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Cart $gem
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $gem)
    {

      $sList = Images::select(Images::$allowedFields)->get();

    //  dd($sList);
      return view('gem.edit',[
          'lis' => $gem,
          'npsListt' => $sList
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Cart $gem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $gem)
    {
    //  $sList = Images::select(Images::$allowedFields)->get();

      $request->validate([
        'product_name' => ['required', 'string']
      ]);




    //  $gem = $request->except(['product_name', 'price', 'exxp', 'image_url']);

    //  $gem = $gem->fill($request->only(['product_name', 'price', 'exxp', 'image_url']));

    $gem->product_name = $request->input('product_name');


dd($gem);
      $gem->save();

      if($gem){
        return redirect()->route('gem.gem.index')->with('success', 'nps успешно отредактирован');
      }

      return back()->withInput()->with('error', 'Не удолось создать nps');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
