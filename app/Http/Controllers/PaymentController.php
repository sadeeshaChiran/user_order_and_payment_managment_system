<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function index($userid)
    {


        $user_ditail = User::where("id", $userid)->first();

        if ($user_ditail != null) {
            $data = Order::with('getPayments')->where('user_id', $userid)->get();
        } else {
            $data = "NoUser";
        }


        return view('user_payment_detail')->with('data', $data);
    }

    public function addPayment(Request $request, $user_id, $orderid)
    {

        $data = [
            'order_id' => $orderid,
            'amount' => $request->amount,
            'payment_method' => $request->paymentMethod,
            'payment_date' => $request->date,
        ];


        Payment::create($data);

        return redirect()->back();
    }



    public function addCSVfille(Request $request)
    {

        // Import Count Variable
        $importe_count = 0;

        // Skip Count Variable
        $skippe_count = 0;

        // Skip Head Variable
        $skip_head = true;


        // Initialize the validationResults array
        $validationResults = [];

        // Get the uploaded CSV file
        $file = $request->file('csvFile');

        // Read and parse the CSV data
        $csvData = array_map('str_getcsv', file($file->getRealPath()));


        foreach ($csvData as $data) {

            // ---- Skip Topic Line ----
            if ($skip_head) {
                $skip_head = false;
                continue;
            }
            // ---- ==== ----


            // ---- Data Set ----
            $dataSet = [
                'order_id' => $data[0],
                'amount' => $data[1],
                'payment_method' => $data[2],
                'payment_date' => $data[3],
            ];
            // ---- ==== ----


            // ---- Data Validation ----
            $validator = Validator::make($dataSet, [
                'order_id' => 'required|integer',
                'amount' => 'required|numeric',
                'payment_method' => 'required|string',
                'payment_date' => 'required|date_format:Y-m-d',
            ]);
            // ---- ==== ----

            if ($validator->fails()) {

                // ---->> Count Skip Data
                $skippe_count = $skippe_count + 1;

                $validationResults[] = [
                    'data' => $data,
                    'errors' => $validator->errors()->all(),
                ];
            } else {

                // ---- Creat Data  ----
                Payment::create([
                    'order_id' => $data[0],
                    'amount' => $data[1],
                    'payment_method' => $data[2],
                    'payment_date' => $data[3],

                ]);

                // ---- ==== ----


                // ---- Count Import Data ----
                $importe_count = $importe_count + 1;
                // ---- ==== ----

            }
        }


        $importecount = (string)$importe_count;
        $skippeCount = (string)$skippe_count;

        $dataSet = [
            'errors' => $validationResults,
            'importeCount' => $importecount,
            'skippeCount' => $skippeCount
        ];

        return view('welcome')->with('data', $dataSet);
    }
}
