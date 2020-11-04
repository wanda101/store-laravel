<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $custemer = User::count();
        // $revenue = Transaction::where('transaction_status','SUCCESS')->sum('total_price');
        // Menghitung total succesnya saja
        $revenue = Transaction::sum('total_price');
        $transaction = Transaction::count();

        return view('pages.admin.dashboard',[
            'customer'=> $custemer,
            'transaction'=> $transaction,
            'revenue'=> $revenue]);
    }
}
