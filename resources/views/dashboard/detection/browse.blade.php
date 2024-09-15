@extends("layouts.master")

@section("title")
@stop
@section("css")
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/select2/css/select2.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
@stop
@section("title_page")

@stop
@section("title_page2")

@stop
@section('content')
    <div class="container-fluid=">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between"  style="background-color: powderblue">
                        <h3>@lang('Detections')</h3>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn bg-info" data-toggle="modal"
                                data-target="#add-new-product" style="margin-right: auto;font-weight: bolder">
                            @lang("New Detection")
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="add-new-product" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form method="post" action="{{route("dashboard.detection.store")}}"
                                          class="modal-body">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLongTitle">@lang("New Detection")</h5>
                                            <button type="button" class="btn btn-outline-danger btn-sm close"
                                                    data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>


                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="patient_id">@lang('name')</label>
                                                <select required class="form-control select2bs4 " name="patient_id"
                                                        id="patient_id" multiple>
                                                    @foreach($patients as $patient)
                                                        <option value="{{$patient->id}}">{{$patient->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="detection_date">@lang("detection_date")</label>
                                                <input type="date" name="detection_date" id="detection_date"
                                                       class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="detection_type">@lang("detection_type")</label>
                                                <select name="detection_type" id="detection_type" class="form-control select2bs4"
                                                        required>
                                                    <option @if(request()->get("detection_type") == "كشف") selected
                                                            @endif value="detect">@lang("كشف")</option>
                                                    <option @if(request()->get("detection_type") == "استشارة") selected
                                                            @endif value="استشارة">@lang("redetect")</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="reports">@lang("reports")</label>
                                                <input type="text" name="reports" id="reports" class="form-control text-box">
                                            </div>
                                            <div class="form-group">
                                                <label for="payment">@lang("payment")</label>
                                                <input type="text" name="payment" id="payment"
                                                       class="form-control">
                                            </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">@lang("Close")</button>
                                                <button type="submit" class="btn btn-primary">@lang('Save Changes')</button>
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
                                    <th>@lang('Name')</th>
                                    <th>@lang('Detection_date')</th>
                                    <th>@lang('Detection_type')</th>
                                    <th>@lang('reports')</th>
                                    <th>@lang('Payment')</th>
                                    <th>@lang('Actions')</th>


                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($detections ?? [] as $detection)
                                    @php
                                        $i++
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td><a href="{{route('dashboard.patient.show',$patient->id)}}"></a>{{$detection->patient->name}}</td>
                                        <td>{{$detection->detection_date}}</td>
                                        <td>{{$detection->detection_type}}</td>
                                        <td>{{$detection->reports}}</td>
                                        <td>{{$detection->payment}}</td>


                                        <td>
                                            <a href="{{route('dashboard.detection.edit',$detection->id)}} "
                                               type="submit"
                                               class="btn btn-sm btn-primary">@lang('Edit')<i
                                                    class="fa fa-pen mx-1"></i></a>
                                            <form class="d-inline"
                                                  onsubmit="return confirm('Do you really want to submit the form?');"
                                                  method="post"
                                                  action="{{route('dashboard.detection.destroy',$detection->id)}}">
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
    <script src="{{URL::asset("assets/plugins/select2/js/select2.full.min.js")}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
@endsection



