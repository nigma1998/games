<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Images;
use App\Models\Schablon;
use App\Helper\TimeHelper;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cart $gem)
    {



      $TimeHelper = new TimeHelper();
      $minut = TimeHelper::SECONDS_PER_MINUTE;
      $hour = TimeHelper::SECONDS_PER_HOUR;
      $day = TimeHelper::SECONDS_PER_DAY;
      $schablon = Schablon::select(Schablon::$yonListt)->get();

      $user = Auth::user()->name;
    //  $npsList = Cart::select(Cart::$yonListt)->where($user, '=', 'user')->get();
      $userList =  DB::table('cart')->where('user', $user)->get();
        return view('gem.cart', [
          'laf' => $userList,
          'has' => $schablon,
          'minut' => $minut,
          'hour' => $hour,
          'day' => $day,
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
          'npsListt' => $sList,

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
    //  dd(Cart::find($id));
    //  $sList = Images::select(Images::$allowedFields)->get();

      $request->validate([
        'product_name' => ['required', 'string']
      ]);

      $gem->dat = $timestamp = date("Y-m-d H:i:s");

      $gem = $gem->fill($request->only(['product_name', 'price', 'exxp', 'image_url', 'dat', 'button']))->save();

    //  dd($gem);

      if($gem){
        return redirect()->route('gem.gem.index')->with('success', 'Заключёный успешно прибыл в камеру');
      }

      return back()->withInput()->with('error', 'Заключённый сбежал');
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
