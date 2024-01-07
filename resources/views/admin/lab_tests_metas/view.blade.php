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
                  <h4 class="box-title"><strong>Locations </strong> </h4>
                  <h6 class="subtitle">Just click on word which you want to change and enter</h6>
              </div>
              <a href="{{route('locations.create')}}" class="btn btn-success"><i class="ti-plus"></i>Add Location</a>

            <div class="box-body">
              <div class="table-responsive">
                      <table id="locations_table" class="table editable-table table-bordered mb-0">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Location</th>

                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($locations as $location)
                            <tr>
                                <td >{{$location->id ?? '#'}}</td>
                                <td id="{{ $location->id }}" class="location_name">{{$location->name ?? 'Not Defined'}}</td>
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

 @endsection
@section('script')
<!-- Vendor JS -->
<script src="{{asset('js/vendors.min.js')}}"></script>
<script src="{{asset('icons/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('../vendor_components/datatable/datatables.min.js')}}"></script>
<script src="{{asset('../vendor_components/tiny-editable/mindmup-editabletable.js')}}"></script>
<script src="{{asset('../vendor_components/tiny-editable/numeric-input-example.js')}}"></script>
<script src="{{asset('js/template.js')}}"></script>
<script src="{{asset('js/pages/data-table.js')}}"></script>
<script src="{{asset('js/jquery.tabledit.js')}}"></script>

{{-- <script src="{{asset('js/pages/editable-tables.js')}}"></script> --}}

<script>
$(document).ready(function() {

$('#locations_table').Tabledit({
    url: 'locations/update',
    columns: {
        identifier: [0, 'id'], // Column index and corresponding database column name
        editable: [
          [1, 'name'], // Column index and corresponding database column name
        ]
      },
      restoreButton: false, // Disable restore button
      onSuccess: function(data, textStatus, jqXHR) {
        // Handle success behavior
      },
      onFail: function(jqXHR, textStatus, errorThrown) {
        // Handle failure behavior
      }
});
});


    // $('.location_name').on('click', function() {
    //     alert ('hi');
    //     var newValue = $(this).text();
    //     var id = $(this).val('id');
    //     $.ajax({
    //     url: 'locations/update' + id  ,
    //     type: 'POST',
    //     data: {
    //       _token: '{{ csrf_token() }}',
    //       newValue: newValue ,
    //     },
    //     success: function(response) {
    //       console.log(response);
    //     },
    //     error: function(xhr, status, error) {
    //       console.log(xhr.responseText);
    //     }
    //   });
    // })
</script>
@endsection

