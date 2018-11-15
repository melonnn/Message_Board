<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
        public function __construct(){
        $this->middleware('auth');
        }


	public function index(){
		$comments= DB::table('comments')
		->leftJoin('users', 'comments.a_id', '=', 'users.id')
		->select('users.name', 'comments.content', 'comments.id')
		->get();
	    return view("comment",[
	    'comments'=>$comments
	    ]);
	}

	public function insert(Request $request){
	    $comment = new Comment();
	    $comment->a_id = Auth::id();
	    $comment->content = $request->content;
	    $comment->save();
    	    return redirect('/');
	
	}

	public function delete(Request $request,Comment $comment){
	    $comment->delete();
	    return redirect('/');
	}
}
