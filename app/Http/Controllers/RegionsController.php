<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Region::paginate(20);
        return view('region.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('region.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'name' =>'required',
            'city_id' =>'required'
        ];
        $messages =[
            'name.required' => 'The Name Is Requires',
            'city_id.required' => 'The City Id Is Requires'
        ];
        $this->validate($request,$rules,$messages);

       // $record = new Governorate;
       // $record->name = $request->input('name');
       // $record->save();

       $record = Region::create($request->all());
       flash()->success("Success");
       return redirect(route('regions.index'));
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
        $model = Region::findOrFail($id);
        return view('region.edit',compact('model'));
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
        $record = Region::findOrFail($id);
        $record->update($request->all());
        flash()->success("Edited");
        return redirect(route('regions.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Region::findOrFail($id);
        $record->delete();
        flash()->success("Success");
        return back();
    }
}
