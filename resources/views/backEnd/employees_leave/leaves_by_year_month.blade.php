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

                        <div type="text" style="width:106px; display: inline-block; height: 31px; text-align: center; padding: 0px;" class="form-control month">
                        </div>
                        <div type="text" style="width:70px; display: inline-block; height: 31px; text-align: center; padding: 0px;" class="form-control year">2020
                        </div>

                        <button class="arrow_right btn btn-success"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="x_title">
                        <h2>Leaves By Year & Month</h2>
                        <div class="item form-group" style="float: right; height: 20px; width: 210px;">
                            <input style="height: 30px; padding:0px !important; text-align: center;" name="startDate" id="startDate" class="date-picker form-control" placeholder="Search By Month and Year" />
                        </div>
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
                                                <th>Leaves By Month</th>
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

    var current_month_id  =  d.getMonth();

    var year = d.getFullYear();

    $(function(){
        var months = ["January", "February", "March","April", "May", "June", "July", "August","September", "October", "November", "December"];

        $(".month").text(months[current_month_id]);

        $(".year").text(year);

        $(".arrow_right").click(function(){

            $(".loader_fixed").show();

            $(".date-picker").val("");

            current_month_id++;

            if(current_month_id == 12){

                current_month_id = 0;

                year++;

                $(".year").text(year);
            }

            $(".month").text(months[current_month_id]);

            var month = current_month_id;

            month = ( '0' + (month+1) ).slice( -2 );

            $.ajax({

                method:"POST",
                url: "{{url('admin/leaves-by-year-month-data')}}",
                data:{_token: '{{ csrf_token() }}',month:month, year:year},
                success: function(resp){
                    console.log(resp);
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

            current_month_id--;

            

            if(current_month_id == -1){

                current_month_id = 11;

                year--;

                $(".year").text(year);
            }

            $(".month").text(months[current_month_id]);

            var month = current_month_id;
            month = ( '0' + (month+1) ).slice( -2 );
            $.ajax({

                method:"POST",
                url: "{{url('admin/leaves-by-year-month-data')}}",
                data:{_token: '{{ csrf_token() }}',month:month, year:year},
                success: function(resp){
                    console.log(resp);
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

        $('.date-picker').datepicker( {
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'MM yy',
            onClose: function(dateText, inst) {
                current_month_id = inst.selectedMonth;
                year = inst.selectedYear;
                $(".month").text(months[current_month_id]); 
                $(".year").text(year);
                $(".loader_fixed").show();
                var month = ( '0' + (current_month_id+1) ).slice( -2 );

                $.ajax({

                    method:"POST",
                    url: "{{url('admin/leaves-by-year-month-data')}}",
                    data:{_token: '{{ csrf_token() }}',month:month, year:year},
                    success: function(resp){
                        console.log(resp);
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
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
        });

    })
</script>
<script type="text/javascript">
    $(function(){

        var d = new Date(),

        month = ( '0' + (d.getMonth()+1) ).slice( -2 ),

        year = d.getFullYear();

        $(".loader_fixed").show();
        $.ajax({

            method:"POST",
            url: "{{url('admin/leaves-by-year-month-data')}}",
            data:{_token: '{{ csrf_token() }}',month:month, year:year},
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