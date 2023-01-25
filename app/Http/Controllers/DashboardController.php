<?php

namespace App\Http\Controllers;

use App\Models\Butcher;
use App\Models\Purchase;
use App\Models\Sales;
use App\Models\TotalMeat;
use App\Models\TotalSkin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $skins = TotalSkin::select('id', 'total_skin')->first();
        $meats = TotalMeat::select('id', 'total_meat')->first();
        $purchase = Purchase::sum('total_purchase');
        $sale = Sales::sum('total_price');
        $mini_sale = Sales::select('item','customer','total_price')->paginate(3);
        $mini_purchase = Purchase::select('detail','total_purchase')->paginate(3);
        $mini_butcher = Butcher::select('name','skin_grade')->paginate(3);

        return view('dashboard', compact('skins','meats','purchase','sale','mini_sale','mini_purchase','mini_butcher'));
    }
}
