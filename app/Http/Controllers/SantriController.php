<?php

namespace App\Http\Controllers;

use App\Ponpes;
use App\Santri;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SantriController extends Controller
{

    public function santri()
    {
        // dd(Santri::with('ponpes')->get());
        // $data = Santri::with('ponpes')->where('id', '=', Auth::user()->ponpes->id)->get();
        $data['ponpes'] = Ponpes::where('user_id', Auth::user()->id)->first()->nama ?? 'Saya';
        $ponpes = Ponpes::where('user_id', Auth::user()->id)->first();
        if (isset($ponpes)) {
            $data['santri'] = Santri::with('ponpes')
            ->where('ponpes_id', $ponpes->id)->get();
        } else {
            $data['santri'] = null;
        }
        return view('santri.index', compact('data'));
    }

    public function create()
    {

        $ponpes = Ponpes::where('user_id', '=', Auth::user()->id)->first();
        if (isset($ponpes)) {
            return view('santri.create');
        } else {
            return view('ponpes.register')->with('status', 'Lengkapi Data Pesantren terlebih dahulu');
        }
    }

    public function edit($id)
    {
        $data = Santri::with('ponpes')->where('id', $id)->first();
        return view('santri.edit', compact('data'));
    }

    public function store(Request $request)
    {
        $data = Ponpes::where('user_id', Auth::user()->id)->first();
        $create = Santri::create([
            'ponpes_id'     => $data->id,
            'nama'          => $request->nama,
            'daerah_id'     => $request->daerah_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp'         => $request->no_hp,
            'jumlah_hafalan' => $request->jumlah_hafalan,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);
        return redirect()->route('santri.index')->with('status', 'Data Santri berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $data = Ponpes::where('user_id', Auth::user()->id)->first();
        $santri = Santri::where('id', $id)->first();
        if ($santri->nama != $request->nama) {
            $santri->nama = $request->nama;
        }
        if (isset($request->daerah_id)) {
            $santri->daerah_id = $request->daerah_id;
        }
        if ($santri->jenis_kelamin != $request->jenis_kelamin) {
            $santri->jenis_kelamin = $request->jenis_kelamin;
        }
        if ($santri->no_hp != $request->no_hp) {
            $santri->no_hp = $request->no_hp;
        }
        if (isset($request->tanggal_lahir)) {
            $santri->tanggal_lahir = $request->tanggal_lahir;
        }
        if ($santri->jumlah_hafalan != $request->jumlah_hafalan) {
            $santri->jumlah_hafalan = $request->jumlah_hafalan;
        }
        $santri->save();
        return redirect()->route('santri.index')->with('status', 'Data Santri berhasil diubah');
    }

    public function destroy($id)
    {
        $santri = Santri::findOrFail($id);
        $santri->delete();

        return redirect()->route('santri.index')->with('status', 'Data Santri berhasil dihapus');
    }

    public function getSpaces($lat, $long, $radius)
    {
        $daerah = Santri::pluck('daerah_id')->toArray();
        return DB::table('daerah')
            ->select('*')
            ->selectRaw(
                '( 6371 *
                    acos( cos( radians(?) ) *
                    cos( radians( lat ) ) *
                    cos( radians(long ) - radians(?)) +
                    sin( radians(?) ) *
                    sin( radians( lat ) )
                    )
                    ) AS distance',
                [$lat, $long, $lat]
            )
            ->whereIn('id', '=', $daerah)
            ->havingRaw("distance < ?", [$radius])
            ->orderBy('distance', 'asc');
    }
}
