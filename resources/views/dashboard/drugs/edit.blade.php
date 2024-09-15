@extends("layouts.master")

@section("title")
@stop
@section("css")

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
                    <div class="card-header d-flex justify-content-between" style="background-color: powderblue">
                        <h3>@lang("Edit Drugs") </h3>
                        <!-- Button trigger modal -->
                    </div>
                    <!-- Modal -->
                    <form method="post" action="{{route("dashboard.drug.update",$drug->id)}}"
                          class="modal-body bg-transparent">

                        @csrf
                        @method("put")

                        <div class="card-body justify-content-between">
                            <div class="form-group">
                                <label for="name">@lang("name")</label>
                                <input type="text" name="name" id="name" class="form-control" required
                                       value="{{old("name",$drug->name)}}">
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

@endsection




