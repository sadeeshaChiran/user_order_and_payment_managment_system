@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">


        <div class="text-center mt-5">
            <h1>Welcome <span class="text-info "> user order and payment managment system </span></h1>

        </div>

   

    <!-- ---- Imort Count ---- -->
    @if (isset($data['importeCount']))
        <div class="alert alert-success mt-5">
            <h2>Total Imported: {{ $data['importeCount'] }}</h2>
        </div>
    @endif
    <!-- ==== -->
    
    <!-- ---- Skip Count ---- -->
    @if (isset($data['skippeCount']))
        <div class="alert alert-danger ">
            <h2>Total Skipped: {{ $data['skippeCount'] }}</h2>
        </div>
    @endif
    <!-- ==== -->

    

    <!-- ---- Valitation Error ---- -->
    @if (isset($data['errors']))
    @if (count($data['errors']) > 0)
    <div class="alert alert-danger mt-5">
        <h2 class="text-dark ">Validations :</h2>


        <ul>
            @foreach ($data['errors'] as $result)
                @if (!empty($result['errors']))
                    <li>

                        <!-- ---- Error Data ---- -->
                        <h3>Data :- </h3>
                        <ul>
                            @foreach ($result['data'] as $key => $value)
                                <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                            @endforeach
                        </ul>
                        <!-- ----- -->


                        <!-- ---- Error ---- -->
                        <h3>Error :- </h3>
                        <ul>
                            @foreach ($result['errors'] as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <!-- ----- -->

                    </li>
                @endif
            @endforeach
        </ul>


    </div>
    @endif
    @endif
    <!-- ==== -->




       
       
        <!-- ---- Form ---- -->
        <form action="{{ route('csvfile') }}" method="POST" enctype="multipart/form-data" class=" col-lg-12 mt-2">
            @csrf
            <div class=" row">
                <div class=" p-3 mt-5 ">


                    <!-- ---- Input CSV Fille ---- -->
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Enter CSV File</label>
                        <input class="form-control" type="file" id="csvFile" accept=" .csv" name="csvFile">
                    </div>
                    <!-- ----- -->

                    <!-- ---- On Submit Button ---- -->
                    <div class="p-3 mb-3">
                        <button class="grid col-12 btn btn-primary">Submit</button>
                    </div>
                    <!-- ----- -->

                </div>



            </div>

        </form>
        <!-- ==== -->

    </div>
</div>


</div>




@endsection