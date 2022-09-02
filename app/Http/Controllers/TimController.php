<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  Cart $taim
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $taim)
    {
      return view('gem.tim',[
          'buton' => $taim,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Cart $taim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $taim)
    {
      $request->validate([

      ]);

      $taim->dat = $timestamp = date("Y-m-d H:i:s");

      $taim = $taim->fill($request->only([ 'price', 'dat']))->save();

    //  dd($gem);

      if($taim){
        return redirect()->route('gem.gem.index')->with('success', 'время сокращено');
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
