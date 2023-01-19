<?php

namespace App\Http\Controllers;

use App\Models\Butcher;
use Validator;
use Illuminate\Http\Request;
use Alert;

class ButcherController extends Controller
{
    public function index()
    {
        $data = Butcher::all();
        return view('butcher.index', compact('data'));
    }

    public function create()
    {
        return view('butcher.create');
    }

    public function post(Request $request)
    {
        if (!isset($request->name)) {
            toast('Name field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->price)) {
            toast('Price field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->skin_grade)) {
            toast('Butcher`s Grade field required!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'name' => 'required|string|min:3',
                'price' => 'required|numeric',
                'skin_grade' => 'required'
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data not valid!', 'error', 'top-right');
                return back()->withInput();
            } else {
                Butcher::create([
                    'name' => $request->name,
                    'price' => $request->price,
                    'skin_grade' => $request->skin_grade,
                ]);

                Alert::success('Success', 'Data Created Successfully!');
                return redirect('/butcher');
            }
        }
    }

    public function edit($id)
    {
        $data = Butcher::all()->where('id',$id)->first();
        return view('butcher.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if (!isset($request->name)) {
            toast('Name field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->price)) {
            toast('Price field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->skin_grade)) {
            toast('Butcher`s Grade field required!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'name' => 'required|string|min:3',
                'price' => 'required|numeric',
                'skin_grade' => 'required'
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data not valid!', 'error', 'top-right');
                return back()->withInput();
            } else {
                Butcher::where('id', $id)->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'skin_grade' => $request->skin_grade,
                ]);

                Alert::success('Success', 'Data Updated Successfully!');
                return redirect('/butcher');
            }
        }
    }

    public function delete($id)
    {
        $data = Butcher::findOrfail($id);
        $data->delete();

        Alert::success('Success', 'Data Deleted Successfully!');
        return redirect('/butcher');
    }
}
