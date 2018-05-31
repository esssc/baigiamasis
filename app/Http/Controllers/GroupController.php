<?php

namespace App\Http\Controllers;

use App\Course;
use App\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type == '2') {
            $courses = Course::all();
            $groups = Group::all();
            return view('groups', [
                'groups' => $groups,
                'courses' => $courses

            ]);
        } else  {
            $courses = Course::all();
            $groups = User::find(Auth::user()->id)->groups;
            return view('groups',[
                'groups' => $groups,
                'courses' => $courses

            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();
        $users=User::all();
        return view('addGroup', [
            'courses'=>$courses,
            'users'=>$users
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
            'group_name'=>'max:30 | required',
            'begins'=>'required',
            'ends'=>'required'

        ];
        $messages = [
            'group_name.required' => 'Prašome irasyti grupes pavadinima!',
            'group_name.max' => 'Maksimalus pavadinimas is 30 raidziu',
            'begins.required'=>'Sis laukas butinas',
            'ends.required'=>'Sis laukas butinas'
        ];

        $this->validate($request,$rules,$messages);

        $group=new Group();
        $group->course_id=$request->course_id;
        $group->teacher_id=$request->teacher_id;
        $group->group_name=$request->group_name;
        $group->begins=$request->begins;
        $group->ends=$request->ends;
        $group->save();
        return redirect('groups');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('editGroups', [
            'group'=>$group
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $rules=[
            'group_name'=>'max:30 | required',
            'begins'=>'required',
            'ends'=>'required'

        ];
        $messages = [
            'group_name.required' => 'Prašome irasyti grupes pavadinima!',
            'group_name.max' => 'Maksimalus pavadinimas is 30 raidziu',
            'begins.required'=>'Sis laukas butinas',
            'ends.required'=>'Sis laukas butinas'
        ];
        $this->validate($request,$rules,$messages);

        $group->group_name=$request->group_name;
        $group->begins=$request->begins;
        $group->ends=$request->ends;
        $group->save();
        return redirect('groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
    function deleteGroup ($id){
        $group=Group::find($id);
        $group->delete();
        return redirect('groups');
    }
}
