<?php

namespace App\Http\Controllers;

use App\PegawaiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index(Request $request) {
        $data = PegawaiModel::all();
        $nm_pegawai = $request->get('nm_pegawai');
        if($nm_pegawai) {
            $data = PegawaiModel::where('nm_pegawai', 'LIKE', "%$nm_pegawai%")->get();
        } else {
            $data = PegawaiModel::all();
        }

        return response()->json($data);
    }
    public function insert(Request $request) {
        $nip = $request->post('nip');
        $nm_pegawai = $request->post('nm_pegawai');
        $jenis_kelamin = $request->post('jenis_kelamin');
        $agama = $request->post('agama');
        $tempat_lahir = $request->post('tempat_lahir');
        $tgl_lahir = $request->post('tgl_lahir');
        $dept = $request->post('dept');
        $jabatan = $request->post('jabatan');

        //$insert = DB::insert("INSERT INTO pegawai (nip, nm_pegawai, jenis_kelamin, agama, tempat_lahir, tgl_lahir, dept, jabatan)
        //values('$nip', '$nm_pegawai', '$jenis_kelamin', '$agama', '$tempat_lahir', '$tgl_lahir', '$dept', '$jabatan')");

        $insert = PegawaiModel::insert([
            'nip' => $nip,
            'nm_pegawai' => $nm_pegawai,
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'dept' => $dept,
            'jabatan' => $jabatan
        ]);
        if($insert) {
            return response()->json("Data berhasil diinput");
        } else {
            return response()->json("Data anda gagal diinput");
        }
    }
    public function update($nip, Request $request) {
        $nm_pegawai = $request->post('nm_pegawai');
        $jenis_kelamin = $request->post('jenis_kelamin');
        $agama = $request->post('agama');
        $tempat_lahir = $request->post('tempat_lahir');
        $tgl_lahir = $request->post('tgl_lahir');
        $dept = $request->post('dept');
        $jabatan = $request->post('jabatan');

        //$update = DB::update("UPDATE pegawai SET nm_pegawai = '$nm_pegawai', jenis_kelamin = '$jenis_kelamin',
        //agama = '$agama', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', dept = '$dept', jabatan = '$jabatan' WHERE nip = '$nip';");

        $update = PegawaiModel::where('nip', $nip)->update([
            'nm_pegawai' => $nm_pegawai,
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'dept' => $dept,
            'jabatan' => $jabatan
        ]);
        if($update) {
            return response()->json("Data berhasil di update");
        } else {
            return response()->json("Data anda gagal di update");
        }
    }
    public function delete ($nip) {
        //$delete = DB::delete("DELETE from pegawai WHERE nip = '$nip'");

        $delete = PegawaiModel::where('nip', $nip)->delete();
        if($delete) {
            return response()->json("Data berhasil di delete");
        } else {
            return response()->json("Data anda gagal di delete");
        }
    }

}
