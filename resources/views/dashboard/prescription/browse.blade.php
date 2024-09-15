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
    <div class="container-fluid=">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between" style="background-color: powderblue">
                        <h3>@lang("prescriptions")</h3>
                        <button type="button" class="btn bg-info" data-toggle="modal"
                                data-target="#add-new-product" style="margin-right: auto; font-weight: bolder">
                            @lang("add prescription")
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="add-new-product" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form method="post" action="{{route("dashboard.prescription.store")}}"
                                          class="modal-body">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLongTitle">@lang("New prescription")</h5>
                                            <button type="button" class="btn btn-outline-danger btn-sm close"
                                                    data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>


                                        <div class="modal-body">
                                            <div class="form-group">
                                                 <label for="patient_id">@lang('name')</label>
                                                <select required class="form-control select2bs4" name="patient_id"
                                                        id="patient_id" multiple>
                                                    @foreach($patients as $patient)
                                                        <option value="{{$patient->id}}">{{$patient->name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="drug_id">@lang('Drugs')</label>
                                                <div class="select2-purple">

                                                    <select class="select2" name="drug_id[]" id="drug_id" multiple="multiple" data-placeholder="اختار الدواء" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                        @foreach($drugs as $drug)
                                                            <option value="{{$drug->id}}">{{$drug->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">@lang("Close")</button>
                                            <button type="submit" class="btn btn-primary">@lang("Save Changes")</button>
                                        </div>
                                        </div>

                                    </form>
                                </div>


                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped justify-content-center text-center table-bordered">
                                <thead>
                                <tr>
                                    <th>@lang('ID')</th>
                                    <th>@lang('Patient')</th>
                                    <th>@lang('Drugs')</th>
                                    <th>@lang('Return_date')</th>
                                    <th>@lang('Actions')</th>


                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($prescriptions ?? [] as $prescription)
                                    @php
                                        $i++
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$prescription->patient->name}}</td>
                                        <td>{{$prescription->drug->name}}</td>
                                        <td>{{$prescription->return_date}}</td>


                                        <td>
                                            <a href="{{route('dashboard.prescription.edit',$prescription->id)}} "
                                               type="submit"
                                               class="btn btn-sm btn-primary">@lang('Edit')<i
                                                    class="fa fa-pen mx-1"></i></a>
                                            <form class="d-inline"
                                                  onsubmit="return confirm('Do you really want to submit the form?');"
                                                  method="post"
                                                  action="{{route('dashboard.prescription.destroy',$prescription->id)}}">
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
                            {{$prescriptions->links()}}

                            {{--                            <form action="{{route()}}" ></form>--}}

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>

@endsection

@section('script')
    <script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{URL::asset("assets/plugins/select2/js/select2.full.min.js")}}"></script>
    <script>

            //Initialize Select2 Elements
            $('.select2').select2({

            })

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
    </script>
@endsection






