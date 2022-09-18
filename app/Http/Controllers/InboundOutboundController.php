<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Order;
use App\Models\User;
use App\Models\Image;
use App\Models\Informations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class InboundOutboundController extends Controller
{
    public function dashboard()
    {
        return view('inboundoutbound.dashboard');
    }

    public function account(User $user)
    {
        return view('inboundoutbound.account', compact('user'));
    }

    public function order()
    {
        $order = Order::all();
        return view('inboundoutbound.order', compact('order'));
    }

    public function updateStatusCheckingInboundOutbound(Order $order)
    {
        Order::updateStatusChecking($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('inboundoutbound.order');
    }

    public function updateStatusCheckingPendingInboundOutbound(Order $order)
    {
        Order::updateStatusCheckingPending($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function showImageInboundOutbound(Order $order)
    {
        $image = Image::getImageByOrder($order->id);
        //dd($image);
        return view('inboundoutbound.showimage', compact('order', 'image'));
    }

    public function inboundoutboundMessage()
    {
        return view('inboundoutbound.message');
    }

    public function inboundoutboundMessageStore(Request $request)
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
        return redirect()->route('inbundoutbound.message');
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
        $user = User::findOrFail($id);
        return view('inboundoutbound.edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::findOrFail($user->id);

        $user->update([
            'name'        => $request->name,
            'username'          => $request->username,
            'email'          => $request->email,
            'password' => Hash::make($request->password),
            'role'    => $request->role,
            'id_card_number'    => $request->id_card_number,
            'phone_number'    => $request->phone_number,
            'whatsapp_number'       => $request->whatsapp_number,
        ]);

        Alert::toast('Data berhasil diedit.', 'success');
        return redirect()->back();
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
