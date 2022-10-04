<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use App\Models\Admintraffic;
use App\Models\Informations;
use App\Models\Order;
use App\Models\User;
use App\Models\Image;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Imports\ImportData;
use App\Exports\ExportData;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Rules\IsValidPassword;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

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

    public function exportAdmintraffic(Request $request){
        return Excel::download(new ExportData, 'orders.xlsx');
    }

    public function updateStatusCheckingAdmintraffic(Order $order)
    {
        Order::updateStatusChecking($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('admintraffic.order');
    }

    public function updateStatusCheckingPendingAdmintraffic(Order $order)
    {
        Order::updateStatusCheckingPending($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('admintraffic.order');
    }

    public function updateStatusConfirmAdmintraffic(Order $order)
    {
        Order::updateStatusConfirm($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('admintraffic.order');
    }

    public function updateStatusConfirmPendingAdmintraffic(Order $order)
    {
        Order::updateStatusConfirmPending($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('admintraffic.order');
    }

    public function updateStatusSentAdmintraffic(Order $order)
    {
        Order::updateStatusSent($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('admintraffic.order');
    }

    public function updateStatusSentPendingAdmintraffic(Order $order)
    {
        Order::updateStatusSentPending($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusPaidAdmintraffic(Order $order)
    {
        Order::updateStatusPaid($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('admintraffic.order');
    }

    public function updateStatusPaidPendingAdmintraffic(Order $order)
    {
        Order::updateStatusPaidPending($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusPodAdmintraffic(Order $order)
    {
        Order::updateStatusPod($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('admintraffic.order');
    }

    public function updateStatusPodPendingAdmintraffic(Order $order)
    {
        Order::updateStatusPodPending($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusDelAdmintraffic(Order $order)
    {
        Order::updateStatusDel($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('admintraffic.order');
    }

    public function updateStatusDelUndeliveryAdmintraffic(Order $order)
    {
        Order::updateStatusDelUndelivery($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('order.index');
    }

    public function updateStatusTransactionAdmintraffic(Order $order)
    {
        Order::updateStatusTransaction($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('kasir.order');
    }

    public function updateStatusTransactionUnfinishedAdmintraffic(Order $order)
    {
        Order::updateStatusTransactionUnfinished($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('kasir.order');
    }

    public function updateStatusReceivedAdmintraffic(Order $order)
    {
        Order::updateStatusReceived($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('kasir.order');
    }

    public function updateStatusReceivedPendingAdmintraffic(Order $order)
    {
        Order::updateStatusReceivedPending($order);
        Alert::toast('Status berhasil diperbarui.', 'success');
        return redirect()->route('kasir.order');
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

    public function userAdmintraffic()
    {
        $user = User::all();
        return view('admintraffic.user', compact('user'));
    }

    public function detailUserAdmintraffic($id)
    {
        $user = User::findOrFail($id);
        return view('admintraffic.detailuser', compact('user'));
    }

    public function editUserAdmintraffic(User $user)
    {
        return view('admintraffic.edituser', compact('user'));
    }

    public function updateUserAdmintraffic(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|regex:/^([^0-9]*)$/',
            'username' => 'required|min:4|alpha_dash',
            'email' => 'required|string|max:255|unique:users',
            'password' => ['required', 'string', new isValidPassword()],
            'role' => 'required',
             'id_card_number' => 'required|numeric|digits:16',
            'phone_number' => 'required|string|alpha_num|min:10|max:14|regex:/^([^a-zA-Z]*)$/|regex:/(0)[0-9]{9}/',
            'whatsapp_number' => 'string|alpha_num|min:10|max:14|regex:/^([^a-zA-Z]*)$/|regex:/(0)[0-9]{9}/',
        ]);

        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        $user = User::findOrFail($user->id);

        $user->update([
            'name'              => $request->name,
            'username'          => $request->username,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'role'              => $request->role,
            'id_card_number'    => $request->id_card_number,
            'phone_number'      => $request->phone_number,
            'whatsapp_number'   => $request->whatsapp_number,
        ]);

        Alert::toast('Data berhasil diedit.', 'success');
        return Redirect::to('/admintraffic/user');
        //return redirect()->route('admintraffic.user');
    }

    public function indexImageAdmintraffic()
    {
        $image = Image::all();
        $order = Order::all();
        return view('admintraffic.inputimage', compact('image', 'order'));
    }

    public function storeImageAdmintraffic(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'image' => 'required',
        ]);
            
        $image = new Image;
        $image->image = $request->file('image')->store('images', 'public');

        $order = new Order;
        $order->id = $request->get('order_id');

        $image->order()->associate($order);

        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        $image->save();

        Alert::toast('Data baru berhasil dibuat.', 'success');
        return redirect()->route('admintraffic.order');
    }

    public function showImageAdmintraffic(Order $order)
    {
        $image = Image::getImageByOrder($order->id);
        //dd($image);
        return view('admintraffic.showimage', compact('order', 'image'));
    }

    public function messageDetailAdmintraffic()
    {
        $informations = Informations::index();
        return view('admintraffic.detailmessage', compact('informations'));
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
    public function edit($id)
    {
        $order = Order::find($id);
        return view('admintraffic.editorder', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admintraffic  $admintraffic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order = Order::findOrFail($order->id);

        $order->update([
            'order_date'        => $request->order_date,
            'username'          => $request->username,
            'order_id'          => $request->order_id,
            'customer_address'  => $request->customer_address,
            'customer_phone'    => $request->customer_phone,
            'user_kelurahan'    => $request->user_kelurahan,
            'user_kecamatan'    => $request->user_kecamatan,
            'cod_ammount'       => $request->cod_ammount,
            'keterangan'        => $request->keterangan,
        ]);

        Alert::toast('Data berhasil diedit.', 'success');
        return redirect()->route('admintraffic.order');
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
