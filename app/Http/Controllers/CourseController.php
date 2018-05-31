<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutputInterface;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $courses=Course::all();
            return view('courses', [
                'courses'=>$courses
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('addcourse');
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
            'course_name'=>'max:30 | required',

        ];
        $messages = [
            'course_name.required' => 'Prašome įvesti kursa!',
            'course_name.max' => 'Maksimalus pavadinimas is 30 raidziu'
        ];

        $this->validate($request,$rules,$messages);


        $courses=new Course();
        $courses->course_name=$request->course_name;
        $courses->save();
        return redirect('course');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    function deleteCourse ($id){
        $course=Course::find($id);
        $course->delete();
        return redirect('course');
    }
}
