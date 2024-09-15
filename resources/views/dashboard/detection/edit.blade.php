@extends("layouts.master")

@section("title")
@stop
@section("css")
    <link rel="stylesheet" href="{{asset("assets/plugins/select2/css/select2.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
@stop
@section("title_page")

@stop
@section("title_page2")

@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between"style="background-color: powderblue">
                        <h3>@lang("Edit Detection")</h3>
                        <!-- Button trigger modal -->
                    </div>
                    <!-- Modal -->
                    <form method="post" action="{{route("dashboard.detection.update",$detection->id)}}"
                          class="modal-body bg-transparent">

                        @csrf
                        @method("put")

                        <div class="card-body justify-content-between">
                            <div class="form-group">
                                <label for="patient_id">@lang('patient')</label>
                                <select required class="select2bs4 " name="patient_id"
                                        id="patient_id" style="width:100%;">
                                    @foreach($patients as $patient)
                                        <option @if($detection->patient_id == $patient->id) selected
                                                @endif  value="{{$patient->id}}">{{$patient->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">@lang("detection_date")</label>
                                <input type="date" name="detection_date" id="detection_date" value="{{old("detection_date",$detection->detection_date)}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="detection_type">@lang("Detection_type")</label>
                                <select name="detection_type" id="detection_type" class="form-control select2bs4"
                                        required>
                                    <option @if($detection->detection_type == "detect")  @endif selected
                                              value="detect">@lang("detect")</option>
                                    <option @if($detection->detection_type == "redetect") selected @endif
                                            value="redetect">@lang("redetect")</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="reports">@lang("reports")</label>
                                <input type="text"  name="reports" id="reports" class="form-control"
                                       value="{{old("reports",$detection->reports)}}">
                            </div>
                            <div class="form-group">
                                <label for="">@lang("payment")</label>
                                <input type="text" name="payment" id="payment"
                                       value="{{old("payment",$detection->payment)}}"
                                       class="form-control">
                            </div>
                            <div class="card-footer">
                                <button type="reset" class="btn btn-warning">@lang("Reset")</button>
                                <button class="btn btn-success">@lang("Submit")</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')
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



