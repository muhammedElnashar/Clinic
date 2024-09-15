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
                    <div class="card-header d-flex justify-content-between" style="background-color: powderblue"  >
                        <h3>   @lang("Edit Patient") : {{$patient->name}}</h3>
                        <!-- Button trigger modal -->
                    </div>
                    <!-- Modal -->
                    <form method="post" action="{{route("dashboard.patient.update",$patient->id)}}"
                          class="modal-body bg-transparent">

                        @csrf
                        @method("put")

                        <div class="card-body justify-content-between">
                            <div class="form-group">
                                <label for="name">@lang("name")</label>
                                <input type="text" name="name" id="name" class="form-control" required
                                       value="{{old("name",$patient->name)}}">
                            </div>

                            <div class="form-group">
                                <label for="age">@lang("age")</label>
                                <input type="text"  name="age" id="age" class="form-control" required
                                       value="{{old("age",$patient->age)}}">
                            </div>
                            <div class="form-group">
                                <label for="address">@lang("address")</label>
                                <input type="text"  name="address" id="address" class="form-control"
                                       value="{{old("address",$patient->address)}}">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">@lang("phone_number")</label>
                                <input type="text"  name="phone_number" id="phone_number" class="form-control"
                                       value="{{old("phone_number",$patient->phone_number)}}">
                            </div>
                            <div class="form-group">
                                <label for="gander">@lang("gander")</label>
                                <select name="gander" id="gander" class="form-control select2bs4"
                                        required>
                                    <option @if($patient->gander == "male")  @endif selected
                                            value=@lang("male")>@lang("male")</option>
                                    <option @if($patient->gander == "female") selected @endif
                                    value=@lang("female")>@lang("female")</option>
                                </select>
                            </div>
                            {{--<div class="form-group">
                                <label for="gander">@lang("gander")</label>
                                <input type="text"  name="gander" id="gander" class="form-control" required
                                       value="{{old("gander",$patient->gander)}}">
                            </div>--}}

                            <div class="form-group">
                                <label for="notes">@lang("notes")</label>
                                <input type="text"  name="notes" id="notes" class="form-control"
                                       value="{{old("notes",$patient->notes)}}">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="reset" class="btn btn-warning">@lang("Reset")</button>
                            <button class="btn btn-success">@lang("Submit")</button>
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



