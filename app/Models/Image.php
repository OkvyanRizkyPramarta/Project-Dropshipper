<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'image',
    ];

    public function order() 
    {
        return $this->belongsTo(Order::class);
    }

    public static function index()
    {
        return Image::all();
    }

    public static function store(Request $request)
    {
        Image::create($request->all());
    }

    public static function getImageByOrder($id)
    {
        return Image::where('order_id', $id)->get();
    }
}
