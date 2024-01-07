@extends('admin.master')
@section('main_content')
<div class="content-wrapper">
    <div class="container-full">
      <!-- Main content -->
      <div class="col-lg-12 col-12">
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Add Admin</h4>
            </div>
            <!-- /.box-header -->
            <form class="form" action="{{route('locations.store')}}" method="POST">
                @csrf
                <div class="box-body">
                    <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> General Infos</h4>
                    <hr class="my-15">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                           <!-- Main content -->
                            <div class="form-group row">
                                <label class="col-form-label">Location Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="location">
                                </div>
                                @error('location')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- /.content -->
                        </div>
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
      <!-- /.content -->
    </div>
</div>
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
<script src="{{asset('js/pages/editable-tables.js')}}"></script>

@endsection

