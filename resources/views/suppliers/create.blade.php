@extends('templates.main')

@section('title_page')
    New Vendor
@endsection

@section('breadcrumb_title')
    vendors
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <a href="{{ route('suppliers.index') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-arrow-left"></i> Back</a>
                </div>

                <form action="{{ route('suppliers.store') }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="reg_no">Reg No<small>(Reg No will change according to recent data)</small></label>
                                    <input name="reg_no" id="reg_no" value="{{ $nomor }}" class="form-control @error('reg_no') is-invalid @enderror" readonly>
                                    @error('reg_no')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Vendor Name</label>
                                    <input name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>

                            
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="sap_code">SAP Code</label>
                                    <input name="sap_code" id="sap_code" value="{{ old('sap_code') }}" class="form-control @error('sap_code') is-invalid @enderror">
                                    @error('sap_code')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                              <div class="form-group">
                                  <label for="badan_hukum">Badan Hukum</label>
                                  <select name="badan_hukum" class="form-control">
                                    @foreach ($badan_hukum as $item)
                                      <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-4">
                            <div class="form-group">
                                <label for="npwp">NPWP</label>
                                <input name="npwp" id="npwp" value="{{ old('npwp') }}" class="form-control @error('npwp') is-invalid @enderror">
                                @error('npwp')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                            </div>
                        </div>
                        </div>

                        {{-- input multiple emails --}}
                        <div class="row">
                          <div class="col-12">
                            <div class="form-group">
                              <label for="emails">Emails <small>(use comma to separate between emails)</small></label>
                              <input class="form-control" type="email" name="emails" class="form-control" multiple style="width: 100%;">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-12">
                            <div class="form-group">
                              <label>Specifications <small>(choose one or more)</small></label>
                              <div class="select2-purple">
                                <select name="specifications[]" class="select2 form-control" data-dropdown-css-class="select2-purple" multiple="multiple" data-placeholder="Select specifications" style="width: 100%;">
                                  @foreach ($specifications as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-12">
                            <div class="form-group">
                              <label>Principal Products <small>(choose one or more)</small></label>
                              <div class="select2-purple">
                                <select name="brands[]" class="select2 form-control @error('brands') is-invalid @enderror" multiple="multiple" data-placeholder="Select brands" style="width: 100%;">
                                  @foreach ($brands as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                              @error('brands')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="experience">Established <small>(Thn pendirian usaha)</small></label>
                                    <input type="text" name="experience" id="experience" value="{{ old('experience') }}" class="form-control @error('experience') is-invalid @enderror">
                                    @error('experience')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="jumlah_karyawan">Number of Employees</label>
                                    <input name="jumlah_karyawan" id="jumlah_karyawan" value="{{ old('jumlah_karyawan') }}" class="form-control @error('jumlah_karyawan') is-invalid @enderror">
                                    @error('jumlah_karyawan')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="banned">Banned</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-12">
                            {{-- text area of description --}}
                            <div class="form-group">
                              <label for="remarks">Remarks</label>
                              <textarea name="remarks" id="remarks" class="form-control" rows="3">{{ old('remarks') }}</textarea>
                            </div>
                          </div>
                        </div>
                      
                    </div> <!-- /.card-body -->

                <div class="card-header">
                    <h3 class="card-title">Branches</h3>
                  {{-- <button type="button" id="add" class="btn btn-sm btn-primary float-right">Add more branches</button> --}}
                </div>
                <div class="card-body">
                   <table class="table">
                    <thead>
                      <tr>
                        <th>Address1</th>
                        <th>Address2</th>
                        <th>City</th>
                        <th>Province</th>
                        <th>ZIP</th>
                        <th>Phone</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody id="branches_table">
                      <tr>
                        <td>
                          <input type="text" name="branches[0][address1]" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="branches[0][address2]" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="branches[0][city]" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="branches[0][province]" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="branches[0][postal_code]" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="branches[0][phone]" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="branches[0][email]" class="form-control">
                        </td>
                        <td>
                          <button type="button" class="btn btn-xs btn-success" id="add_row">add</button>
                        </td>
                      </tr>
                    </tbody>
                    </table>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-success btn-block">Submit</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('scripts')
<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
  
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>
<script>
    // when add row button is clicked
    var i = 0;
    $('#add_row').click(function () {
      ++i;
      $('#branches_table').append(
        '<tr>' +
          '<td>' +
            '<input type="text" name="branches['+i+'][address1]" class="form-control">' +
          '</td>' +
          '<td>' +
            '<input type="text" name="branches['+i+'][address2]" class="form-control">' +
          '</td>' +
          '<td>' +
            '<input type="text" name="branches['+i+'][city]" class="form-control">' +
          '</td>' +
          '<td>' +
            '<input type="text" name="branches['+i+'][province]" class="form-control">' +
          '</td>' +
          '<td>' +
            '<input type="text" name="branches['+i+'][postal_code]" class="form-control">' +
          '</td>' +
          '<td>' +
            '<input type="text" name="branches['+i+'][phone]" class="form-control">' +
          '</td>' +
          '<td>' +
            '<input type="text" name="branches['+i+'][email]" class="form-control">' +
          '</td>' +
          '<td>' +
            '<button class="btn btn-xs btn-danger remove_row">delete</button>' +
          '</td>' +
        '</tr>'
      )
    })

    // when remove row button is clicked
    $(document).on('click', '.remove_row', function () {
        $(this).parents('tr').remove()
    })
</script>
@endsection