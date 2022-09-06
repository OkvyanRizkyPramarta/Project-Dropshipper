<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use App\Models\Informations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.index');
    }

    public function user()
    {
        $user = User::all();
        return view('account.user', compact('user'));
    }

    public function detailUser($id)
    {
        $user = User::findOrFail($id);
        return view('account.detail', compact('user'));
    }

    public function detailMessage()
    {
        $informations = Informations::index();
        return view('account.detailmessage', compact('informations'));
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
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('account.edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
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
        return redirect()->route('account.user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Alert::toast('Data berhasil dihapus.', 'success');
        return redirect()->back();
    }
}
