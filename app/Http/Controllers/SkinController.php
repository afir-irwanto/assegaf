<?php

namespace App\Http\Controllers;

use App\Models\Butcher;
use App\Models\Skin;
use App\Models\TotalSkin;
use Illuminate\Http\Request;
use Validator;
use Alert;
use App\Models\Meat;
use App\Models\Purchase;
use App\Models\TotalMeat;
use Illuminate\Support\Facades\DB;

class SkinController extends Controller
{
    public function index()
    {
        $data = Skin::join('butchers','skins.butcher_id','=','butchers.id')->select('skins.id','skins.butcher_id','skins.sheet','skins.total_price','skins.meat_grade','skins.total_meat','butchers.name')->get();
        return view('skin.index', compact('data'));
    }

    public function create()
    {
        $butcher = Butcher::all();
        return view('skin.create', compact('butcher'));
    }

    public function getButcherDetails($id = 0)
    {
        $butcher = Butcher::find($id);
        $data = [
            'price' => $butcher->price,
            'skin_grade' => $butcher->skin_grade,
        ];

        return response()->json($data);
    }

    public function post(Request $request)
    {
        if (!isset($request->butcher_id)) {
            toast('Butcher field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->sheet)) {
            toast('Sheet field required!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'butcher_id' => 'required',
                'sheet' => 'required|numeric|min:0',
                'total_meat' => 'numeric',
                'meat_price' => 'numeric'
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data invalid!', 'error', 'top-right');
                return back()->withInput();
            } else {
                $butcher = Butcher::select('id', 'price')->where('id', $request->butcher_id)->first();
                $butcher_price = $butcher['price'];

                Skin::create([
                    'butcher_id' => $request->butcher_id,
                    'sheet' => $request->sheet,
                    'total_price' => intval($request->sheet) * intval($butcher_price),
                    'meat_grade' => $request->meat_grade,
                    'total_meat' => $request->total_meat
                ]);

                $total_skin = TotalSkin::select('id', 'total_skin')->first();
                $total_skin_awal = $total_skin['total_skin'];

                $total_skin->update([
                    'total_skin' => intval($total_skin_awal) + intval($request->sheet)
                ]);

                Purchase::create([
                    'total_purchase' => intval($request->sheet) * intval($butcher_price),
                    'detail' => 'Skin Purchase'
                ]);

                $meat_input = [[$request->meat_grade],[$request->total_meat],[$request->meat_price]];
                if(isset($meat_input)) {
                    Meat::create([
                        'butcher_id' => $request->butcher_id,
                        'weight' => $request->total_meat,
                        'price' => $request->meat_price,
                        'meat_grade' => $request->meat_grade,
                        'total_price' => intval($request->total_meat) * intval($request->meat_price)
                    ]);
                };

                $total_meat = TotalMeat::select('id', 'total_meat')->first();
                $total_meat_awal = $total_meat['total_meat'];
                
                $total_meat->update([
                    'total_meat' => intval($total_meat_awal) + intval($request->total_meat)
                ]);

                Alert::success('Success', 'Data Created Successfully!');
                return redirect('/skin');
            }
        }
    }

    public function total_skin()
    {
        $data = TotalSkin::select('id','total_skin')->first();
        $meat = TotalMeat::select('id','total_meat')->first();
        return view('skin.total_skin', compact('data', 'meat'));
    }
}
