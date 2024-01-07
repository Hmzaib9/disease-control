@extends('admin.master')
@section('main_content')
  <!-- Content Wrapper. Contains page content -->
	  <div class="row">
		<!-- Main content -->
		<div class="col-lg-12 col-12">
			<div class="box">
			  <div class="box-header with-border">
				<h4 class="box-title">Add/Edit Test Category</h4>
			  </div>
			  <!-- /.box-header -->
			  <form class="form" action="{{ isset($category) ? route('test_categories.update',$category->id) : route('test_categories.store')}}" method="POST">
				@csrf
                @if(isset($category))
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
                                <label for="location_name">Test Category Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name ?? '') }}" placeholder="Enter Category name" >
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
						</div>

					  </div>

					  </div>
				  <!-- /.box-body -->
				  <div class="box-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('test_categories.index') }}" class="btn btn-secondary">Cancel</a>
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

