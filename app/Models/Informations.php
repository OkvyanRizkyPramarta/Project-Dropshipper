<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Informations extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'description',
    ];

    public static function index()
    {
        return Informations::all();
    }

    public static function store(Request $request)
    {
        Informations::create($request->all());
    }
}
