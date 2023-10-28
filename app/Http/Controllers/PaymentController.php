<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($userid)
    {
        

        $user_ditail = User::where("id", $userid)->first();
        
        if ($user_ditail != null) {
            $data = Order::with('getPayments')->where('user_id', $userid)->get();
        }else{
            $data = "NoUser" ;
        }


        return view('user_payment_detail')->with('data', $data);
    }

    public function addPayment(Request $request , $user_id , $orderid){

        $data = [
            'order_id'=> $orderid,
            'amount'=> $request->amount,
            'payment_method'=> $request->paymentMethod,
            'payment_date'=> $request->date,
        ];
        

        Payment::create($data);

        return redirect()->back();

       
    }
}
