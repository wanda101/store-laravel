<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::take(6)->get();
        // $products = Product::with(['galleries'])->take(8)->latest()->get(); cara menampilkan terahir foto
        $products = Product::with(['galleries'])->take(8)->latest()->get();
        return view('pages.home',['categories' => $categories,'products' => $products]);
    }
}
