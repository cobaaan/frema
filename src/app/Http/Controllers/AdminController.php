<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Comment;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function userListPage(Request $request){
        $auth = Auth::user();
        
        $users = User::all();
        
        return view ('userList', compact('auth', 'users'));
    }
    
    public function userDelete(Request $request) {
        $user = User::where('id', $request->id)->delete();
        
        return redirect('/thanks')
        ->with('message', 'ユーザーを削除しました。')
        ->with('address', route('user.list.page'))
        ->with('page', '元のページ');
    }
    
    public function commentListPage(Request $request){
        $auth = Auth::user();
        
        $comments = Comment::all();
        
        return view ('commentList', compact('auth', 'comments'));
    }
    
    public function commentDelete(Request $request) {
        $comment = Comment::where('id', $request->id)->delete();
        
        return redirect('/thanks')
        ->with('message', 'コメントを削除しました。')
        ->with('address', route('comment.list.page'))
        ->with('page', '元のページ');
    }
}
