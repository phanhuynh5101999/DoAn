<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\HocLai;
use App\User;
class AjaxController extends Controller
{
    public function game1(Request $request)
    {
        // $i = 3;
        $id = $request->input('id');
         $idTuVung = $request->input('idTuVung');
         if($id == $idTuVung){
            echo '<input name="check" type="hidden" value = "1">';



        }
        else{
             echo '   <input name="check" type="hidden" value = "0">  '
                    ;
         }
    }

    public function game1_1(Request $request)
    {
        // $i = 3;
        $id = $request->input('id');
        $idTuVung = $request->input('idTuVung');
        $count = $request->input('count');
        $total =  $request->input('total');
        $resultTrue = 0;
        $resultFalse = 0;

         if($id == $idTuVung){
            $resultTrue++;
            echo '<input name="check" type="hidden" value = "1">';

        }
        else{
             echo '<input name="check" type="hidden" value = "0">  '
                    ;

         }
        if($count == $total){
            echo '<input name="isTotal" type="hidden" value="1">';
        }
        else{
            echo '<input name="isTotal" type="hidden" value="0">';
        }

    }
    public function game1_1_1(Request $request){
        $user = auth()->user();
        $iduser = $user->id;
        $data = $request->all();
        $data = json_decode($data['arr_Answer']);
        // dd($data);

        foreach($data as $item){
            $id_tuvung = $item->idTuVung;
            $result = $item->result;
              $hoclai = new HocLai;
            // DB::table('hoclai')->insert(
            //     array(
            //         'iduser'  => $iduser,
            //         'idtuvung' => $id_tuvung,
            //         'result' => $result
            //     )
            // );
            $checkExists = HocLai::where('idtuvung', $id_tuvung)->where('iduser', $iduser)->first();

            if(!empty($checkExists)) {
                HocLai::where('idtuvung', $id_tuvung)->where('iduser', $iduser)->update([
                    'result' => $result
                ]);
            } else {
                // HocLai::create([
                //     'iduser'  => $iduser,
                //     'idtuvung' => $id_tuvung,
                //     'result' => $result
                // ]);
                $hoclai->iduser = $iduser;
                $hoclai->idtuvung = $item->idTuVung;
                $hoclai->result = $item->result;
                // $hoclai->tentuvung = $item->word;
                // $hoclai->amthanh = $item->audio;
                // $hoclai->hinhanh = $item->image;
                $hoclai->save();
            }
            // $hoclai = new HocLai;
            // if($hoclai->user == $iduser && $hoclai->idtuvung == $item->idTuVung ){
            //     // $hoclai->result = $item->result;
            //     // $hoclai->save();
            // DB::table('hoclai')
            //   ->where('idtuvung', $hoclai->idtuvung)
            //   ->update(['result' => $hoclai->result]);
            // }
            // else{
                // $hoclai->iduser = $iduser;
                // $hoclai->idtuvung = $item->idTuVung;
                // $hoclai->result = $item->result;
                // $hoclai->tentuvung = $item->word;
                // $hoclai->amthanh = $item->audio;
                // $hoclai->hinhanh = $item->image;
                // $hoclai->save();
            // }


            // DB::table('hoclai')
            //     ->updateOrInsert(
            //         ['iduser' => $iduser, 'idtuvung' => $item->idtuvung],
            //         ['result' => $item->result]
            //     );

        }

    }
}
