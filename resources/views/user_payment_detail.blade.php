@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center mt-5">


            <!-- Check have a user -->
            @if ($data == "NoUser")
            <h1 class="text-danger ">Doesn't have user</h1>
            @else

            <h1 class="mt-2 mb-5 ">User Payment Details</h1>

            <!-- Check Data is emty -->
            @if ($data->isEmpty())
            <h2 class="text-danger ">User doesn't have any payment user</h2>
            @else

            <!-- Get All Oder set -->
            @foreach ($data as $oderDetails)


            <h1 class=" mt-5 text-info">Oder id<span class="text-danger"> {{ $oderDetails->id }} Oder </span> Payment Details</h1>


            <!-- Add Payment Button  -->
            <button class="btn btn-danger col-12 mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#model{{ $oderDetails->id }}">Add Payment</button>
            <!-- ==== -->


            <!-- Add Payment Modal  -->
            <div class="modal " id="model{{ $oderDetails->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pay Peyment</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('user.payment', ['userid' => $oderDetails->user_id, 'orderid' => $oderDetails->id] ) }}" method="POST" class=" col-lg-12 mt-2">
                            @csrf
                            <div class=" row">
                                <div class=" p-3 ">


                                    <!-- ---- Amount Fild ---- -->
                                    <div class="mb-3 row">
                                        <label for="amount" class="col-sm-2 col-form-label">Amount</label>
                                        <div class="col-sm-10">
                                            <input required type="number" name="amount" class="form-control" id="amount">
                                        </div>
                                    </div>
                                    <!-- ----- -->

                                    <!-- ---- Payment Fild ---- -->
                                    <div class="mb-3 row">
                                        <label for="paymentMethod" class="col-sm-2 col-form-label">Payment Method</label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="paymentMethod" class="form-control" id="paymentMethod">
                                        </div>
                                    </div>
                                    <!-- ---- -->

                                    <!-- ---- Date Fild ---- -->
                                    <div class="mb-3 row">
                                        <label for="date" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-10">
                                            <input required type="date" name="date" pattern="\d{4}-\d{2}-\d{2}" class="form-control" id="date">
                                        </div>
                                    </div>
                                    <!-- ----- -->


                                </div>

                                <!-- ---- On Submit Button ---- -->
                                <div class="p-3 mb-3">
                                    <button class="grid col-10 btn btn-primary">Submit</button>
                                </div>
                                <!-- ----- -->


                            </div>

                        </form>



                    </div>
                </div>
            </div>
            <!-- ==== -->




            <table class="table table-dark table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">Payment ID</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Payment Date</th>
                    </tr>
                </thead>
                <tbody>


                    <!-- ==== -->

                    <!-- Get All Payment set in one Oder -->
                    @foreach ($oderDetails->getpayments as $paymentDetails)
                    <tr>
                        <td scope="row">{{ $paymentDetails->id }}</td>
                        <td>{{ $paymentDetails->order_id }}</td>
                        <td>{{ $paymentDetails->amount }}</td>
                        <td>{{ $paymentDetails->payment_method }}</td>
                        <td>{{ $paymentDetails->payment_date }}</td>
                    </tr>
                    @endforeach
                    <!-- ==== -->



                </tbody>
            </table>





            @endforeach
            <!-- ==== -->


            @endif
            <!-- ==== -->


            @endif
            <!-- ==== -->




        </div>
    </div>

</div>

@endsection