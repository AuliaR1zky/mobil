<?php

namespace App\Http\Controllers;

use App\Mobil;
use JWTAuth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MobilController extends Controller
{
    public function store(Request $req)
    {
        if(Auth::user()->level=="admin"){
        $validator=Validator::make($req->all(),
        [
            'plat_mobil'=>'required',
            'merk'=>'required',
            'foto'=>'required',
            'keterangan'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=Mobil::create([
            'plat_mobil'=>$req->plat_mobil,
            'merk'=>$req->merk,
            'foto'=>$req->foto,
            'keterangan'=>$req->keterangan
        ]);
        if($simpan){
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}

    public function update($id, Request $req)
    {
        if(Auth::user()->level=="admin"){
        $validator=Validator::make($req->all(),
        [
            'plat_mobil'=>'required',
            'merk'=>'required',
            'foto'=>'required',
            'keterangan'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $ubah=Mobil::where('id', $id)->update([
            'plat_mobil'=>$req->plat_mobil,
            'merk'=>$req->merk,
            'foto'=>$req->foto,
            'keterangan'=>$req->keterangan
        ]);
        if($ubah){
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}

    public function hapus($id){
        if(Auth::user()->level=="admin"){
        $hapus=Mobil::where('id', $id)->delete();
        if($hapus){
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
    public function tampil(){
        if(Auth::user()->level=="admin"){
      $data_mobil = Mobil::get();
      $count = $data_mobil->count();
      $arr_data = array();
      foreach ($data_mobil as $dt_m){
        $arr_data[] = array(
          'id' => $dt_m->id,
          'plat_mobil'=>$dt_m->plat_mobil,
          'merk'=>$dt_m->merk,
          'foto'=>$dt_m->foto,
          'keterangan'=>$dt_m->keterangan
        );
      }
      $status=1;
      return Response()->json(compact('count','count', 'arr_data'));
}
}
}


