<?php

namespace App\Http\Controllers;

use App\Group;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages=Message::all();
//
//       return view('getMessage', [
//           'messages'=>$messages
//       ]);
        $data=[];
        if($userGroups = User::find(Auth::user()->id)->groups){
            foreach($userGroups as $group) {
                $data[] = $group->id;

            }
        }

        return view('getMessage', [
            'messages' => $messages,
            'groups' => $data,
        ]);
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
    public function sendMessage($id){
        return view('messages', [
            'group_id'=>$id
        ]);


    }
    public function store(Request $request)
    {
        $message=new Message();
        $message->sender=Auth::user()->id;
        $message->group_id=$request->group_id;
        $message->message=$request->message;
        $message->save();

        $messages=$request->message;
        $groupid=$request->group_id;

        $users=Group::with('users')->find($groupid);

        $headers =
            'From:'.Auth::user()->email.' ' . "\r\n" .
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type: text/html; charset=UTF-8" . "\r\n";

        foreach ($users->users as $user){
            $gmail=$user->email;

            mail($gmail,'Test email',$messages, $headers);
        }


        return redirect('groups');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
