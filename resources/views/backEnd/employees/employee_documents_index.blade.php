@extends('backEnd.layouts.master')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Employees Personal Documents</h2>
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
                                                <th>Employee Name</th>    
                                                <th>Employee Image</th>
                                                <th>Status</th>                
                                                <th>Action</th>                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($employee_documents as $list)
                                            <tr>
                                                @foreach($units as $data)
                                                    @if($data->id == $list->user_details->unit_id)
                                                        <td>{{$data->name}}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{ucfirst($list->user_details->first_name).' '.ucfirst($list->user_details->last_name).' '.'( '. $list->user_details->email.' )'  }}</td>
                                                <?php $emp_imgs = explode(",", $list->emp_img) ?>
                                                <td><img style="width:30%; height: 100%" src="{{url('public/employees_passport_images/'.$emp_imgs[0])}}"></td>
                                                <td>{{$list->status}}</td>
                                                <td><a href="{{url('admin/employee-personal-document-edit/'.$list->id)}}"><i class="fa fa-pencil"></i></a><a class="emp_id" emp_id="{{$list->id}}" href="javascript:;"><i class="fa fa-trash"></i></a></td></i></a></td>
                                            </tr>
                                        @endforeach
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
                    $(".loader_fixed").show();
                    $.ajax({
                        url: "{{url('admin/employee-personal-document-delete/')}}"+ '/' +emp_id, 
                        method: 'get',
                        success : function(data){
                            if(data == '1'){
                                $(".loader_fixed").hide();
                                //delete the row
                                table.row(tr).remove().draw(false);
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