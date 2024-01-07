@extends('admin.master')
@section('main_content')

<!-- Main content -->
<section class="content">
    <div class="col-12" style="display: none">
        <!-- Start an Alert -->
        <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-success myadmin-alert-top alerttop"> <i class="ti-user"></i><span id="alerttop"></span> <a href="#" class="closed">&times;</a> </div>
    </div>

    <div class="row">

        <div class="col-12">
            <div class="box">
              <div class="box-header">
                  <h4 class="box-title"><strong>Medical Tests</strong> </h4>
              </div>

            <div class="box-body">
              <div class="table-responsive">
                      <table class="table  mb-0">
                          <thead>
                              <tr>
                                  <th>Medical Number</th>
                                  <th>Patient Name</th>
                                  <th>Test Category </th>
                                  <th>Location</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($lab_tests as $key=>$test)
                            <tr>
                                <td >#{{$key}}</td>
                                <td >{{$test->first()->meta_data->patient_name}}</td>
                                <td>{{$test->first()->category->name}}</td>
                                <td >{{$test->first()->location->name}}</td>
                                <td style="display:flex;">
                                    <a class=" btn btn-primary btn-sm" href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">View</a>

                                    {{-- <a  href="{{route('tests.show' ,$key)}}  " class="btn btn-primary btn-sm">View</a> --}}
                                </td>
                            </tr>
                            @endforeach

                                </tbody>

                      </table>
                  </div>
            </div>
          </div>
      </div>

    </div>
    <div class="row">

    </div>
  </section>
  <!-- /.content -->


  <!-- Modal -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h4 class="modal-title" id="myLargeModalLabel">CBC Test</h4> -->

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title"> Blood Test  </h3>
                      <h6 class="box-subtitle"><strong> Name: </strong> Hamza </h6>
                      <h6 class="box-subtitle"><strong>age:</strong> 60</h6>
                      <h6 class="box-subtitle"><strong> of Medical test :</strong> 12/23/2023 </h6>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                          <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                            <thead>
                                <tr>
                                    <th>Test name</th>
                                    <th>Value</th>
                                    <th>Normal range</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>White Blood Count</td>
                                    <td>1400</td>
                                    <td>2000</td>
                                </tr>
                                <tr>
                                    <td>Red Blood Count</td>
                                    <td>1400</td>
                                    <td>2000</td>
                                </tr>
                                <tr>
                                    <td>Hemoglobin</td>
                                    <td>1400</td>
                                    <td>2000</td>
                                </tr>
                            </tbody>

                        </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-start" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- End Modal -->



  {{-- <!-- Modal -->
  <div class="modal center-modal fade" id="modal-center" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Your content comes here</p>
        </div>
        <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary float-end">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}
<!-- /.modal -->
 @endsection
@section('script')
<!-- Vendor JS -->
<script src="{{asset('js/vendors.min.js')}}"></script>
<script src="{{asset('icons/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('../vendor_components/datatable/datatables.min.js')}}"></script>
<script src="{{asset('../vendor_components/tiny-editable/mindmup-editabletable.js')}}"></script>
<script src="{{asset('../vendor_components/tiny-editable/numeric-input-example.js')}}"></script>
<script src="{{asset('js/template.js')}}"></script>

@endsection

