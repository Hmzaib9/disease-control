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
                  <h4 class="box-title"><strong> Normal Ranges </strong> </h4>
              </div>
              <a href="{{route('normal_ranges.create', $parentid)}}" class="btn btn-primary"><i class="ti-plus"></i>  Add Range </a>

            <div class="box-body">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Test name</th>
                        <th>Age</th>
                        <th>Normal range type</th>
                        <th>Value</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($normal_ranges as $range )
                        <tr>
                            <td>#{{$range->id}}</td>
                            <td>{{$range->predfined_tests->test_name}}</td>
                            <td>{{$range->age}}</td>
                            <td>{{$range->normal_range_type}}</td>
                            @if ($range->normal_range_type == 'categorical')
                            <td>{{$range->normal_range_string}}</td>
                            @elseif ($range->normal_range_type == 'single_number')
                            <td>{{$range->normal_range_single_number}}</td>
                            @elseif ($range->normal_range_type == 'numeric')
                            <td>{{$range->normal_range_lower }} - {{ $range->normal_range_upper}} </td>
                            @endif
                            <td style="display:flex;">
                                <a  href="{{route('normal_ranges.edit' ,$range->id)}}  " class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('normal_ranges.destroy', $range->id) }}" method="POST">
                                  @csrf
                                      @method('DELETE')
                                      <a href="{{ route('normal_ranges.destroy', $range->id) }}">
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
<script src="{{asset('js/template.js')}}"></script>

@endsection

