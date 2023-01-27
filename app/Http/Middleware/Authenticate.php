<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;


class Authenticate extends Middleware
{
    protected $user_route = 'user.login';
    protected $admin_route = 'admin.login';

	/*
	出来ること
        - リダイレクト先を設定している
        - 現在のクライアントが管理者であれば管理者のログイン画面へ
            それ以外はユーザーログインへ遷移させる
	*/

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if(Route::is('admin.*')){
                return route($this->admin_route);
            }else{
                return route($this->user_route);
            }
        }

    }
}
