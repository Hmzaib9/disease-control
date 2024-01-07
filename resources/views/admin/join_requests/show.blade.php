@extends('admin.master')
@section('main_content')
<div class="row">
    <!-- Main content -->
    <div class="col-lg-12 col-12">
        <div class="box">
          {{-- <div class="box-header with-border">
            <h4 class="box-title">Show Request</h4>
          </div> --}}

            <div class="box-body">
                <h4 class="box-title text-info mb-0"><i class="ti-marker-alt me-15"></i> Full Information</h4>
                <hr class="my-15">
                <div class="row">
                  <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item"><strong> lab Name : </strong> {{$request->name }} </li>
                        <li class="list-group-item"><strong >Registered at: </strong> {{$request->created_at }}</li>
                        <li class="list-group-item"><strong > Address: </strong> {{$request->address }}</li>
                        <li class="list-group-item"><strong > Email: </strong> {{$request->email }}</li>
                        <li class="list-group-item"><strong > Contact number: </strong> {{$request->contact_number }} </li>
                        <li class="list-group-item"> <strong >Head Doctor name : </strong>{{$request->head_doctor_name }}</li>
                        <li class="list-group-item"><strong >Head Doctor phone: </strong> {{$request->head_doctor_phone }}</li>
                        <li class="list-group-item"><strong > Technical officer name : </strong> {{$request->technical_officer_name }}</li>
                        <li class="list-group-item"><strong > Technical officer phone: </strong> {{$request->technical_officer_phone }}</li>
                      </ul>

                  </div>

                    </div>


                </div>
             <!-- /.box-body -->
            <div class="box-footer">
                <button type="button" class="btn btn-warning me-1" onclick="window.location.href = '{{ route('join.index') }}'">
                  <i class="ti-back-arrow"></i> Back
                </button>

            </div>
        </div>
        <!-- /.box -->
    </div>
  </div>
    <!-- /.row -->

 @endsection
@section('script')
<!-- Vendor JS -->
<script src="{{asset('js/vendors.min.js')}}"></script>
<script src="{{asset('icons/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('js/template.js')}}"></script>
@endsection

