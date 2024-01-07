@extends('admin.master')
@section('main_content')
  <!-- Content Wrapper. Contains page content -->
	  <div class="row">
		<!-- Main content -->
		<div class="col-lg-12 col-12">
			<div class="box">
			  <div class="box-header with-border">
				<h4 class="box-title">Add/Edit Range</h4>
			  </div>
			  <!-- /.box-header -->
              @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
              <form class="form" action="{{ isset($range) ? route('normal_ranges.update',$range->id) : route('normal_ranges.store')}}" method="POST">
                @csrf
                @if(isset($range))
                @method('PUT')
              @else
                  @method('POST')
              @endif
                <div class="box-body">
                    <h4 class="box-title text-info mb-0"><i class="ti-marker-alt me-15"></i> Normal Range</h4>
                    <hr class="my-15">
                    <div class="alert alert-danger" id="error-message" style="display: none">

                    </div>
                    <div class="alert alert-success" id="success-message"  style="display: none">

                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="predefined_test_id">Predefined Test:</label>
                            <select class="form-select" id="predefined_test_id" value="{{ old('predefined_test_id', $range->predefined_test_id ?? '') }}" name="predefined_test_id">

                                @foreach ($tests as $test)
                                    <option @if(isset($range) && $test->id == $range->predefined_test_id  ) selected @endif value="{{$test->id}}">{{$test->test_name}}</option>
                                @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $range->age ?? '') }}" >
                            @error('age')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="normal_range_type">Normal Range Type:</label>
                            <select class="form-select" id="normal_range_type" name="normal_range_type"  >
                                <option @if(isset($range) && $range->normal_range_type == 'numeric'  ) selected @endif  value="numeric">Numeric</option>
                                <option @if(isset($range) && $range->normal_range_type == 'categorical'  ) selected @endif value="categorical">Categorical</option>
                                <option @if(isset($range) && $range->normal_range_type == 'single_number'  ) selected @endif value="single_number">Single number</option>
                            </select>
                        </div>

                        <div class="form-group types" id="normal_range_lower" style="display: none">
                            <label for="normal_range_lower">Normal Range Lower:</label>
                            <input type="number" class="form-control" id="normal_range_lower" name="normal_range_lower" value="{{ old('normal_range_lower', $range->normal_range_lower ?? '') }}">
                            @error('normal_range_lower')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group types" id="normal_range_upper" style="display: none">
                            <label for="normal_range_upper">Normal Range Upper:</label>
                            <input type="number" class="form-control" id="normal_range_upper" value="{{ old('normal_range_upper', $range->normal_range_upper ?? '') }}" name="normal_range_upper">
                            @error('normal_range_upper')
                                <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>
                        <div class="form-group types" id="normal_range_string" style="display: none">
                            <label for="normal_range_string">Normal Range String:</label>
                            <input type="text" class="form-control" id="normal_range_string" name="normal_range_string" value="{{ old('normal_range_string', $range->normal_range_string ?? '') }}">
                            @error('normal_range_string')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group types" id="normal_range_single_number" style="display: none">
                            <label for="normal_range_single_number">Normal Range Single Number:</label>
                            <input type="number" class="form-control" id="normal_range_single_number" name="normal_range_single_number" value="{{ old('normal_range_single_number', $range->normal_range_single_number ?? '') }}">
                            @error('normal_range_single_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>



                    </div>


                   <div class="box-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                        {{-- <a href="{{route('normal_ranges.index',$id )}}" class="btn btn-secondary">Cancel</a> --}}
                      </div>
				  </div>

			</div>
			<!-- /.box -->
		</div>
	  </div>
		<!-- /.row -->


<!-- ./wrapper -->
@endsection
@section('script')
	<!-- Vendor JS -->
	<script src="{{asset('js/vendors.min.js')}}"></script>
	<script src="{{asset('js/pages/chat-popup.js')}}"></script>
    <script src="{{asset('icons/feather-icons/feather.min.js')}}"></script>

	<script src="{{asset('../vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
	<script src="{{asset('../vendor_components/echarts/dist/echarts-en.min.js')}}"></script>

	<!-- Rhythm Admin App -->
	<script src="{{asset('js/template.js')}}"></script>
	<script src="{{asset('js/pages/dashboard4.js')}}"></script>
    <script>
        $(document).ready(function(){
            rangetype = $('#normal_range_type').val();
            if(rangetype == 'numeric'){
                $('.types').hide();
                $('#normal_range_lower').show();
                $('#normal_range_upper').show();

            }
            if(rangetype == 'categorical'){
                $('.types').hide();
                $('#normal_range_string').show();
            }
            if(rangetype == 'single_number'){
                $('.types').hide();
                $('#normal_range_single_number').show();
            }
        })

        $('#normal_range_type').change(function(){
            rangetype = $(this).val();
            if(rangetype == 'numeric'){
                $('.types').hide();
                $('#normal_range_lower').show();
                $('#normal_range_upper').show();

            }
            if(rangetype == 'categorical'){
                $('.types').hide();
                $('#normal_range_string').show();
            }
            if(rangetype == 'single_number'){
                $('.types').hide();
                $('#normal_range_single_number').show();
            }
        })
    </script>
 @endsection

