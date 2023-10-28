<?php

namespace App\Console\Commands;

use App\Models\Payment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Payments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv_file:csv {file}';

    /**
     * The console command description.
     *
     * @var string
     */



    protected $description = 'Import a CVC file';


    /**
     * Execute the console command.
     */

    public function handle()
    {
        // ---- CSV File ----
        $csvFile = $this->argument('file');


        // ---- Check CSV File ----
        if (!file_exists($csvFile)) {
            $this->error("Does not exist");
            return;
        }
        // ---- ==== ----


        // Import Count Variable
        $importe_count = 0;

        // Skip Count Variable
        $skippe_count = 0;

        // Skip Head Variable
        $skip_head = true;

        $csvFileHadel = fopen($csvFile, 'r');

        while (($data = fgetcsv($csvFileHadel)) !== false) {


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


            // ---- Not Validation Data Skip ----
            if ($validator->fails()) {
               
                // Error display
                $error = $validator->errors();
                $this->error($error);

                // ---->> Count Skip Data
                $skippe_count = $skippe_count + 1;
                continue;
            }
            // ---- ==== ----


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

        fclose($csvFileHadel);

        $this->info("Import count is $importe_count and skip count is $skippe_count");
    }
}
