<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Bonus;
use App\Models\Pharmaceuticals;
use App\Models\Level;
use App\Models\Users;
use App\Models\Medezine;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bonus = Bonus::select(Bonus::$allowedFields)->get(); // файл для шаблона
        return view('pharmaceuticals.bonus',[
          'bonus' => $bonus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Pharmaceuticals $bonu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pharmaceuticals $bonu)
    {
    //  dd($bonu->product_name);



      //здесь осуществляеться начисление медикаментов игрокам
      $user = Auth::user()->name;

      $params = [
      'medicines_name' => $bonu->product_name,
      'user' => $user
  ];
  if ($medezine = Medezine::where($params)->first()) {
      $medezine->amount += $bonu->amount;
      $medezine->save();
  } else {
      $params['amount'] = $bonu->amount;
      $medezine = Medezine::create($params);
  }


      $bonu->dat = $timestamp = date("Y-m-d H:i:s");
      $bonu->image_url;
      //dd($pharmaceutical->image_url);
      $bonu->product_name = request()->input('product_name');
      $bonu->total_time = request()->input('total_time');
      $bonu->income = request()->input('income');
      $bonu->amount = request()->input('amount');
      $bonu->exp = request()->input('exp');
      $bonu->price = request()->input('price');
      $bonu->save();

      // прибавление опыта игроку
      $ex = Auth::user()->exp; // общее количество опыта у игрока
      $level = Auth::user()->lvl; //уровень игрока
      $accrual = request()->input('exp'); // количество получаемого опыта
      $addition = $ex + $accrual;
      $result = $addition;
      $lvls = Auth::user()->lvl;
      $lv = Level::select(Level::$fileyon)->where('lvl', $lvls)->value('exp_to_lvl');

      if ($ex <= $lv) {
        $user = Users::findOrFail(Auth::user()->id);
        $user->exp = $result;
        $user->save();
      }else{
        ++$level;
        $subtraction = $ex - $lv;
        $resul = $subtraction;
        $user = Users::findOrFail(Auth::user()->id);
        $user->exp = $resul;
        $user->lvl = $level;
        $user->save();
      }

      if($bonu){
        return redirect()->route('pharmaceuticals.pharmaceuticals.index')->with('success', 'Припорат успешно приобретён вы получили ' . $accrual . ' опыта');
      }

      return back()->withInput()->with('error', 'Возникла ошибка');
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
