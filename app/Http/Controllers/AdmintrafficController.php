<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Admintraffic;
use App\Models\Informations;
use App\Models\Order;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Imports\ImportData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AdmintrafficController extends Controller
{
    public function dashboard()
    {
        return view('admintraffic.dashboard');
    }

    public function account()
    {
        return view('admintraffic.account');
    }

    public function order()
    {
        $order = Order::all();
        return view('admintraffic.order', compact('order'));
    }

    public function importAdmintraffic(Request $request)
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
            return redirect()->route('admintraffic.order')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('admintraffic.order')->with(['error' => 'Data Gagal Diimport!']);
        }
    }

    public function updateStatusSentAdmintraffic(Order $order)
    {
        Order::updateStatusSent($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('admintraffic.order');
    }

    public function updateStatusPaidAdmintraffic(Order $order)
    {
        Order::updateStatusPaid($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('admintraffic.order');
    }

    public function updateStatusPodAdmintraffic(Order $order)
    {
        Order::updateStatusPod($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('admintraffic.order');
    }

    public function updateStatusDelAdmintraffic(Order $order)
    {
        Order::updateStatusDel($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('admintraffic.order');
    }

    public function admintrafficMessage()
    {
        return view('admintraffic.message');
    }

    public function admintrafficMessageStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'description' => 'required',
        ]);
            
        Informations::create([
            'username' => Auth::user()->username,
            'description' => $request->description,
        ]);

        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        Alert::toast('Data baru berhasil dibuat.', 'success');
        return redirect()->route('admintraffic.message');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
     * @param  \App\Models\Admintraffic  $admintraffic
     * @return \Illuminate\Http\Response
     */
    public function show(Admintraffic $admintraffic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admintraffic  $admintraffic
     * @return \Illuminate\Http\Response
     */
    public function edit(Admintraffic $admintraffic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admintraffic  $admintraffic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admintraffic $admintraffic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admintraffic  $admintraffic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admintraffic $admintraffic)
    {
        //
    }
}
