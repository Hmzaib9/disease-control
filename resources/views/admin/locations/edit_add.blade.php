@extends('admin.master')
@section('main_content')
  <!-- Content Wrapper. Contains page content -->
	  <div class="row">
		<!-- Main content -->
		<div class="col-lg-12 col-12">
			<div class="box">
			  <div class="box-header with-border">
				<h4 class="box-title">Add/Edit Location</h4>
			  </div>
			  <!-- /.box-header -->
			  <form class="form" action="{{ isset($location) ? route('locations.update',['location'=>$location->id]) : route('locations.store')}}" method="POST">
				@csrf
                @if(isset($location))
                  @method('PUT')
                @else
                    @method('POST')
                @endif

                <div class="box-body">
					  <h4 class="box-title text-info mb-0"><i class="ti-pencil me-15"></i> Please fill fields below: </h4>
					  <hr class="my-15">
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


					  <div class="row">
						<div class="col-md-6">
                            <div class="form-group">
                                <label for="location_name">Location Name</label>
                                <input type="text" class="form-control" id="location" name="location" value="{{ old('name', $location->name ?? '') }}" placeholder="Enter location name" >
                            </div>
                            @error('location')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
						</div>

					  </div>

					  </div>
				  <!-- /.box-body -->
				  <div class="box-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('locations.index') }}" class="btn btn-secondary">Cancel</a>
                      </div>
				  </div>
			  </form>
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
@endsection

