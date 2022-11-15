<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Canteen;
use App\Models\Cart;
use App\Models\Schablon;
use App\Helper\TimeHelper;


class CanteenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // данные взяты с файла хелпер
      $TimeHelper = new TimeHelper();
      $minut = TimeHelper::SECONDS_PER_MINUTE;
      $hour = TimeHelper::SECONDS_PER_HOUR;
      $day = TimeHelper::SECONDS_PER_DAY;
      $schablon = Schablon::select(Schablon::$yonListt)->get(); // файл для шаблона
      $user = Auth::user()->name;

      $userrList =  DB::table('Canteen')->where('user', $user)->get();
        return view('canteen.canteen', [
          'userlist' => $userrList,
          'has' => $schablon,
          'day' => $day,
          'minut' => $minut,
          'hour' => $hour,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gem.nevCanteen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //процесс покупки столовой
      $validated = $request->validate([
        'user' => ['required', 'string']
      ]);

      $data = $request->only(['user']);
//dd($request);
      $userList = Canteen::create($data);


      if($userList){
        return redirect()->route('gem.canteen.index')->with('success', 'кухня успешно куплена');
      }

      return back()->withInput()->with('error', 'Не удолось купить кухню');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
