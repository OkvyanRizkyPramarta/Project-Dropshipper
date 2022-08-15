<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Imports\ImportData;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return view('order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
    
        // menangkap file excel
        $file = $request->file('file');
    
        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        // import data
        $import = Excel::import(new ImportData(), storage_path('app/public/excel/'.$nama_file));

        //remove from server
        Storage::delete($path);

        if($import) {
            //redirect
            return redirect()->route('order.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('order.index')->with(['error' => 'Data Gagal Diimport!']);
        }
    }

    public function importView(Request $request){
        return view('importFile');
    }

    /*public function import(Request $request){
        Excel::import(new ImportData, $request->file('file')->store('files'));
        return redirect()->back();
    }*/

    /*public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
