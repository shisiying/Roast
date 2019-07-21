<?php

namespace App\Http\Controllers\Web;

use App\User;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Auth;

class AuthenticationController extends Controller
{
    public function getSocialRedirect($account)
    {
        try {
            return Socialite::with($account)->redirect();
        }catch (\InvalidArgumentException $e) {
            return redirect('/login');
        }
    }

    public function getSocialCallback($account)
    {
        //从第三方中Oauth回调中获取用户信息
        $socialUser = Socialite::with($account)->user();
        //在本地users表中查询该用户来判断自己是否已经存在
        $user = User::where('provider_id','=',$socialUser->id)
        ->where('provider','=',$account)
        ->first();

        if ($user == null) {
            //如果该用户不存在则将其保存到users表中
            $newUser = new User();
            $newUser->name = $socialUser->getName();
            $newUser->email = $socialUser->getEmail() == ''? '':$socialUser->getEmail();
            $newUser->avatar = $socialUser->getAvatar();
            $newUser->password = '';
            $newUser->provider    = $account;
            $newUser->provider_id = $socialUser->getId();

            $newUser->save();
            $user = $newUser;
        }

        //手动登陆该用户
        Auth::login( $user );

        //登陆成功后定向到首页
        return redirect('/');
    }

}
