<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){

        $data = Category::all();
        return $data->toJson();
    }
    
}
