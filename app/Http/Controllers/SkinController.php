<?php

namespace App\Http\Controllers;

use App\Models\Butcher;
use App\Models\Skin;
use App\Models\TotalSkin;
use Illuminate\Http\Request;
use Validator;
use Alert;
use App\Models\Purchase;

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
                'sheet' => 'required|numeric|min:0'
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
                    'total_purchase' => intval($request->sheet) * intval($butcher_price)
                ]);

                Alert::success('Success', 'Data Created Successfully!');
                return redirect('/skin');
            }
        }
    }

    public function total_skin()
    {
        $data = TotalSkin::select('id','total_skin')->first();
        return view('skin.total_skin',compact('data'));
    }
}
