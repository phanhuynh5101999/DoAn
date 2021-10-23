<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\ChuDe;
use App\TuVung;
use Intervention\Image\ImageManagerStatic as Image;

class ChuDeController extends Controller
{
    public function getDanhSach()
    {	
        $chude = ChuDe::all();
        return view('admin.chude.danhsach',compact('chude'));
      
    }
    public function getThem()
    {
    	return view('admin.chude.them');
    }
    public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
    			'Ten' => 'required|unique:ChuDe,Ten',
                'Hinh' => 'required|file|mimes:jpeg,jpg,png,gif',
    		],
    		[
    			'Ten.required' => 'bạn chưa nhập tên chủ đề',
                'Ten.unique' => 'Tên chủ đề đã tồn tại',
                'Hinh.required' => 'bạn chưa nhập ảnh',
                'Hinh.mimes' => 'bạn phải tải file ảnh',
    		]);
       
    	$chude = new ChuDe;
        $chude->Ten = $request->Ten;
        if($request->hasFile('Hinh')) {
            $image       = $request->file('Hinh');
            $imagename    = date('mdYHis') . uniqid() . $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());              
            // $image_resize->fit(140);
            $image_resize->save(public_path('upload/image/' .$imagename));
        //     $uploadPath = public_path('/upload/image'); 
        // $image->move($uploadPath, $imagename);
        }
        $chude->hinhanh = $imagename;
    	$chude->save();
    	return redirect('admin/chude/them')->with('thongbao','thêm thành công!');
    }
    public function getSua($id)
    {
        $chude = ChuDe::find($id);
        return view('admin.chude.sua',compact('chude'));
    }
    public function postSua(Request $request,$id)
    {
        $chude = chude::find($id);
      
        $this->validate($request,
         [
            'Ten' => [
                'required',
                Rule::unique('chude')->ignore($chude->id),
            ],
            // 'Ten' => 'required|unique:ChuDe,Ten'.$chude->id,
            'Hinh' => 'file|mimes:jpeg,jpg,png,gif',
            'Hinh.required' => 'bạn chưa nhập ảnh',
            'Hinh.mimes' => 'bạn phải tải file ảnh',
         ],
         [
            'Ten.required' => 'tên không được trống',
            'Ten.unique' => 'tên đã tồn tại',
             'Hinh.mimes' => 'bạn phải tải file ảnh',
         ]);
         if($request->hasFile('Hinh')) {
            $image       = $request->file('Hinh');
            $imagename    = date('mdYHis') . uniqid() . $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());              
            // $image_resize->fit(140);
            $image_resize->save(public_path('upload/image/' .$imagename));
        
        } 
        else{
            $imagename = $request->image_old;
        }
        $chude->Ten = $request->Ten;
        $chude->hinhanh = $imagename;

        $chude->save();
        return redirect('admin/chude/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {
        $chude = ChuDe::find($id);
        $tuvung = TuVung::where('idchude', $id);
        $tuvung->delete();
        $chude->delete();
        return redirect('admin/chude/danhsach')->with('thongbao','Xóa thành công');
    }
}
