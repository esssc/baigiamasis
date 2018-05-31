<?php

namespace App\Http\Controllers;

use App\File;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FileController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = $request->file('failai');
        $filename=preg_replace('/[-: ]/', '', Carbon::now()).'_';
        foreach($files as $file) {

            $file->storeAs('public', $filename.$file->getClientOriginalName());


            $newName = preg_replace('/ /', '_', $file->getClientOriginalName());
            $fileurl=preg_replace('/[-: ]/', '', Carbon::now()).'_'.$file->getClientOriginalName();


        $failai=new File();
        $failai->lecture_id=$request->lecture_id;
        $failai->file=$fileurl;
        $failai->file_name=$newName;
        $failai->save();

    }
        return redirect()->back();




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
    public function deleteFile($id){
        $file=File::find($id);
        $file->delete();
        return redirect()->back();
    }

    public function hideFile($id){
        $file=File::find($id);
        $file->status = 1;
        $file->save();
        return redirect()->back();

    }
    public function showFile($id){
        $file=File::find($id);
        $file->status = 0;
        $file->save();
        return redirect()->back();

    }
}
