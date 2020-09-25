@extends('backEnd.layouts.master')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Manage Permissions</h2>
                        <form action="{{url('admin/permissions-refresh')}}" method="post" class="form_submit">
                            @csrf
                            <button style="float:right; margin-top:10px;" type="submit" class="btn btn-success ">Refresh</button>
                        </form>
                        <div class="clearfix"></div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="business_unit_id">Business Unit <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="form-control business_unit_id" name="business_unit_id">
                                    <option value="">Select Business Unit</option>
                                    @foreach($units as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                    <option value="111">Common For All</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Enter Sidebar Name</label>
                            <div class="col-md-6 col-sm-6 ">
                                 <input type="text" class="form-control sidebar_name_input" value="">
                            </div>
                        </div>
                    </div>
                    <form action="{{url('admin/permission-update')}}" method="post" >
                        @csrf
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Permission Id</th>
                                                    <th>Sidebar Name</th> 
                                                    <th>Unit Name</th>
                                                    <th>Route Name</th>                        
                                                    <th>Unit Id</th>
                                                    <th>Uri</th>
                                                    <th>Status</th>                        
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($permissions_data as $data)
                                                <tr>
                                                    <td>{{$data->id}}</td>
                                                    <td>{{$data->sidebar_name}}</td>
                                                    <td>{{$data->unit_name}}</td>
                                                    <td>{{$data->route_name}}</td>
                                                    <td>{{$data->unit_id}}</td>
                                                    <td>{{$data->uri}}</td>
                                                    <td>
                                                        <?php if($data->status == '1'){ ?>

                                                            <i style="font-size: 20px; color: #26b99a" class="fa fa-check" aria-hidden="true"></i>
                                                            <input  style="display: none;" class="show_hide"  type="checkbox" name="route_ids_update[]" value="{{$data->id}}">
                                                            <input class="unit_name" type="hidden" name="unit_name" value="">
                                                            <input class="unit_id" type="hidden" name="unit_id" value="">
                                                            <input class="sidebar_name" type="hidden" name="sidebar_name" value="">

                                                        <?php }else{ ?>
                                                            <input type="checkbox" name="route_ids[]" value="{{$data->id}}">
                                                            <input class="unit_name" type="hidden" name="unit_name" value="">
                                                            <input class="unit_id" type="hidden" name="unit_id" value="">
                                                            <input class="sidebar_name" type="hidden" name="sidebar_name" value="">
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <button style="float:right; margin-top:10px;" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){

        $(".business_unit_id").change(function(){

            var unit_id = $(this).val();

            var unit_name = $(this).find("option:selected").text();

            if(unit_id != ''){

                $(".unit_name").val(unit_name);

                $(".unit_id").val(unit_id);
            }else{

                $(".unit_name").val('');

                $(".unit_id").val('');
            }
        })
    })
</script>
<script type="text/javascript">
    $(function(){

         $(document).on('click','.fa-check',function(){

            $(this).hide();

            $(this).next(".show_hide").show();
        })
    })
</script>
<script type="text/javascript">
    $(document).on('focusout','.sidebar_name_input',function(){

        var sidebar_name_input = $(this).val();

        $(".sidebar_name").val(sidebar_name_input);
    })
</script>

@endsection