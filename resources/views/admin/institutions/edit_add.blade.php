@extends('admin.master')
@section('main_content')
  <!-- Content Wrapper. Contains page content -->
	  <div class="row">
		<!-- Main content -->
		<div class="col-lg-12 col-12">
			<div class="box">
			  <div class="box-header with-border">
				<h4 class="box-title">Add Lab</h4>
			  </div>
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


              <form class="form" action="{{ isset($institute) ? route('institutions.update',['institution'=>$institute->id]) : route('institutions.store')}}" method="POST">
                @csrf
                @if(isset($institute))
                  @method('PUT')
                @else
                    @method('POST')
                @endif
                <div class="box-body">
                    <h4 class="box-title text-info mb-0"><i class="ti-marker-alt me-15"></i> Basic Information</h4>
                    <hr class="my-15">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label">Name</label>
                          <input type="text" class="form-control" name="name" value="{{ old('name', $institute->name ?? '') }}" placeholder="Name">
                          @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="active" value="{{ old('name', $institute->active ?? '') }}">
                              <option value="1">active</option>
                              <option value="0">Not active</option>
                            </select>
                            @error('active')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        </div>


                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="form-label">Address</label>
                              <input type="text" class="form-control" value="{{ old('address', $institute->address ?? '') }}" placeholder="Address" name="address">
                              @error('address')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                            </div>

                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label">Map Link</label>
                          <input type="text" class="form-control" placeholder="Map Link" value="{{ old('map_link', $institute->map_link ?? '') }}" name="map_link">
                          @error('map_link')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="form-label">E-mail</label>
                              <input type="email" class="form-control" name="email" value="{{ old('email', $institute->email ?? '') }}" placeholder="E-mail">
                              @error('email')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label">Contact Number</label>
                            <input type="text" name="contact_number" class="form-control" placeholder="contact_number" value="{{ old('name', $institute->contact_number ?? '') }}">
                            @error('contact_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        </div>


                    </div>
                    <h4 class="box-title text-info mb-0 mt-20"><i class="ti-clipboard me-15"></i>Other Information</h4>
                    <hr class="my-15">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="form-label">Head Master Name</label>
                              <input type="text" value="{{ old('head_master_name', $institute->head_doctor_name ?? '') }}" name="head_doctor_name" class="form-control" placeholder="Head Doctor Name">
                              @error('head_doctor_name')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                            </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label">Head Master Phone</label>
                            <input type="number" class="form-control" value="{{ old('head_master_phone', $institute->head_doctor_phone ?? '') }}" name="head_doctor_phone" placeholder="Head Doctor Phone">
                            @error('head_doctor_phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Technical officer name</label>
                                <input type="text" class="form-control" value="{{ old('technical_officer_name', $institute->technical_officer_name ?? '') }}" name="technical_officer_name" placeholder="Technical officer name">
                                @error('technical_officer_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Technical officer phone</label>
                              <input type="number" class="form-control" name="technical_officer_phone" value="{{ old('technical_officer_phone', $institute->technical_officer_phone ?? '') }}" placeholder="Technical officer phone">
                              @error('technical_officer_phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                      </div>



                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" class="btn btn-warning me-1">
                      <i class="ti-trash"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                      <i class="ti-save-alt"></i> Save
                    </button>
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

