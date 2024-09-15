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
                    <div class="card-header d-flex justify-content-between" style="background-color: powderblue"    >
                        <h3>@lang("Edit prescription") </h3>
                        <!-- Button trigger modal -->
                    </div>
                    <!-- Modal -->
                    <form method="post" action="{{route("dashboard.prescription.update",$prescription->id)}}"
                          class="modal-body bg-transparent">

                        @csrf
                        @method("put")

                        <div class="card-body justify-content-between">
                            <div class="form-group">
                                <label for="patient_id">@lang('patients')</label>
                                <select required class="select2bs4 " name="patient_id"
                                        id="patient_id" style="width:100%;">
                                    @foreach($patients as $patient)
                                        <option @if($prescription->patient_id == $patient->id) selected
                                                @endif  value="{{$patient->id}}">{{$patient->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="drug_id">@lang('Drugs')</label>
                                <select class="select2bs4" name="drug_id" id="drug_id" style="width:100%;">
                                    @foreach($drugs as $drug)
                                        <option @if($prescription->drug_id == $drug->id) selected
                                                @endif  value="{{$drug->id}}">{{$drug->name}}</option>
                                    @endforeach
                                </select>
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



