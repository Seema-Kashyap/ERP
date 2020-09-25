@extends('backEnd.layouts.master')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Manage Assign Roles</h2>
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
                                                <th>Role</th>
                                                <th>Status</th>                                
                                                <th>Action</th>                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($assign_role_users as $list)
                                            <tr>
                                                @foreach($units as $data)
                                                    @if($data->id == $list->unit_id)

                                                        <td>{{$data->name}}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{ucfirst($list->first_name).' '.ucfirst($list->last_name).' '.'( '. $list->email.' )'  }}</td>
                                                <td>{{$list->name}}</td>
                                                <td>{{$list->status}}</td>
                                                <td><a href="{{url('admin/edit-role-to-user/'.$list->id)}}"><i class="fa fa-pencil"></i></a></td>
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
@endsection