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

    @section('content')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7"></div>
                    <div class="col-md-5">
                        <form action="{{route('dashboard.statement-today')}}">
                            <div class="row" style="margin-bottom: 20px; margin-left: 10px;">
                                <div class="col-md-5">
                                    <label> @lang('Start Date')</label>
                                    <input type="date" name="from_date" class="form-control" value="{{request('from_date')}}" />
                                </div>
                                <div class="col-md-5">
                                    <label> @lang('End Date')</label>

                                    <input type="date" name="to_date" class="form-control" value="{{request('to_date')}}" />
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-outline-primary" type="submit" style="margin-top:30px;">@lang("Submit") @endlang</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang("Statements Today")</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>@lang("name")</th>
                                <th>@lang('detection_type')</th>
                                <th>@lang("payment")</th>
                                <th>@lang('detection_date')</th>
                                {{--  <th>Received Amount</th>
                                  <th>Status</th>
                                  <th>To Pay</th>--}}

                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($detections as $detection)
                                @php
                                    $i++
                                @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$detection->patient->name}}</td>
                                    <td> {{$detection->detection_type}}</td>
                                    <td> {{$detection->payment}}</td>
                                    <td>{{$detection->detection_date}}</td>


                                </tr>
                            @endforeach

                            <tr>
                                <th>@lang('Total')</th>
                                <th></th>
                                <th></th>
                                <th>{{$detections->sum('payment')}}</th>
                                <th> </th>
                            </tr>
                            </tbody>


                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>


            </div>
        </div>
    @endsection
@stop
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




