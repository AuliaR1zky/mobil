<?php

namespace App\Http\Controllers;

use App\Jenis;
use JWTAuth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JenisController extends Controller
{
    public function store(Request $req)
    {
        if(Auth::user()->level=="admin"){
        $validator=Validator::make($req->all(),
        [
            'nama_jenis'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=Jenis::create([
            'nama_jenis'=>$req->nama_jenis
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
            'nama_jenis'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $ubah=Jenis::where('id', $id)->update([
            'nama_jenis'=>$req->nama_jenis
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
        $hapus=Jenis::where('id', $id)->delete();
        if($hapus){
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
    public function tampil(){
        if(Auth::user()->level=="admin"){
      $data_jenis = Jenis::get();
      $count = $data_jenis->count();
      $arr_data = array();
      foreach ($data_jenis as $dt_j){
        $arr_data[] = array(
          'id' => $dt_j->id,
          'nama_jenis'=>$dt_j->nama_jenis
        );
      }
      $status=1;
      return Response()->json(compact('count','count', 'arr_data'));
}
}
}
