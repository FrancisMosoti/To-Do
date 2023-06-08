<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;

class TodoController extends Controller
{
    //
    public function view(){
        $count = ToDo::count();
        return view('todo', ["events" =>  ToDo::all(), 'count' => $count]);
    }

    public function store(Request $request)
    {

        // validation
        $request->validate([
            'event' => 'required|string|max:50|min:3',

        ]);

        ToDo::create([
            'event' => $request->input('event'),
        ]);

        session()->flash('success', 'Your event has been added.');

        return back();

    } 

    public function delete($id){
        $event = ToDo::findOrFail($id);
        $event->delete();

        return redirect('/todo')->with('success', 'Event deleted successfully');
    }

    public function destroy(){
        $events = ToDo::all();

            foreach($events as $evnt){
                $evnt->delete();
            }
            return redirect('/todo')->with('success', 'All Events deleted successfully');



    }
}