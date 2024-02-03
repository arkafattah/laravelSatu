<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        // $data['userCount'] = User::count();
        // $data['gejalaCount'] = Gejala::count();
        // $data['penyakitCount'] = Penyakit::count();
        // $data['pengetahuanCount'] = Pengetahuan::count();
        $data['title'] = 'Dashboard';
        return view('main.home.home', $data);
    }
}
