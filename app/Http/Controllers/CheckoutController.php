<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Cart;
use App\Transaction;
use App\TransactionDetail;

use Exception;

use Midtrans\Snap;
use Midtrans\Config;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // save data user
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // proses checkout
        $code = 'STORE-' . mt_rand(00000,9999);
        $carts = Cart::with(['product','user'])
                ->where('users_id', Auth::user()->id)
                ->get();

        // ngebuat transaksi
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'inscurance_price' => 0,
            'shipping_price' => 0,
            'total_price' => $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code
            ]);
        // ngebuat detail
        foreach ($carts as $cart){
            $trx = 'STORE-' . mt_rand(00000,9999);

            TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'products_id' => $cart->product->id,
            'price' => $cart->product->price,
            'shipping_status' => 'PENDING',
            'resi' => '',
            'code' => $trx
            ]);
        }

        // delete cart data
        Cart::where('users_id', Auth::user()->id)->delete();

        // return dd($transaction);
        // konfirmasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is$is3ds');

        // buat array untuk di kirim ke midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount'=> (int) $request->total_price
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email'=> Auth::user()->email
            ],
            'enabled_payments' => [
                'gopay','permata_va','bank_transfer'
            ],
            'vtweb' => []
        ];

        try {
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            return redirect($paymentUrl);
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function callback(Request $request)
    {
        // sdcsd
    }
}
