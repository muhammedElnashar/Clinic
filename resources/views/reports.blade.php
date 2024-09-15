<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>Report</title>
    <link rel="stylesheet" href="{{asset("assets/rtl/bootstrap.min.css")}}">
    <link href="{{asset('Tajawal.css')}}" rel="stylesheet">
    <script type="text/javascript">
        function printDiv() {
            var divToPrint = document.getElementById('container');
            var htmlToPrint = '' +
                '<style >' +
                'table th, table td {' +
                'border:1px solid #000;' +
                'padding:0.5em;' +
                '}' +
                '</style>';
            htmlToPrint += divToPrint.outerHTML;
            newWin = window.open("");
            newWin.document.write(htmlToPrint);
            newWin.print();
            newWin.close();
        }

        var replaceDigits = function () {
            var map =
                [
                    "&\#1632;", "&\#1633;", "&\#1634;", "&\#1635;", "&\#1636;",
                    "&\#1637;", "&\#1638;", "&\#1639;", "&\#1640;", "&\#1641;"
                ]

            document.body.innerHTML =
                document.body.innerHTML.replace(
                    /\d(?=[^<>]*(<|$))/g,
                    function ($0) {
                        return map[$0]
                    }
                );
        }

        function add_row() {
            var row = `
                <tr>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                        <td contenteditable="true" style="font-size:11px"
                            class="return-date"></td>
                        <td class="no-print delete"></td>
                </tr>
            `;
            $(".main-body").append(row);
            $("html").attr("dir", 'rtl');
        }

    </script>
    <style>
        * {
            text-align: center;
        }

        th {
            font-size: 18px;
            border: 1px solid black !important;
            font-weight: bold !important;
        }

        td {
            font-size: 17px;
            border: 1px solid black !important;
            font-weight: bold !important;
        }

        .footer {
            border: none !important;
        }

        .footer td, .footer th {
            border: none !important;
        }

        .table td, .table th {
            padding: 0.3rem !important;
        }

        @media print {
            .no-print, .no-print * {
                display: none !important;
            }

            footer {
                page-break-after: always;
            }

        }

        @page {
            margin-top: 10px;
        }

        thead {
            display: contents;
        }
    </style>


</head>
<body>
<div class="container-fluid
" id="container" >
<div class="row" style="margin: 10px 0; margin-left: auto ; display: flex;justify-content: space-between">
    <div class="col-5 text-info" style="width:  50%;">
        <p style="margin: 0px 0px; font-weight: bold; font-size: medium ">Clinic</p>
        <p style="margin: 0px 0px ; font-weight: bolder; font-size: larger; ">Dr.SAMIR EL SHAMLY</p>
        <p style="margin: 0px 0px ; font-weight:bold;font-size: small  ">PHD Neuroscience,Medicine</p>
        <p style="margin: 0px 0px; font-weight:bold;font-size: smaller">Master Of Psychological and Neurological</p>
        <p style="margin: 0px 0px; font-weight:bold;font-size: smaller">Disease Instructor Faculty Of Medicine</p>
        <p style="margin: 0px 0px; font-weight:bold;font-size: smaller">Suze Canal University</p>
    </div>

    <div class="col-4 text-right">
        <img src="{{asset("assets/img/R.png")}}" height="130px" alt="">
    </div>
</div>


</div>
<div class="form-group" >

    <div class="row">
        <div class="row col-6" style="margin-right: 10px; ">
            <div class="form-control border border-info border-l-4 " >
                <b class="text-left" style="font-size: large ;  "> Age: <a
                        style="font-weight: bolder ; "> {{$patient->age}}</a> </b>

            </div>
            <div class="form-control ">
                <b class="text-left" style="font-size: large ; "> Phone Number: <a
                        style="font-weight: bolder ;"> {{$patient->phone_number}}</a> </b>

            </div>

        </div>
        <div class="row col-6">
            <div class="form-control ">
                <b> Name:- <a style="font-weight: bolder ;font-style: italic"> {{$patient->name}}</a> </b>
            </div>
            <div class=" form-control">
                <b> Address:- <a style="font-weight: bolder ;font-style: italic"> {{$patient->address}}</a> </b>

            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-12 text-center">
        <span><b><a style="font-weight: bolder ;  font-size: x-large;font-style: italic"> {{$date}}</a> </b>


        </span>
    </div>
</div>

<div class="row mb-3">


    <div class="col-12">
        <table class="table table-striped" style="table-layout: fixed; border-collapse:unset">
            <thead class="text-center" style="">

            <tr style="background-color: #0c525d" class="text-white">
                <th colspan="1" style="width:3%" scope="col">@lang("#")</th>
                <th colspan="1" style="width:20%;" scope="col">@lang("date")</th>
                <th colspan="1" style="width:10%" scope="col">@lang("type")</th>
                <th colspan="1" style="width:50%" scope="col">@lang("reports")</th>
            </tr>

            </thead>
            <tbody class="main-body" style="text-align:center;  height: 250px;">

            @foreach($patient->detection ?? [] as $a)
                <tr>
                    <td contenteditable="true" class="iterate">{{$loop->index +1 }}</td>
                    <td contenteditable="true" >{{$a->detection_date}}</td>
                    <td contenteditable="true">{{$a->detection_type}}</td>
                    <td contenteditable="true">{{$a->reports}}</td>

                </tr>
            @endforeach


            </tbody>
        </table>
    </div>


    <div class="container-fluid" style="background-color:aliceblue; margin-bottom: 10px;height: 60px;">
        <h3 style="margin-top: 10px; font-weight: bolder"> Patient Drug</h3>
    </div>
    <div class="col-12">

        <table class="table table-striped" style="table-layout: fixed; border-collapse:unset">
            <thead class="text-center" style="">

            <tr style="background-color: #0c525d;" class="text-white">
                <th colspan="1" style="width:3%" scope="col">@lang("#")</th>
                <th colspan="1" style="width:25%;" scope="col">@lang("drug")</th>
                <th colspan="1" style="width:50%" scope="col">@lang("Notes")</th>
            </tr>

            </thead>
            <tbody class="main-body" style="text-align:center; height: 150px;">

            @foreach($patient->prescription ?? [] as $d)

                <tr>
                    <td contenteditable="true" class="iterate">{{$loop->index +1 }}</td>
                    <td contenteditable="true" >{{$d->drug->name}}</td>
                    <td contenteditable="true"></td>

                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
</div>

</div>
</div>

</div>


<script src="{{asset("assets")}}/plugins/jquery/jquery.min.js"></script>
<script src="{{asset("assets")}}/plugins/jquery-ui/jquery-ui.min.js"></script>

<script type="text/javascript">
    // window.onload = replaceDigits
    window.onload = function () {

    }

    $(".delete").on("click", function (e) {
        e.preventDefault()
        $(this).parent().remove()
    });

    /*$("tbody").sortable({

    })*/

    $(document).ready(function () {
        $(".no-print").html()
    })


    $(document).on("click", ".arrange", function (e) {
        e.preventDefault()
        var i = 1;
        $(".iterate").each(function () {
            $(this).text(i)
            i++
        });
    })

    $(".padding-input").change(function () {
        var _val = $(this).val();
        $('.main-body td').attr('style', "padding:" + _val + "rem !important");
    })
    $(".font-size-input").change(function () {
        var _val = $(this).val();
        $('.main-body td').attr('style', "font-size:" + _val + "px !important");
    })
</script>


</body>
</html>
