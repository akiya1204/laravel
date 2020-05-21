<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public function index(){
        $authUser = Auth::user();
        $param = [
            'authUser'=>$authUser,
        ];
        return view('user.index',$param);
    }

    public function userEdit(){
        $authUser = Auth::user();
        $param = [
            'authUser'=>$authUser,
        ];
        return view('user.userEdit',$param);
    }

    public function userUpdate(Request $request){
        // Validator check
        $rules = [
            'name' => 'required',
            'email' => 'required',
        ];
        $messages = [
            'name.required' => 'ユーザー名が未入力です',
            'email.required' => 'メールアドレスが未入力です',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return redirect('/user/userEdit')
                ->withErrors($validator)
                ->withInput();
        }

        $param = [
                'name'=>$request->name,
                'email'=>$request->email
        ];


        User::where('id',$request->user_id)->update($param);
        return redirect(route('user.userEdit'))->with('success', '保存しました。');
    }
}

