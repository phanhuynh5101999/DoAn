<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChuDe;
use App\TuVung;
class Game1Controller extends Controller
{
    public function topicGame1()
    {
        $topic = ChuDe::all();
        return view('pages.game1.topicGame1', compact('topic'));
    }
    public function game1($id)
    {
        $chude = ChuDe::find($id);
        $arr = [];
        $tuvung3 = $chude->tuvung->random();
        // $tuvungs = $chude->tuvung->all();
        // $tuvung = array_rand($tuvungs,4);
        // dd($tuvung);
        // die();
        // for($i=0; $i<4; $i++){
        //     $tuvung = array_rand($tuvungs);
        //     array_push($arr, $tuvung);
        // }

        return view('pages.game1.game1', compact('chude', 'tuvung3'));
    }

    public function chooseGame1()
    {
        return view('pages.game1.choosegame1');
    }
    // public function game1_1(){
    //     $tuvungs = TuVung::all();
    //     $arrQuestion = [];
    //     for($i = 0; $i < 20; $i++) {
    //         $tuvung = $tuvungs->shuffle()->random(4);
    //         array_push($arrQuestion, $tuvung);

    //     }
    //     return view('pages.game1.game1_1', compact('arrQuestion'));
    // }
    public function game1_1(){
        $tuvungs = TuVung::all()->toArray();
        // dd($tuvungs);

        $arrQuestion = [];

        for($i = 0; $i < 20; $i++) {
            $arr4 = [];
            for($j = 0; $j <4; $j++){
                $tuvung =array_rand($tuvungs,1) ;
                array_push($arr4, $tuvungs[$tuvung]);
                unset($tuvungs[$tuvung]);
            }

            array_push($arrQuestion, $arr4);
        }
        // dd($arrQuestion);
        // // dd($tuvungs);


        return view('pages.game1.game1_1', compact('arrQuestion'));
    }

}
