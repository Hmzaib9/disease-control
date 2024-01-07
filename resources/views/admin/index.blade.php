
 @extends('admin.master')
 @section('main_content')
    <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-4 col-md-4 col-4">
                    <a href="{{route('tests.index')}}" target="_blank">
                        <div class="box">
                            <div class="box-body">
                                <div class="text-center">
                                    <h1 class="fs-50 text-primary"><i class="fa fa-heart"></i></h1>
                                    <h2>{{$medical_tests ?? 0}}</h2>
                                    <span class="badge badge-pill badge-primary px-10 mb-10">Tests</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-md-4 col-4">
                    <a href="{{route('institutions.index')}}" target="_blank">
                        <div class="box">
                            <div class="box-body">
                                <div class="text-center">
                                    <h1 class="fs-50 text-success"><i class="fa fa-hospital-o"></i></h1>
                                    <h2>{{$labs ?? 0}}</h2>
                                    <span class="badge badge-pill badge-success px-10 mb-10">Labs</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-md-4 col-4">
                    <a href="{{route('join.index')}}" target="_blank">
                        <div class="box" >
                            <div class="box-body">
                                <div class="text-center">
                                    <h1 class="fs-50 text-danger"><i class="fa fa-envelope-o"></i></h1>
                                    <h2>{{$joins ?? 0}}</h2>
                                    <span class="badge badge-pill badge-danger px-10 mb-10">Requests</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </section>
    <!-- /.content -->

@endsection
@section('script')
    <!-- Vendor JS -->
    <script src="{{asset('js/vendors.min.js')}}"></script>
    <script src="{{asset('../icons/feather-icons/feather.min.js')}}"></script>
    <!-- Rhythm Admin App -->
    <script src="{{asset('js/template.js')}}"></script>
    <script src="{{asset('js/pages/dashboard4.js')}}"></script>
@endsection
