<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    
       public function index()

        {
          $user = Auth::user();
          $todos = Todo::where('user_id', \Auth::user()->id)->get();
          
          $tags = Tag::all();

          
          return view('index', compact('todos', 'tags','user'));


        }


        public function create(TodoRequest $request)
  {
    
    $todo = $request->only(['content','tag_id','user_id']);
    
    Todo::create($todo);
    return redirect('/');
        }

        public function delete(Request $request)
        {
          Todo::find($request->id)->delete();
          return back();
          
        }

       

        public function update(Request $request)
        {
       
          $todos = $request->only(['content','tag_id']);

          Todo::with('tag')->find($request->id)->update($todos);
          
          return back()->with(compact('todos'));
        }

        public function search(Request $request)
  {
    if (!isset($keyword))
    $user = Auth::user();
    $todos = Todo::with('tag')->categorySearch($request->tag_id)->where('content','LIKE',"%{$request->keyword}%")
    ->where('user_id', \Auth::user()->id)->get();
    $tags = tag::all();

    return view('index', compact('todos', 'tags','user'));
  }

       
       public function find()

       {
        $user = Auth::user();
        $tags = Tag::all();
        $todos = Todo::where('user_id')->get();
      
        return view('search',  compact('todos', 'tags','user'));
      
         
      
       }


   
}