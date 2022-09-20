<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Rules\IsValidPassword;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register.index');
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

    public function messages() {
        return [
            'name.required'=>'Nama tidak dapat dikosongi',

            'username.required'=>'Username tidak dapat dikosongi',
            'username.min'=>'Karakter tidak boleh kurang dari 4',

            'email.required'=>'Email tidak dapat dikosongi',

            'password.required'=>'Email tidak dapat dikosongi',
            'password.min'=>'Karakter tidak boleh kurang dari 8',

            'role.required'=>'Email tidak dapat dikosongi',

            'id_card_number.required'=>'Email tidak dapat dikosongi',
            'id_card_number.min'=>'Karakter harus kurang dari 16',

            'phone_number.required'=>'Email tidak dapat dikosongi',
            'phone_number' => 'Karakter tidak boleh kurang dari 10'
            
        ];
    }

    protected function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|regex:/^([^0-9]*)$/',
            'username' => 'required|min:4|alpha-dash',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'string', new isValidPassword()],
            'role' => 'required',
            'id_card_number' => 'required|numeric|digits:16',
            'phone_number' => 'required|string|alpha_num|min:10|max:14|regex:/^([^a-zA-Z]*)$/',
        ]);

        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        //dd($request);


        User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'id_card_number' => $request['id_card_number'],
            'phone_number' => $request['phone_number'],
            'whatsapp_number' => $request['whatsapp_number'],
        ]);

        
        return redirect()->route('account.user');
        
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
