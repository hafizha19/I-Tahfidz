<?php

namespace App\Http\Controllers;

use App\Ponpes;
use App\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PonpesController extends Controller
{
    public function register(){
        $ponpes = Ponpes::where('user_id', '=', Auth::user()->id)->first();
        if ($ponpes) {
            return view('ponpes.register', compact('ponpes'));
        } else {
            return view('ponpes.register');
        }
    }

    public function loadPonpes(Request $request)
    {
    	if ($request->has('q')) {
    		$cari = $request->q;
    		$data = DB::table('ponpes')->select('id', 'nama')
            ->where('nama', 'LIKE', '%'.$cari.'%')->get();
    		return response()->json($data);
    	}
    }

    public function loadDaerah(Request $request)
    {
    	if ($request->has('q')) {
    		$cari = $request->q;
    		$data = DB::table('daerah')->select('id', 'kecamatan_name', 'kabupaten_name')
            ->where('kecamatan_name', 'LIKE', '%'.$cari.'%')->get();
    		return response()->json($data);
    	}
    }

    public function save(Request $request){
        Ponpes::create([
            'user_id'      => $request->user_id,
            'nama'         => $request->nama,
            'deskripsi'    => $request->deskripsi,
            'daerah_id'    => $request->daerah_id,
        ]);
        return redirect()->route('ponpes.dashboard')->with('status', 'Data Pondok Pesantren berhasil disimpan');
    }

}
