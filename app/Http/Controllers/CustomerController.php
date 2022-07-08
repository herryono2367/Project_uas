<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
    public function index()
    {
      $customers= Customer::all();
//      dd($customers);
//        $customers= Customer::with('paket')->get();
        return view('pelanggan.index', compact('customers'));
    }
    public function create()
    {
        return view('pelanggan.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'alamat'=>'required',
            'durasi'=>'required',
            'harga'=>'required',
            'id_paket'=>'required',
            'id_tujuan'=>'required'
        ]);
         Customer::create($request->all());
         return redirect('customer');
    }
    public function destroy($id)
    {
        $customer=Customer::where('id',$id)->first();
        $customer->delete();
        return redirect('customer');
    }
    public function edit($id)
    {
        $customer = customer::find($id);
        return view('pelanggan.edit',  compact('customer'));
    }
    public function update(Request $request, Customer $customer )
    {
        $request->validate([
            'nama'=>'required',
            'email'=>'required',
            'alamat'=>'required',
            'durasi'=>'required',
            'harga'=>'required',
            'id_paket'=>'required',
            'id_tujuan'=>'required'
            ]);
        $customer->update($request->all());
        return redirect('customer');
    }
}


