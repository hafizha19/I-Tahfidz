<?php

namespace App\Http\Controllers;

use App\Ponpes;
use App\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        
        return view('welcome', compact('data'));
    }

    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('ponpes.dashboard');
    }

}
