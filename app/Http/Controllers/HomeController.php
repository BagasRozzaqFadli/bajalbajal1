<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
public function welcome()
    {
        $produks = Produk::all();
        return view('welcome', compact('produks'));
    }
}
