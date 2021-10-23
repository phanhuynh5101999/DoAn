<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ChuDe;
use App\TuVung;
use App\HocLai;

class LessonController extends Controller
{
    public function topicLesson()
    {
        $topic = ChuDe::all();
        return view('pages.lesson.topicLesson', compact('topic'));
    }
    public function lesson($id)
    {
        $chude = ChuDe::find($id);
        $tuvung = $chude->tuvung->shuffle();

        return view('pages.lesson.lesson', compact('chude', 'tuvung'));
    }

    public function chooseLesson()
    {
        return view('pages.lesson.chooselesson');
    }

    public function lessonAgain(){
        $user = auth()->user();
        $iduser = $user->id;
        $tuvung = DB::table('hoclai')->join('tuvung', 'hoclai.idtuvung', '=', 'tuvung.id')->where('iduser','=',$iduser)->where('result', 0)->Select('tuvung.*')->get()->shuffle();
        $count = $tuvung->count();
        // foreach($data as $item){
            
        //     echo $item->tuvung;
        // }
        return view('pages.lesson.lessonagain', compact('tuvung','count'));
    }
}
