<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Order;
use App\Models\Courier;
use App\Models\Informations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CourierController extends Controller
{

    public function dashboard()
    {
        return view('courier.dashboard');
    }

    public function account()
    {
        return view('courier.account');
    }

    public function order()
    {
        $order = Order::all();
        return view('courier.order', compact('order'));
    }

    public function updateStatusSent(Order $order)
    {
        Order::updateStatusSent($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('courier.order');
    }

    public function updateStatusPaid(Order $order)
    {
        Order::updateStatusPaid($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('courier.order');
    }

    public function updateStatusPod(Order $order)
    {
        Order::updateStatusPod($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('courier.order');
    }

    public function updateStatusDel(Order $order)
    {
        Order::updateStatusDel($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('courier.order');
    }

    public function courierMessage()
    {
        return view('courier.message');
    }

    public function courierMessageStore(Request $request)
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
        return redirect()->route('courier.message');
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
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show(Courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit(Courier $courier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courier $courier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courier $courier)
    {
        //
    }
}
