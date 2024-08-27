<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeControlller extends Controller
{
    public function test(){
     return Inertia::render('test2');
    }
}
