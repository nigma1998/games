<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Level;
use App\Models\Users;
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



      // данные взяты с файла хелпер
      $TimeHelper = new TimeHelper();
      $minut = TimeHelper::SECONDS_PER_MINUTE;
      $hour = TimeHelper::SECONDS_PER_HOUR;
      $day = TimeHelper::SECONDS_PER_DAY;
      $schablon = Schablon::select(Schablon::$yonListt)->get(); // файл для шаблона
      $lvl = Level::select(Level::$fileTaibl)->get();

      $user = Auth::user()->name;

      $userList =  DB::table('cart')->where('user', $user)->get();
        return view('gem.cart', [
          'laf' => $userList,
          'has' => $schablon,
          'minut' => $minut,
          'hour' => $hour,
          'day' => $day,
          'lvl' => $lvl,
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
      $lvls = Auth::user()->lvl;
      $lv = Level::select(Level::$fileyon)->where('lvl', $lvls)->value('exp_to_lvl');
    //  $lv = Level::where('exp_to_lvl')->get();


      //dd($lv);


      $request->validate([
        'product_name' => ['required', 'string']
      ]);

      $gem->dat = $timestamp = date("Y-m-d H:i:s");
      $gem = $gem->fill($request->only(['product_name', 'total_time', 'exp', 'image_url', 'dat', 'button']))->save();




      // прибавление опыта игроку
      $ex = Auth::user()->exp; // общее количество опыта у игрока
      $level = Auth::user()->lvl; //уровень игрока
      $accrual = request()->input('exp'); // количество получаемого опыта
      $addition = $ex + $accrual;
      $result = $addition;

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
