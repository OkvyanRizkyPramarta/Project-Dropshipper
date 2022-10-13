<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Order;
use App\Models\Informations;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class Admin2Controller extends Controller
{
    public function dashboard()
    {
        return view('admin2.dashboard');
    }

    public function account()
    {
        return view('admin2.account');
    }

    public function order()
    {
        $order = Order::all();
        return view('admin2.order', compact('order'));
    }

    public function admin2Message()
    {
        return view('admin2.message');
    }

    public function showImageAdmin2(Order $order)
    {
        $image = Image::getImageByOrder($order->id);
        //dd($image);
        return view('admin2.showimage', compact('order', 'image'));
    }

    public function updateStatusReceivedAdmin2(Order $order)
    {
        Order::updateStatusReceived($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('kasir.order');
    }

    public function admin2MessageStore(Request $request)
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
        return redirect()->route('admin2.message');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
