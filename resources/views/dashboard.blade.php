@extends("layouts.master")

@section("title")

@stop
@section("css")

@endsection
@section("title_page")

@stop
@section("title_page2")

@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info ">
                    <div class="inner">
                        <h3>{{$patients->count()}}</h3>

                        <p>@lang('Total patient')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-flag"></i>
                    </div>
                    <a href="{{route("dashboard.patient.index")}}" class="small-box-footer">@lang("More info") <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>

            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info ">
                    <div class="inner">
                        <h3>{{$detections->count()}}</h3>

                        <p>@lang('Today Detection')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-flag"></i>
                    </div>
                    <a href="{{route("dashboard.detection.index")}}" class="small-box-footer">@lang("More info") <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info ">
                    <div class="inner">
                        <h3>{{$detections->sum('payment')}}</h3>

                        <p>@lang('Today Detection')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-flag"></i>
                    </div>
                    <a href="{{route("dashboard.detection.index")}}" class="small-box-footer">@lang("More info") <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>


    </div>

@stop
@section('script')

@endsection



