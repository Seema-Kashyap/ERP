@extends('backEnd.layouts.master')

@section('content')
<style type="text/css">
    
    .fa-arrow-left, .fa-arrow-right{

        font-size:20px;
        padding:0px 7px;
        cursor: pointer;
    }
    .month, .year{

        font-size:20px;
    }
    .arrow_right , .arrow_left{

        padding:3px;
        margin-right: 3px;
        margin-left: 3px;
        margin-bottom: 10px !important;
    }
    .ui-datepicker-calendar {
    display: none;
    }
</style>
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div style="text-align: center">
                        
                        <button class="arrow_left btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>

                        <div type="text" style="width:70px; display: inline-block; height: 31px; text-align: center; padding: 0px;" class="form-control year">2020
                        </div>

                        <button class="arrow_right btn btn-success"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="x_title">
                        <h2>Leaves By Year & Month</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Leave Type</th>
                                                <th>Carry Forward Leaves</th>
                                                <th>Total Leaves By Year</th>
                                                <th>Total Months Leave Credit</th>
                                                <th>Availed Leaves</th>
                                                <th>Remaining Leaves</th>
                                            </tr>
                                        </thead>
                                        <tbody class="append_table_data">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    var d = new Date();

    var year = d.getFullYear();

    $(function(){

        $(".year").text(year);

        $(".arrow_right").click(function(){

            $(".loader_fixed").show();

            year++;

            $(".year").text(year);

            $.ajax({

                method:"POST",
                url: "{{url('admin/leaves-by-year-data')}}",
                data:{_token: '{{ csrf_token() }}',year:year},
                success: function(resp){

                    if(resp != ''){
                        $(".loader_fixed").hide();
                        $(".append_table_data").html(resp);

                    }

                },
                error: function(jqXHR, exception){
                        
                    if (jqXHR.status === 0) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Not connect.\n Verify Network.'
                        })

                    }else if (jqXHR.status == 404) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '404 Server Error Please Try Again Or Refresh Your Page'
                        })

                    }else if (jqXHR.status == 500) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '500 Server Error Please Try Again Or Refresh Your Page'
                        })

                    }else if (exception === 'parsererror') {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Parse Error Please Try Again Or Refresh Your Page'
                        })

                    }else if (exception === 'timeout') {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Time Out Error Please Try Again Or Refresh Your Page'
                        })

                    }else if (exception === 'abort') {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Abort Error Please Try Again Or Refresh Your Page'
                        })

                    }else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Uncaught Error.\n' + jqXHR.responseText
                        })

                    }
                }
            });
        })

        // Month Decrement Click Function
    
        $(".arrow_left").click(function(){

            $(".loader_fixed").show();

            $(".date-picker").val("");

            year--;

            $(".year").text(year);

            $.ajax({

                method:"POST",
                url: "{{url('admin/leaves-by-year-data')}}",
                data:{_token: '{{ csrf_token() }}',year:year},
                success: function(resp){
                    if(resp != ''){
                        $(".loader_fixed").hide();
                        $(".append_table_data").html(resp);

                    }

                },
                error: function(jqXHR, exception){
                        
                    if (jqXHR.status === 0) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Not connect.\n Verify Network.'
                        })

                    }else if (jqXHR.status == 404) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '404 Server Error Please Try Again Or Refresh Your Page'
                        })

                    }else if (jqXHR.status == 500) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '500 Server Error Please Try Again Or Refresh Your Page'
                        })

                    }else if (exception === 'parsererror') {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Parse Error Please Try Again Or Refresh Your Page'
                        })

                    }else if (exception === 'timeout') {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Time Out Error Please Try Again Or Refresh Your Page'
                        })

                    }else if (exception === 'abort') {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Abort Error Please Try Again Or Refresh Your Page'
                        })

                    }else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Uncaught Error.\n' + jqXHR.responseText
                        })

                    }
                }
            });

        })
    })
</script>
<script type="text/javascript">
    $(function(){

        var d = new Date(),

        year = d.getFullYear();

        $(".loader_fixed").show();
        $.ajax({

            method:"POST",
            url: "{{url('admin/leaves-by-year-data')}}",
            data:{_token: '{{ csrf_token() }}', year:year},
            success: function(resp){

                if(resp != ''){
                    $(".loader_fixed").hide();
                    $(".append_table_data").html(resp);

                }

            },
            error: function(jqXHR, exception){
                    
                if (jqXHR.status === 0) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Not connect.\n Verify Network.'
                    })

                }else if (jqXHR.status == 404) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '404 Server Error Please Try Again Or Refresh Your Page'
                    })

                }else if (jqXHR.status == 500) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '500 Server Error Please Try Again Or Refresh Your Page'
                    })

                }else if (exception === 'parsererror') {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Parse Error Please Try Again Or Refresh Your Page'
                    })

                }else if (exception === 'timeout') {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Time Out Error Please Try Again Or Refresh Your Page'
                    })

                }else if (exception === 'abort') {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Abort Error Please Try Again Or Refresh Your Page'
                    })

                }else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Uncaught Error.\n' + jqXHR.responseText
                    })

                }
            }
        });
    })
</script>
@endsection