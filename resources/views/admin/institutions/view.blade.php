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
                  <h4 class="box-title"><strong>Labs </strong> </h4>
                  {{-- <h6 class="subtitle">Just click on word which you want to change and enter</h6> --}}
              </div>
              <a href="{{route('institutions.create')}}" class="btn btn-success"><i class="ti-plus"></i>Add Lab</a>

            <div class="box-body">
              <div class="table-responsive">
                      <table class="table  mb-0">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Active</th>
                                  <th>Email</th>
                                  <th>Contact number</th>
                                  <th>Head_doctor_name</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($labs as $lab)
                            <tr>
                                <td >{{$lab->id ?? '#'}}</td>
                                <td id="{{ $lab->id }}">{{$lab->name ?? ''}}</td>
                                <td id="{{ $lab->id }}">@if($lab->active== 0) {{'Not Active'}} @else {{'Active'}} @endif</td>
                                <td id="{{ $lab->id }}">{{$lab->email ?? ' '}}</td>
                                <td id="{{ $lab->id }}">{{$lab->contact_number ?? 'Not Defined'}}</td>
                                <td id="{{ $lab->id }}">{{$lab->head_doctor_name ?? 'Not Defined'}}</td>
                                <td style="display:flex;">
                                    <a  href="{{route('institutions.edit' ,['institution' => $lab->id])}}  " class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('institutions.destroy', $lab->id) }}" method="POST">
                                      @csrf
                                          @method('DELETE')
                                          <a href="{{ route('institutions.destroy', $lab->id) }}">
                                              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                          </a>
                                    </form>
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

