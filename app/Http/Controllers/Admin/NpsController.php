<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Images;
use App\Services\UploadedService;

class NpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $npsList = Images::select(Images::$allowedFields)->get();
      //    dd($npsList);
        return view('admin.user.nps',
        ['npsList' => $npsList,

      ]
      );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.user.create');

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
        'product_name' => ['required', 'string']
      ]);

      if($request->hasFile('image_url')){
      $uploadedService = app(UploadedService::class);
      $validated['image_url'] = $uploadedService->fileUpload(
        $request->file('image_url')
      );
      }

      $data = $request->only(['product_name', 'price', 'exxp', 'image_url']);
      $npsList = Images::create($data);


      if($npsList){
        return redirect()->route('admin.nps.index')->with('success', 'nps успешно создан');
      }

      return back()->withInput()->with('error', 'Не удолось создать nps');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $np
     * @return \Illuminate\Http\Response
     */
    public function show(Images $np)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Images $np
     * @return \Illuminate\Http\Response
     */
    public function edit(Images $np)
    {

    //  dd(Images::find($id));
    //dd($np);

    return view('admin.user.edit',[
        'npsLis' => $np
    ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Images $np
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Images $np)
    {

//dd($np);

      $validated = $request->validate([
        'product_name' => ['required', 'string']
      ]);

      $data = $request->only(['product_name', 'price', 'exxp']);

      if($request->hasFile('image_url')){
      $uploadedService = app(UploadedService::class);
      $validated['image_url'] = $uploadedService->fileUpload(
        $request->file('image_url')
      );
      }

      $np = $np->fill($validated)->save();

      if($np){
        return redirect()->route('admin.nps.index')->with('success', 'nps успешно отредактирован');
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
