<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;





class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:users');

    }

    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();

        return view('user.comments.index', compact('comments'));
    }

    public function create()
    {
        $user = User::where('id', Auth::id())->first();

        return view ('user.comments.create', compact('user'));
    }

    public function store(CommentRequest $request)
    {
        $id = $request->user_id;
        $user_id = (int)$id;

        Comment::create([
            'user_id'=>$user_id,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()
        ->route('user.comments.index')
        ->with(['message'=> 'コメントが登録されました。' , 'status'=>'info']);

    }

    public function edit(Comment $comment)
    {
        $this->authorize($comment);
        $data = ['comment' => $comment];


        return view ('user.comments.edit', compact('data', 'comment'));
    }

    public function update(CommentRequest $request, Comment $comment)
    {
        $this->authorize($comment);


        $comment->title = $request->title;
        $comment->body = $request->body;
        $comment->save();

        return redirect()
        ->route('user.comments.index')
        ->with(['message'=> 'コメントが更新されました。' , 'status'=>'info']);


    }

    public function destroy($id)
    {
        //
    }
}
