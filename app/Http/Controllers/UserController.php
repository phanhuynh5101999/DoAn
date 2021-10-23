<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function getDanhSach()
    {
        $user = User::all();
        return view('admin.user.danhsach', compact('user'));

    }
    public function getThem()
    {
    	return view('admin.user.them');
    }
    public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
                'Ten' => 'required',
                'Email' => 'required|email|unique:users,email',
                'Password' => 'required|min:6',
                'PasswordAgain' => 'required|same:Password'

    		],
    		[
                'Ten.required' => 'bạn chưa nhập tên tài khoản',
                'Email.required' => 'bạn chưa nhập Email',
                'Email.unique' => 'Email đã tồn tại',
                'Email.email' => 'Bạn chưa nhập đúng định dạng Email',
                'Password.required' => 'bạn chưa nhập mật khẩu',
                'Password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
                'PasswordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                'PasswordAgain.same' => 'Mật khẩu nhập lại chưa khớp ',
    		]);

    	$user = new User;
        $user->name = $request->Ten;
        $user->email = $request->Email;
        $user->passWord = bcrypt($request->Password);
        $user->quyen = $request->Quyen;
    	$user->save();
    	return \Redirect::route('user.getThem')->with('thongbao','thêm thành công!');
    }
    public function getSua($id)
    {
        $user = User::find($id);
        return view('admin.user.sua',compact('user'));
    }
    public function postSua(Request $request,$id)
    {
        $this->validate($request,
    		[
                'Ten' => 'required',
    		],
    		[
                'Ten.required' => 'bạn chưa nhập tên user',
    		]);

    	$user = User::find($id);
        $user->name = $request->Ten;
        // $user->quyen = $request->Quyen;
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
    	return \Redirect::route('user.getSua',$id)->with('thongbao','sửa thành công!');
    }
    public function getXoa($id)
    {
        $user = User::find($id);
        $user->delete();
        return \Redirect::route('user.getDanhSach')->with('thongbao','xóa người dùng thành công!');
    }

    public function getDangNhap()
    {
        return view('admin.login3');
    }

    public function postDangNhap(Request $request)
    {
        $this->validate($request,
        [
            'email' => 'required',
            'password' => 'required|min:3'
        ],
        [
            'email.required' =>' Bạn chưa nhập Email',
            'password.required' => 'Bạn chưa nhập Password',
            'password.min' => 'Mật khẩu không được nhỏ hơn 6 kí tự'
        ]);

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            $user_login = Auth::user();
            if($user_login->quyen == 1)
            {
                // return \Redirect::route('chude.getDanhSach');
                return \Redirect::route('admin.home');
            }
            else
            {
                return \Redirect::route('home');
            }

        }
        else{
            return \Redirect::route('user.getDangNhap')->with('thongbao','Đăng nhập không thành công');
        }

    }


    public function getDangXuat()
    {
        Auth::logout();
        return \Redirect::route('user.getDangNhap');
    }

    public function getDangKy()
    {
        return view('admin.dangky3');
    }
    public function postDangKy(Request $request)
    {
        $this->validate($request,
    		[
                'Ten' => 'required',
                'Email' => 'required|email|unique:users,email',
                'Password' => 'required|min:6',
                'PasswordAgain' => 'required|same:Password'

    		],
    		[
                'Ten.required' => 'bạn chưa nhập tên chủ đề',
                'Email.required' => 'bạn chưa nhập Email',
                'Email.unique' => 'Email đã tồn tại',
                'Email.email' => 'Bạn chưa nhập đúng định dạng Email',
                'Password.required' => 'bạn chưa nhập mật khẩu',
                'Password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
                'PasswordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                'PasswordAgain.same' => 'Mật khẩu nhập lại chưa khớp ',
    		]);

    	$user = new User;
        $user->name = $request->Ten;
        $user->email = $request->Email;
        $user->passWord = bcrypt($request->Password);
        $user->quyen = 0;
    	$user->save();
    	return \Redirect::route('user.getDangNhap')->with('thongbao','Đăng ký thành công!');
    }
}
