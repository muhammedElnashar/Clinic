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
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="{{asset("assets/img/user4-128x128.jpg")}}"
                                 alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$patient->name}}</h3>


                        <ul class="list-group list-group-unbordered mb-3">

                            <li class="list-group-item">
                                <b>@lang('age')</b> <a class="float-right">@lang($patient->age)</a>
                            </li>
                            <li class="list-group-item">
                                <b>@lang('gander')</b> <a class="float-right">@lang($patient->gander) @endlang</a>
                            </li>
                            <li class="list-group-item">
                                <b>@lang('print')</b> <a class="float-right">
                                    <form method="POST"
                                          action="{{route("dashboard.report-page",$patient->id)}}">@method('post')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fa fa-print"></i> @lang("print") </button>
                                    </form>
                                </a>

                            </li>
                        </ul>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">@lang("About Me")</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        <strong><i class="fas fa-map-marker-alt mr-1"></i>@lang("address")</strong>

                        <p class="text-muted">@lang($patient->address)</p>

                        <hr>

                        <strong><i class="fas fa-mobile-alt mr-1"></i>@lang("phone_number")</strong>

                        <p class="text-muted">
                            <span class="tag tag-danger">@lang($patient->phone_number)</span>
                        </p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i>@lang("notes")</strong>

                        <p class="text-muted">@lang($patient->notes)</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">@lang('All Drugs')</a></li>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">@lang('Detections')</a>
                            </li>
                        </ul>

                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="table-responsive">

                                    <table
                                        class="table table-striped justify-content-center text-center table-bordered">
                                        <thead>
                                        <tr>
                                            <th>@lang('Drugs')</th>
                                            <th>@lang("Actions")</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($patient->prescription as $pre)

                                            <tr>
                                                <td>{{$pre->drug->name}}</td>
                                                <td>
                                                    <form method="POST"
                                                          action="{{route("dashboard.prescription.destroy",$pre->id)}}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fa fa-trash"></i> @lang("Delete") </button>
                                                    </form>
                                                </td>


                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    <button type="button" class="btn bg-gradient-primary" data-toggle="modal"
                                            data-target="#add-new-product" style="margin-left: auto;">
                                        @lang("Add Drugs")
                                    </button>
                                </div>
                                <div class="modal fade" id="add-new-product" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form method="post"
                                                  action="{{route("dashboard.profile-update-drug",$patient->id)}}"

                                                  class="modal-body">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title-"
                                                        id="exampleModalLongTitle">@lang("New drug")</h5>
                                                    <button type="button"
                                                            class="btn btn-outline-danger btn-sm close"
                                                            data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">

                                                    <input type="hidden" name="patient_id" value="{{ $patient->id }}"/>

                                                    <div class="form-group">
                                                        <label for="drug_id">@lang('drug')</label>
                                                        <div class="select2-purple">

                                                            <select class="select2" name="drug_id[]" id="drug_id" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
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
                                                    <button type="submit" class="btn btn-primary">Save changes
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- /.post -->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="settings">
                                <!-- Post -->
                                <div class="table">
                                    <div class="table-responsive">

                                        <table
                                            class="table table-striped justify-content-center text-center table-bordered">
                                            <thead>
                                            <tr>
                                                <th>@lang('#')</th>
                                                <th>@lang('detection_date')</th>
                                                <th>@lang("detection_type")</th>
                                                <th>@lang("reports")</th>
                                                <th>@lang("payment")</th>
                                                <th>@lang("Actions")</th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach($patient->detection as $pre)
                                                @php
                                                    $i++
                                                @endphp

                                                <tr>
                                                    <td>{{$i }}</td>
                                                    <td>{{$pre->detection_date}}</td>
                                                    <td>{{$pre->detection_type}}</td>
                                                    <td>{{$pre->reports}}</td>
                                                    <td>{{$pre->payment}}</td>

                                                    <td>
{{--

--}}
                                                        <button type="button" class="btn bg-gradient-primary" data-toggle="modal"
                                                                data-target="#add-update-detection{{ $pre->id }}" style="margin-left: auto;">
                                                            @lang("Edit Detection")
                                                        </button>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="add-update-detection{{ $pre->id }}" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form method="post"
                                                                  action="{{route("dashboard.profile-update-detection",$pre->id)}}" class="modal-body">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title-"
                                                                        id="exampleModalLongTitle">@lang("Edit")</h5>
                                                                    <button type="button"
                                                                            class="btn btn-outline-danger btn-sm close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <input type="hidden" name="patient_id"
                                                                           value="{{ $patient->id }}"/>


                                                                    <input type="hidden" name="id" id="id"
                                                                           value="{{ $pre->id }}"/>

                                                                    <div class="form-group">

                                                                        <input type="hidden" name="detection_date" id="detection_date" value="{{$pre->detection_date}}">
                                                                    </div>

                                                                    <div class="form-group">

                                                                        <input type="hidden" name="detection_type" id="detection_type" value="{{$pre->detection_type}}" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="reports">@lang("reports")</label>
                                                                        <input type="text" name="reports" id="reports"
                                                                               class="form-control text-box" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="payment">@lang("payment")</label>
                                                                        <input type="number"  name="payment"
                                                                               id="payment"
                                                                               class="form-control">
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

                                            @endforeach


                                            </tbody>
                                        </table>
                                        <button type="button" class="btn bg-gradient-primary" data-toggle="modal"
                                                data-target="#add-new-detection" style="margin-left: auto;">
                                            @lang("New Detection")
                                        </button>
                                        <div class="modal fade" id="add-new-detection" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form method="post"
                                                          action="{{route("dashboard.profile-create-detection",$patient->id)}}"

                                                          class="modal-body">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title-"
                                                                id="exampleModalLongTitle">@lang("New Detection")</h5>
                                                            <button type="button"
                                                                    class="btn btn-outline-danger btn-sm close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <input type="hidden" name="patient_id"
                                                                   value="{{ $patient->id }}"/>


                                                            <div class="form-group">
                                                                <label
                                                                    for="detection_date">@lang("detection_date")</label>
                                                                <input type="date" name="detection_date"
                                                                       id="detection_date"
                                                                       class="form-control" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="detection_type">@lang("detection_type")</label>
                                                                <select name="detection_type" id="detection_type"
                                                                        class="form-control select2bs4"
                                                                        required>
                                                                    <option
                                                                        @if(request()->get("detection_type") == "كشف") selected
                                                                        @endif value="كشف">@lang("detect")</option>
                                                                    <option
                                                                        @if(request()->get("detection_type") == "استشارة") selected
                                                                        @endif value="استشارة">@lang("redetect")</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="reports">@lang("reports")</label>
                                                                <input type="text" name="reports" id="reports"
                                                                       class="form-control text-box">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="payment">@lang("payment")</label>
                                                                <input type="number" step="10" name="payment"
                                                                       id="payment"
                                                                       class="form-control">
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

                                </div>

                                <!-- /.post -->
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
            <!-- /.container-fluid -->

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




