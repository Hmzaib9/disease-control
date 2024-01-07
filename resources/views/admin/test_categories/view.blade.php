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
                  <h4 class="box-title"><strong> Tests Categories </strong> </h4>
              </div>
              <a href="{{route('test_categories.create')}}" class="btn btn-primary"><i class="ti-plus"></i>  New Category</a>

            <div class="box-body">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Category name</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cat )
                        <tr>
                            <td>#{{$cat->id ?? ''}}</td>
                            <td>{{$cat->name ?? ''}}</td>
                            <td style="display:flex;">
                              <a  href="{{route('test_categories.edit' , $cat->id)}}" class="btn btn-primary btn-sm">Edit</a>
                              <form action="{{ route('test_categories.destroy', $cat->id) }}" method="POST">
                                @csrf
                                    @method('DELETE')
                                    <a href="{{ route('test_categories.destroy', $cat->id) }}">
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


<!-- Modal -->
{{-- <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Modal</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="myForm">
                    <div class="form-group">
                        <label for="predefined_test_id">Predefined Test:</label>
                        <select class="form-control" id="predefined_test_id" name="predefined_test_id">
                            <!-- Dropdown options here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" class="form-control" id="age" name="age">
                    </div>
                    <div class="form-group">
                        <label for="normal_range_type">Normal Range Type:</label>
                        <select class="form-control" id="normal_range_type" name="normal_range_type">
                            <!-- Dropdown options here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="normal_range_lower">Normal Range Lower:</label>
                        <input type="number" class="form-control" id="normal_range_lower" name="normal_range_lower">
                    </div>
                    <div class="form-group">
                        <label for="normal_range_upper">Normal Range Upper:</label>
                        <input type="number" class="form-control" id="normal_range_upper" name="normal_range_upper">
                    </div>
                    <div class="form-group">
                        <label for="normal_range_string">Normal Range String:</label>
                        <input type="text" class="form-control" id="normal_range_string" name="normal_range_string">
                    </div>
                    <div class="form-group">
                        <label for="normal_range_single_number">Normal Range Single Number:</label>
                        <input type="number" class="form-control" id="normal_range_single_number" name="normal_range_single_number">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
 @endsection
@section('script')
<!-- Vendor JS -->
<script src="{{asset('js/vendors.min.js')}}"></script>
<script src="{{asset('icons/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('js/template.js')}}"></script>

@endsection

