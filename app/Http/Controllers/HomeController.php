<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relatorio;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Relatorio::all();
        
        return view('dashboard',['relatorios'=>$data]);
    }

    function show(){
        
        //return Relatorio::all();

    }

    public function index2()
    {
        $dados = DB::table('relatorios')
            ->select(DB::raw('MONTH(data_do_ocorrido) as mes'), DB::raw('COUNT(*) as total'))
            ->groupBy('mes')
            ->get();
 
        return view('dashboard', ['dados' => $dados]);
    }
}
