<?php

namespace App\Http\Controllers;

use App\Daerah;
use App\Ponpes;
use App\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use function PHPSTORM_META\type;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('auth', ['except' => 'welcome']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $data['santri'] = Santri::all();
        $data['ponpes'] = Ponpes::all();
        $daerah = Santri::pluck('daerah_id')->toArray();
        $daerahArr = is_array($daerah) ? $daerah : [$daerah];
        $santri = Santri::with('daerah', 'ponpes.daerah')
            // ->whereIn('id', $daerahArr)
            ->get();
        $temp = '';
        foreach ($santri as $s) {
            if ($s->ponpes->daerah->kabupaten_name == $s->daerah->kabupaten_name) {
                $temp .= '{"type": "Feature",
                "properties":{
                    "title": "' . $s->daerah->kabupaten_name . '",
                    "marker-color": "#0000CD",
                    "marker-size": "small",
                    "marker-symbol":"star"
                },
                "geometry":{
                    "type": "Point",
                    "coordinates": [' . $s->daerah->long . ',' . $s->daerah->lat . ']
                }
            },';
            } else {
                $temp .= '{"type": "Feature",
                    "properties":{
                        "title": "' . $s->daerah->kabupaten_name . '",
                        "marker-color": "#f86767",
                        "marker-size": "small",
                        "marker-symbol":"star"
                    },
                    "geometry":{
                        "type": "Point",
                        "coordinates": [' . $s->daerah->long . ',' . $s->daerah->lat . ']
                    }
                },';
            }
        }
        $data['js'] = $temp;
        $prov = Daerah::select('province_code')->distinct()->get();
        foreach ($prov as $p) {
            $data['prov'][$p->province_code]['name'] = Daerah::where('province_code', $p->province_code)->first()->province_name;
            $data['prov'][$p->province_code]['same'] = 0;
            $data['prov'][$p->province_code]['total'] = 0;
            foreach ($santri as $s) {
                if ($s->daerah->province_code == $p->province_code) {
                    $data['prov'][$p->province_code]['total'] += 1;
                    if ($s->ponpes->daerah->province_code == $p->province_code) {
                        $data['prov'][$p->province_code]['same'] += 1;
                    }
                }
            }
        }
        return view('welcome', compact('data'));
    }

    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $santri = Santri::with('daerah', 'ponpes.daerah')
            // ->whereIn('id', $daerahArr)
            ->get();
        $temp = '';
        foreach ($santri as $s) {
            if ($s->ponpes->daerah->kabupaten_name == $s->daerah->kabupaten_name) {
                $temp .= '{"type": "Feature",
                "properties":{
                    "title": "' . $s->daerah->kabupaten_name . '",
                    "marker-color": "#0000CD",
                    "marker-size": "small",
                    "marker-symbol":"star"
                },
                "geometry":{
                    "type": "Point",
                    "coordinates": [' . $s->daerah->long . ',' . $s->daerah->lat . ']
                }
            },';
            } else {
                $temp .= '{"type": "Feature",
                    "properties":{
                        "title": "' . $s->daerah->kabupaten_name . '",
                        "marker-color": "#f86767",
                        "marker-size": "small",
                        "marker-symbol":"star"
                    },
                    "geometry":{
                        "type": "Point",
                        "coordinates": [' . $s->daerah->long . ',' . $s->daerah->lat . ']
                    }
                },';
            }
        }
        $data['js'] = $temp;
        return view('ponpes.dashboard', compact('data'));
    }
}
