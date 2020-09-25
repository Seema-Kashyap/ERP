@extends('backEnd.layouts.master')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Employees List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>                                                
                                                <th>Business Unit</th>
                                                <th>Name</th>
                                                <th>Designation Report Authority</th>
                                                <th>CTC Appointment</th>
                                                <th>Emergency Contact Person</th>
                                                <th>Emergency Contact Person No.</th>
                                                <th>Status</th>                                
                                                <th>Action</th>                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($employee_personal_details_list[0]))
                                            @foreach ($employee_personal_details_list as $list)
                                                <tr>
                                                    @foreach($units as $data)
                                                        @if($data->id == $list->user_details->unit_id)

                                                            <td>{{$data->name}}</td>
                                                        @endif
                                                    @endforeach
                                                    <td>{{ucfirst($list->user_details->first_name).' '.ucfirst($list->user_details->last_name).' '.'( '. $list->user_details->email.' )'  }}</td>
                                                    <td>{{$list->emp_des_report_auth }}</td>
                                                    <td>{{$list->emp_ctc_appointment }}</td>
                                                    <td>{{$list->emp_emer_con_person }}</td>
                                                    <td>{{$list->emp_emer_con_no}}</td>
                                                    <td>{{$list->status}}</td>
                                                    <td><a href="{{url('admin/employee-personal-detail-edit/'.$list->id)}}"><i class="fa fa-pencil"></i></a><a class="emp_id" emp_id="{{$list->id}}" href="javascript:;"><i class="fa fa-trash"></i></a></td></i></a></td>
                                                </tr>
                                            @endforeach
                                        @endif
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
    
    $(function(){

        var table = $('#datatable-buttons').DataTable();

        $(document).on('click', '.fa-trash' ,function(){

            var emp_id = $(this).closest(".emp_id").attr("emp_id");

            var tr = $(this).closest('tr');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value == true) {
                    $.ajax({
                        url: "{{url('admin/employee-personal-detail-delete/')}}"+ '/' +emp_id, 
                        method: 'get',
                        success : function(data){
                            if(data == '1'){
                                //delete the row
                                table.row(tr).remove().draw( false );
                                Swal.fire(
                                    'Deleted!',
                                    'Your Record Has Been Deleted Successfully.',
                                    'success'
                                )
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
                    
                }
            })
        });
    });
</script>
@endsection