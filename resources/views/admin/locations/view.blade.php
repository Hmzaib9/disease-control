@extends('admin.master')
@section('main_content')

<!-- Main content -->
<section class="content">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif

    <div class="row">

        <div class="col-12">
            <div class="box">
              <div class="box-header">
                  <h4 class="box-title"><strong>Locations </strong> </h4>
              </div>
              <a href="{{route('locations.create')}}" class="btn btn-primary"><i class="ti-plus"></i>Add Location</a>

            <div class="box-body">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Location Name</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $location )
                        <tr>
                            <td>#{{$location->id ?? ''}}</td>
                            <td>{{$location->name ?? ''}}</td>
                            <td style="display:flex;">
                              <a  href="{{route('locations.edit' ,['location' => $location->id])}}  " class="btn btn-primary btn-sm">Edit</a>
                              <form action="{{ route('locations.destroy', $location->id) }}" method="POST">
                                @csrf
                                    @method('DELETE')
                                    <a href="{{ route('locations.destroy', $location->id) }}">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </a>
                              </form>

                            </td>
                          </tr>
                        @endforeach


                      <!-- Add more rows as needed -->
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

