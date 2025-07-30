<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home(){ return view('home'); }
    public function about(){ return view('about'); }
    public function history(){ return view('history'); }
    public function pricing(){ return view('pricing'); }
    public function example(){ return view('example'); }
}
