<?php
declare(strict_type=1);

namespace App\features\root\presentation\controllers;
use App\Http\Controllers\Controller;

class RootController extends Controller{
    public function index(){
        return view('root.index');
    }
}