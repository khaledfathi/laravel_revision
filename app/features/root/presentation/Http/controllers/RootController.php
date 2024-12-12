<?php

namespace App\features\root\presentation\Http\controllers;
use App\Http\Controllers\Controller;

class RootController extends Controller{
    public function index(){
        return view('root.index');
    }
}