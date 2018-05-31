<?php

namespace App\Http\Controllers;

use App\File;
use App\Group;
use App\Lectures;
use Illuminate\Http\Request;

class LecturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectures=Lectures::all();
        return view('addLecture', [
            'lectures'=>$lectures,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        return view('addLecture', [
        'group_id'=>$id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'date'=>'required',
            'lecture_name'=>'required',
            'about'=>'required'

        ];
        $messages = [
            'lecture_name.required' => 'Prašome irasyti grupes pavadinima!',
            'lecture_name.max' => 'Maksimalus pavadinimas is 30 raidziu',
            'date.required'=>'Sis laukas butinas',
            'about.required'=>'Sis laukas butinas'
        ];

        $this->validate($request,$rules,$messages);

        $lecture=new Lectures();
        $lecture->group_id=$request->group_id;
        $lecture->date=$request->date;
        $lecture->lecture_name=$request->lecture_name;
        $lecture->about=$request->about;
        $lecture->save();
        return redirect()->route('lectures.show', $request->group_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $lectures=Lectures::where('group_id',$id)->get();

       return view('lectures', [
           'lectures'=>$lectures,
           'group_id'=>$id,



       ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function edit(Lectures $lectures)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lectures $lectures)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lectures $lectures, Request $request)
    {
        //
    }

    function deleteLecture ($id){
        $lecture=Lectures::find($id);
        $lecture->delete();
        return redirect()->back();
    }

    public function getLectures ($id){

        return view('addLecture', [
            'group_id'=>$id
        ]);
    }
}
