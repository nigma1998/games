<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Images;

class NpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  int  Images $nonesk
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $nonesk)
    {


      return view('gem.naf',[
          'lis' => $nonesk,


      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Cart $nonesk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $nonesk)
    {
      $request->validate([
        'product_name' => ['required', 'string']
      ]);

      $nonesk = $nonesk->fill($request->only(['product_name', 'price', 'exxp', 'image_url']))->save();

    //  dd($gem);

      if($nonesk){
        return redirect()->route('gem.gem.index')->with('success', 'Заключёный успешно отправлен на этап');
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
