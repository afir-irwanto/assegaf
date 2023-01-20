<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $data = Sales::all();
        return view ('sales.index', compact('data'));
    }
}
