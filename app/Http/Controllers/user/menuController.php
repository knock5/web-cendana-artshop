<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class menuController extends Controller
{
    //
    public function index()
    {
        $produk = Product::all();
        return view('user.menu.index', compact('produk'));
    }
}
