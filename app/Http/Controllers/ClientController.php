<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function getAllPosts(){
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        return $response->json();
    }
    public function getPostById($id){
        $response = Http::get(sprintf('https://jsonplaceholder.typicode.com/posts/%d', $id));
        return $response->json();
    }
}
