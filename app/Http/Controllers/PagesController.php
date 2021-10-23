<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function trangchu()
    {
        return view('pages.trangchu');
    }
    // public function topic()
    // {
    //     return view('pages.lesson.topicLesson');
    // }
    // public function lesson()
    // {
    //     return view('pages.lesson.lesson');
    // }
    public function game1()
    {
        return view('pages.game1');
    }
    // function getDangNhap()
    // {
    //     return view('')
    // }

    public function getNguoiDung()
    {
        $user = Auth::user();
        return view('pages.nguoidung', compact('user'));
    }
    public function postNguoiDung(Request $request)
    {
       
    
        $this->validate($request,
    		[
                'Ten' => 'required',
    		],
    		[
                'Ten.required' => 'bạn chưa nhập tên chủ đề',
    		]);
        
    	$user = Auth::user();
        $user->name = $request->Ten;
        if($request->changePassword)
        {
            $this->validate($request,
    		[
                'Password' => 'required|min:6',
                'PasswordAgain' => 'required|same:Password'
    		],
    		[
                'Password.required' => 'bạn chưa nhập mật khẩu',
                'Password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
                'PasswordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                'PasswordAgain.same' => 'Mật khẩu nhập lại chưa khớp ',
    		]);
            $user->passWord = bcrypt($request->Password);
        }
        
        
        $user->save();
        echo $request->Ten;
    	return \Redirect::route('home')->with('thongbao','sửa thành công!');
    }
    
}
