<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FluentController extends Controller
{
    //
    public function index(){
        echo "<h1>Hello World</h1>";

        $slice = Str::of('Welcome to my Home')->after('Welcome to');
        echo $slice;

        $replace = Str::of('Welcome to my Home')->replace('Home', 'Country');
        echo $replace;

        $fluentString = array('afterLast', 'append', 'lower', 'title', 'slug', 'subtr', 'trim...');
    }
}
