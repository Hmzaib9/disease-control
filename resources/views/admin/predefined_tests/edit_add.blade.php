@extends('admin.master')
@section('main_content')
  <!-- Content Wrapper. Contains page content -->
	  <div class="row">
		<!-- Main content -->
		<div class="col-lg-12 col-12">
			<div class="box">
			  <div class="box-header with-border">
				<h4 class="box-title">Add/Edit Test</h4>
			  </div>
			  <!-- /.box-header -->

              <form class="form">

                <div class="box-body">
                    <h4 class="box-title text-info mb-0"><i class="ti-marker-alt me-15"></i> Test Name</h4>
                    <hr class="my-15">
                    <div class="alert alert-danger" id="error-message" style="display: none">

                    </div>
                    <div class="alert alert-success" id="success-message"  style="display: none">

                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="test_name">Test Name</label>
                            <input type="text" class="form-control" id="main_test_name" name="test_name" value="{{ old('test_name', $defined_test->test_name ?? '') }}" placeholder="Enter Test name" >
                            <div class="alert alert-error"  id="test_name_error" style="display: none">

                            </div>
                        </div>

                      </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="measurement_unit">Measurement unit</label>
                                <input type="text" class="form-control" id="main_measurement_unit" name="measurement_unit" value="{{ old('measurement_unit', $defined_test->measurement_unit ?? '') }}" placeholder="Enter Measurement Unit" >
                                <div   id="measurement_unit_error" class="alert alert-error" style="display: none">

                                </div>

                            </div>

                        </div>


                    </div>
                    <h4 class="box-title text-info mb-0 mt-4"><i class="ti-marker-alt me-15"></i>Add Sub tests (Optional)</h4>
                    <hr class="my-15">


                    <div  id="results_section">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-label">Sub test name</label>
                                  <input type="text" id="subtest_name" class="form-control" placeholder="e.g Hemoglobin" id="result">
                              </div>
                          </div>

                          <div class="col-md-5">
                              <div class="form-group">
                                <label class="form-label">Mesurement Unit</label>
                                <input type="text" id="submeasurement_unit" class="form-control" placeholder="Mesurement Unit" >
                              </div>
                          </div>


                          <div class="col-md-1" style="margin-top: 10px;">
                            <div class="form-group">
                                <label class="form-label"></label>
                            <div>
                                <span data-icon="send" id="send" class=""><svg viewBox="0 0 24 24" height="24" width="24" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24"><title>send</title><path fill="currentColor" d="M1.101,21.757L23.8,12.028L1.101,2.3l0.011,7.912l13.623,1.816L1.112,13.845 L1.101,21.757z"></path></svg></span>
                            </div>
                            </div>
                              </div>
                        </div>
                   </div>
                   <div id="sub_errors" class="alert alert-error" style="display: none"></div>
                   <h4 class="box-title text-info mb-0 mt-4"></i>Overview</h4>
                   <hr class="my-15">
                   <div id="added_result">
                      <table class="table table-hover">
                     <thead>
                        <tr style="text-align: center;">
                            <th scope="col">Test Name</th>
                            <th scope="col"></th>
                            <th scope="col">Measurement Unit</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="subs">
                        <!-- SubTests-->
                        @php
                            $phpArray = $subs ?? [];
                            $jsonArray = json_encode($phpArray);
                        @endphp

                    </tbody>
                    </table>

                  </div>
                   <div class="box-footer">
                    <div class="form-group">
                        <button id="save" class="btn btn-primary">Save</button>
                        <a href="{{ route('predefined_tests.index') }}" class="btn btn-secondary">Cancel</a>
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
        $(document).ready(function() {

            all = {!! $jsonArray !!};
            subs_count = all.length+1;
            var main_test = $('#main_test_name').val();
            var main_measure = $('#main_measurement_unit').val();
            if(all.length !== 0)
            $('#subs').append('<tr style="text-align: center;"><td rowspan="'+ subs_count +'">'+main_test+'</td><td> </td> <td>'+main_measure+'</td>');

            all.forEach((element, key) => {
                $('#subs').append('<tr style="text-align: center;"><td>' + element.test_name + '</td><td>' + element.measurement_unit + '</td><td class="delete_close" id="' + key + '" style="cursor:pointer"> x </td></tr>');
            });
        })
        $('#send').click(function(){
            $('.alert-error').hide();

            test_name = $('#subtest_name').val();
            measurement_unit = $('#submeasurement_unit').val();
             main_test = $('#main_test_name').val();
             main_measure = $('#main_measurement_unit').val();

            if (test_name !== '' && measurement_unit !== '' && main_measure !=='' && main_test !== '') {
                all.push({'test_name': test_name, 'measurement_unit': measurement_unit});
                $('#subs').empty();
                subs_count = all.length+1;
                $('#subs').append('<tr style="text-align: center;"><td rowspan="'+ subs_count +'">'+main_test+'</td><td> </td> <td>'+main_measure+'</td>');

                all.forEach((element, key) => {
                    $('#subs').append('<tr style="text-align: center;"><td>' + element.test_name + '</td><td>' + element.measurement_unit + '</td><td class="delete_close" id="' + key + '" style="cursor:pointer"> x </td></tr>');
                });
            }else{
                $('.alert-error').hide();
                $('#sub_errors').text('All fields are required');
                $('#sub_errors').show()
            }
            $('#subtest_name').val('');
            $('#submeasurement_unit').val('');

        })

        $('#subs').on('click', '.delete_close', function() {
            arr_key = $(this).attr('id');
            all.splice(arr_key, 1);

            var main_test = $('#main_test_name').val();
            var main_measure = $('#main_measure_unit').val();

            $('#subs').empty();
            subs_count = all.length+1;
                $('#subs').append('<tr style="text-align: center;"><td rowspan="'+ subs_count +'">'+main_test+'</td><td> </td> <td>'+main_measure+'</td>');
                all.forEach((element, key) => {
                    console.log(element)
                    $('#subs').append('<tr style="text-align: center;"><td>' + element.test_name + '</td><td>' + element.measurement_unit + '</td><td class="delete_close" id="' + key + '" style="cursor:pointer"> x </td></tr>');
                });
            if(all.length == 0){
                $('#subs').empty()
            }
            $('#tstname').val('');
            $('#measurement_unit').val('');

        })



        $('#save').click(function(){

            event.preventDefault();
            $.ajax({
                url: '{{ isset($defined_test) ? route("predefined_tests.update", $defined_test->id) : route("predefined_tests.store") }}',
                method: 'POST',
                method: '{{ isset($defined_test) ? "PUT" : "POST" }}',

                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    all: all,
                    test_name : $('#main_test_name').val(),
                    measurement_unit : $('#main_measurement_unit').val(),
                },
                success: function(response) {
                // Handle the response from the controller
                console.log(response);
                window.location.href = '{{ route("predefined_tests.index") }}';
                },
                error: function(xhr, status, error) {
                    var errorResponse = xhr.responseJSON;
                    if (errorResponse && errorResponse.hasOwnProperty('errors')) {
                        // Display validation errors
                        var errors = errorResponse.errors;
                        $.each(errors, function(field, error) {
                            $('#'+field+'_error').text(error[0]);
                            $('.alert-error').hide();
                            $('#'+field+'_error').show()
                        });
                    }
                }
            });
        })
      </script>
@endsection

