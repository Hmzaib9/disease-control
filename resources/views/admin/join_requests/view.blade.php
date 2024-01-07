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
                  <h4 class="box-title"><strong> Join Requests </strong> </h4>
              </div>

            <div class="box-body">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>LabName</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request )
                        <tr>
                            <td>#{{$request->id ?? ''}}</td>
                            <td>{{$request->name ?? ''}}</td>
                            <td>{{$request->address ?? ''}}</td>
                            <td>{{$request->email ?? ''}}</td>
                            <td>{{$request->contact_number ?? ''}}</td>
                            <td style="display:flex;">
                                <a  href="{{route('join.show' ,['id' => $request->id])}}  " class="btn btn-warning btn-sm">view</a>

                                <form action="{{ route('join.accept', ['id' => $request->id]) }}" method="POST">
                                    @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-success btn-sm">Accept</button>
                                  </form>
                                  <form action="{{ route('join.refuse',['id' => $request->id]) }}" method="POST">
                                    @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-danger btn-sm">Refuse</button>
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

