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
    <div class="container-fluid=">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between"  style="background-color: powderblue">
                        <h3>@lang("Drugs")</h3>
                        <button type="button" class="btn bg-info" data-toggle="modal"
                                data-target="#add-new-product" style="margin-right: auto; font-weight: bolder">
                            @lang("Add Drugs")
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="add-new-product" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form method="post" action="{{route("dashboard.drug.store")}}"
                                          class="modal-body">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">@lang("Add Drug")</h5>
                                            <button type="button" class="btn btn-outline-danger btn-sm close"
                                                    data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>


                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">@lang("name")</label>
                                                <input type="text" name="name" id="name" class="form-control"  required>
                                            </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">@lang("Close")</button>
                                                <button type="submit" class="btn btn-primary">@lang("Save Changes") @endlang</button>
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
                                    <th>@lang('Name')</th>
                                    <th>@lang('Actions')</th>


                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($drugs ?? [] as $drug)
                                    @php
                                        $i++
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$drug->name}}</td>


                                        <td>
                                            <a href="{{route('dashboard.drug.edit',$drug->id)}} " type="submit"
                                               class="btn btn-sm btn-primary">@lang('Edit')<i
                                                    class="fa fa-pen mx-1"></i></a>
                                            <form class="d-inline"
                                                  onsubmit="return confirm('Do you really want to submit the form?');"
                                                  method="post" action="{{route('dashboard.drug.destroy',$drug->id)}}">
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
                            {{$drugs->links()}}

                            {{--                            <form action="{{route()}}" ></form>--}}

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')

@endsection



