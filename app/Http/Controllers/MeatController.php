<?php

namespace App\Http\Controllers;

use App\Models\Butcher;
use Illuminate\Http\Request;
use App\Models\Meat;
use App\Models\TotalMeat;
use Validator;
use Alert;

class MeatController extends Controller
{
    public function index()
    {
        $meats = Meat::join('butchers', 'meats.butcher_id', '=', 'butchers.id')->select('meats.id', 'meats.butcher_id', 'meats.weight', 'meats.price', 'meats.meat_grade', 'meats.total_price', 'butchers.name')->get();
        return view('meat.index', compact('meats'));
    }
    
    public function create()
    {
        $butcher = Butcher::all();
        return view('meat.create', compact('butcher'));
    }
    
    public function post(Request $request)
    {
        if (!isset($request->butcher_id)) {
            toast('Butcher field required!' , 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->weight)) {
            toast('Weight field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->price)) {
            toast('Price field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->meat_grade)) {
            toast('Meat Grade field required!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'weight' => 'required|numeric|min:2',
                'price' => 'required|numeric',
                'meat_grade' => 'required'
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data not valid!', 'error', 'top-right');
                return back()->withInput();
            } else {
                
                Meat::create([
                    'butcher_id' => $request->butcher_id,
                    'weight' => $request->weight,
                    'price' => $request->price,
                    'meat_grade' => $request->meat_grade,
                    'total_price' => intval($request->weight) * intval($request->price)
                ]);
                
                $total_meat = TotalMeat::select('id', 'total_meat')->first();
                $total_meat_awal = $total_meat['total_meat'];
                
                $total_meat->update([
                    'total_meat' => intval($total_meat_awal) + intval($request->weight)
                ]);
                
                Alert::success('Success', 'Data Created Successfully!');
                return redirect('/meat');
            }
        }
        
    }
}    