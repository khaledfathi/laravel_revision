<?php

namespace App\features\root\presentation\controllers;
use App\Http\Controllers\Controller;

class RootController extends Controller{
    public function index(){
        return view('root.index');
    }
}