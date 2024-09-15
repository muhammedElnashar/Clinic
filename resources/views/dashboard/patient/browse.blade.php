@extends("layouts.master")

@section("title")

@stop
@section("css")

    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css")}}">

@stop
@section("title_page")

@stop
@section("title_page2")

@stop
@section('content')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between" style="background-color: powderblue">
                        <!-- Button trigger modal -->
                        <h3>@lang("patients")</h3>
                        <button type="button" class="btn bg-info" data-toggle="modal"
                                data-target="#add-new-product" style="margin-right: auto; font-weight: bolder">
                            @lang("New patient")
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="add-new-product" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form method="post" action="{{route("dashboard.patient.store")}}"
                                          class="modal-body">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title-" id="exampleModalLongTitle">@lang("New patient")</h5>
                                            <button type="button" class="btn btn-outline-danger btn-sm close"
                                                    data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>


                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">@lang("name")</label>
                                                <input type="text" name="name" id="name" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="age">@lang("age")</label>
                                                <input type="text" name="age" id="age" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">@lang("address")</label>
                                                <input type="text" name="address" id="address" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone_number">@lang("phone_number")</label>
                                                <input type="text" name="phone_number" id="phone_number"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="gander">@lang('gander')</label>
                                                <select required class="form-control" name="gander" id="gander">
                                                    <option selected value="@lang("male") @endlang">@lang('male')  </option>
                                                    <option value="@lang("female")">@lang('female') </option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="notes">@lang("notes")</label>
                                                <input type="text" name="notes" id="notes" class="form-control">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">@lang("Close")</button>
                                            <button type="submit" class="btn btn-primary">@lang("Save Changes")</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>@lang('ID')</th>
                                    <th>@lang('name')</th>
                                    <th>@lang('age')</th>
                                    <th>@lang('address')</th>
                                    <th>@lang('phone_number')</th>
                                    <th>@lang('gander')</th>
                                    <th>@lang('notes')</th>
                                    <th>@lang('Actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($patients ?? [] as $patient)
                                    @php
                                        $i++
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>

                                        <td>
                                            <a href="{{route('dashboard.patient.show',$patient->id)}}">{{$patient->name}}</a>
                                        </td >

                                        <td>{{$patient->age}}</td>
                                        <td>{{$patient->address}}</td>
                                        <td>{{$patient->phone_number}}</td>
                                        <td>{{$patient->gander}}</td>
                                        <td>{{$patient->notes}}</td>


                                        <td>
                                            <a href="{{route('dashboard.patient.edit',$patient->id)}} " type="submit"
                                               class="btn btn-sm btn-primary">@lang('Edit')<i
                                                    class="fa fa-pen mx-1"></i></a>
                                            <form class="d-inline"
                                                  onsubmit="return confirm('Do you really want to submit the form?');"
                                                  method="post"
                                                  action="{{route('dashboard.patient.destroy',$patient->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger ">@lang('Delete')<i
                                                        class="fa fa-trash mx-1"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

        </div>


@endsection

@section('script')
    <script src="{{URL::asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    </script>

@endsection




