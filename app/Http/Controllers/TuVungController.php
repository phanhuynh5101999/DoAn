<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\ChuDe;
use App\TuVung;
use Intervention\Image\ImageManagerStatic as Image;
class TuVungController extends Controller
{
    public function getDanhSach()
    {	
        $tuvung = TuVung::all();
        return view('admin.tuvung.danhsach',compact('tuvung'));
      
    }
    public function getThem()
    {
        $chude = ChuDe::all();
    	return view('admin.tuvung.them', compact('chude'));
    }
    public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
                'Ten' => 'required|unique:TuVung,Ten',
                'ChuDe' => 'required',
                'Hinh' => 'required|file|mimes:jpeg,jpg,png,gif',
                'AmThanh' =>'required|file|mimes:audio/mpeg,mpga,mp3,wav,aac'
            
    		],
    		[
    			'Ten.required' => 'bạn chưa nhập tên chủ đề',
                'Ten.unique' => 'Tên chủ đề đã tồn tại',
                'ChuDe.required' => 'bạn chưa nhập chủ đề',
                'Hinh.required' => 'bạn chưa nhập ảnh',
                'Hinh.mimes' => 'bạn phải tải file ảnh',
                'AmThanh.required' =>'bạn chưa nhập file audio' ,
                'AmThanh.mimes' => 'bạn phải tải file audio',
    		]);
                
    	$tuvung = new TuVung;
        $tuvung->Ten = $request->Ten;
        $tuvung->idchude = $request->ChuDe;
        if($request->hasFile('Hinh')) {
            $image       = $request->file('Hinh');
            $imagename    = date('mdYHis') . uniqid() . $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());              
            // $image_resize->fit(300);
            $image_resize->save(public_path('upload/image/' .$imagename));
        
        }
        if($request->hasFile('AmThanh')) {
            $audio       = $request->file('AmThanh');
            $audioname    = date('mdYHis') . uniqid() . $audio->getClientOriginalName();
            $audio->move('upload/audio/', $audioname);
        
        }
        $tuvung->hinhanh = $imagename;
        $tuvung->amthanh = $audioname;
    	$tuvung->save();
    	return redirect('admin/tuvung/them')->with('thongbao','thêm thành công!');
    }
    public function getSua($id)
    {
        $tuvung = tuvung::find($id);
        $chude = ChuDe::all();
        return view('admin.tuvung.sua',compact('tuvung','chude'));
    }
    public function postSua(Request $request,$id)
    {
        // echo $request->hasFile('Hinh') ;
        // die();
        $tuvung = TuVung::find($id);
        $this->validate($request,
        [
            'Ten' => [
                'required',
                Rule::unique('tuvung')->ignore($tuvung->id),
            ],
            // 'Ten' => 'required|unique:TuVung,Ten',
            'ChuDe' => 'required',
            'Hinh' => 'file|mimes:jpeg,jpg,png,gif',
            'AmThanh' =>'file|mimes:audio/mpeg,mpga,mp3,wav,aac'
        
        ],
        [
            'Ten.required' => 'bạn chưa nhập từ vựng',
            'Ten.unique' => 'Tên chủ đề đã tồn tại',
            'ChuDe.required' => 'bạn chưa nhập chủ đề',
            // 'Hinh.required' => 'bạn chưa nhập ảnh',
            'Hinh.mimes' => 'bạn phải tải file ảnh',
            // 'AmThanh.required' =>'bạn chưa nhập file audio' ,
            'AmThanh.mimes' => 'bạn phải tải file audio',
        ]);
        $tuvung->ten = $request->Ten;
        $tuvung->idchude = $request->ChuDe;
        
        if($request->hasFile('Hinh')) {
            $image = $request->file('Hinh');
            $imagename    = date('mdYHis') . uniqid() . $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());              
            // $image_resize->fit(300);
            $image_resize->save(public_path('upload/image/' .$imagename));
        
        } 
        else{
            $imagename       = $request->image_old;
            // $imagename    = date('mdYHis') . uniqid() . $image->getClientOriginalName();
            // $image_resize = Image::make($image->getRealPath());              
            // $image_resize->fit(300);
            // $image->save(public_path('upload/image/' .$imagename));
        }

        if($request->hasFile('AmThanh')) {
            $audio       = $request->file('AmThanh');
            $audioname    = date('mdYHis') . uniqid() . $audio->getClientOriginalName();
            $audio->move('upload/audio/', $audioname);
        
        }
        else{
            $audioname = $request->audio_old;
        }
        $tuvung->hinhanh = $imagename;
        $tuvung->amthanh = $audioname;
        $tuvung->save();
        return redirect('admin/tuvung/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {
        $tuvung = TuVung::find($id);
        $tuvung->delete();
        return redirect('admin/tuvung/danhsach')->with('thongbao','Xóa thành công');
    }
}
