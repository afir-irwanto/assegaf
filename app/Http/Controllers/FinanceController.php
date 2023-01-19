<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function purchase()
    {
        $data = Purchase::all();
        return view('finance.purchase', compact('data'));
    }
}
