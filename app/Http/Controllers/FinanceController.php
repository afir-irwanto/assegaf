<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Validator;
use Alert;
use App\Models\Sales;
use App\Models\Skin;
use App\Models\TotalMeat;
use App\Models\TotalSkin;
use App\Exports\PurchasesExport;
use App\Imports\PurchasesImport;
use App\Exports\SalesExport;
use App\Imports\SalesImport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class FinanceController extends Controller
{
    public function purchase()
    {
        $data = Purchase::all();
        return view('finance.purchase', compact('data'));
    }
    
    public function purchase_create()
    {
        return view('finance.purchase_create');
    }
    
    public function purchase_post(Request $request)
    {
        if (!isset($request->detail)) {
            toast('Details field required!' , 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->amount)) {
            toast('Amount field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->price)) {
            toast('Price field required!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'detail' => 'required|string|min:3',
                'price' => 'required|numeric|min:0',
                'amount' => 'required|numeric|min:0'
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data not valid!', 'error', 'top-right');
                return back()->withInput();
            } else {
                
                Purchase::create([
                    'detail' => $request->detail,
                    'amount' => $request->amount,
                    'price' => $request->price,
                    'total_purchase' => intval($request->amount) * intval($request->price)
                ]);
                
                Alert::success('Success', 'Data Created Successfully!');
                return redirect('/purchases_record');
            }
        }
    }
    
    public function sale()
    {
        $data = Sales::all();
        return view('finance.sale', compact('data'));
    }
    
    public function sale_create()
    {
        return view('finance.sale_create');
    }
    
    public function sale_post(Request $request)
    {
        if (!isset($request->item)) {
            toast('Item field required!' , 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->customer)) {
            toast('Customer field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->quantity)) {
            toast('Quantity field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->price)) {
            toast('Price field required!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'item' => 'required',
                'customer' => 'required',
                'quantity' => 'required|numeric|min:0',
                'price' => 'required|numeric|min:0'
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data not valid!', 'error', 'top-right');
                return back()->withInput();
            } else {
                if($request->item == 'Skin') {
                    $skin_awal = TotalSkin::select('id','total_skin')->first();
                    $skin = $skin_awal['total_skin'];
                    
                    if($request->quantity > $skin){
                        toast('Quantity field is over!', 'error', 'top-right');
                        return back()->withInput();
                    }else{
                        Sales::create([
                            'item' => $request->item,
                            'customer' => $request->customer,
                            'quantity' => $request->quantity,
                            'price' => $request->price,
                            'total_price' => intval($request->quantity) * intval($request->price)
                        ]);

                        $skin_awal->update([
                            'total_skin' => intval($skin) - intval($request->quantity)
                        ]);
                    }
                }

                if($request->item == 'Meat') {
                    $meat_awal = TotalMeat::select('id','total_meat')->first();
                    $meat = $meat_awal['total_meat'];
                    
                    if($request->quantity > $meat){
                        toast('Quantity field is over!', 'error', 'top-right');
                        return back()->withInput();
                    }else{
                        Sales::create([
                            'item' => $request->item,
                            'customer' => $request->customer,
                            'quantity' => $request->quantity,
                            'price' => $request->price,
                            'total_price' => intval($request->quantity) * intval($request->price)
                        ]);

                        $meat_awal->update([
                            'total_meat' => intval($meat) - intval($request->quantity)
                        ]);
                    }
                }                
                
                Alert::success('Success', 'Data Created Successfully!');
                return redirect('/sales_record');
            }
        }
    }
    
    public function purchases_record()
    {
        return view('finance.purchases_record');
    }

    public function export_excel_purchase($slug) 
    {
        return Excel::download(new PurchasesExport, 'purchases.'.$slug);
    }
    
    public function export_excel_sale($slug) 
    {
        return Excel::download(new SalesExport, 'sales.'.$slug);
    }

    public function export_pdf_purchase()
    {
        $data = Purchase::select('detail','amount','price','total_purchase','created_at')->get();
        $pdf = PDF::loadView('finance.purchase_pdf', compact('data'));
        return $pdf->download('purchase.pdf');
    }
    
    public function export_pdf_sale()
    {
        $sales = Sales::select('item', 'customer', 'quantity', 'price', 'total_price', 'created_at')->get();
        $pdf = PDF::loadView('finance.sale_pdf', compact('sales'));
        return $pdf->download('sale.pdf');
    }
}
