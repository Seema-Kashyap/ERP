<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"></i> <span>WeExpan</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <?php 
                    $user_details  = App\User::where('id', Auth::user()->id)->first();
                    if(!empty($user_details->image)) {

                        $image = profileImageImagePath.'/'.$user_details->image;
                    }else{
                        $image = DefaultImgPath;
                    }
                ?> 
                <img src="{{$image}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo  ucfirst(Auth::user()->first_name).' '.ucfirst(Auth::user()->last_name) ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <?php $user_details = App\User::where('id',auth()->user()->id)
                                      ->first();

            $permissions = "";
            $permissions = $user_details->permissions;
            // echo "<pre>"; print_r($permissions); die;
            $permissions_id = array();
            foreach ($permissions as $key => $value) {
                $permissions_id[] = $value->pivot->permission_id;
            } 
        ?>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">                
                <ul class="nav side-menu">
                    <?php   if(((in_array('18', $permissions_id)) && (in_array('19', $permissions_id) )) || ($user_details->role_id == '1')){
                    ?>
                        <li>
                            <a><i class="fa fa-user"></i>Users<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{url('admin/user-add')}}">Add User</a></li>
                                <li><a href="{{url('admin/users-list')}}">Manage Users</a></li>                            
                            </ul>
                        </li>
                    <?php } ?>
                    
                    <?php if($user_details->role_id == '1'){ ?>
                        <li>
                            <a><i class="fa fa-users"></i>Assign Role To Users<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{url('admin/add-role-to-user')}}">Add Assign Role To User</a></li>
                                <li><a href="{{url('admin/manage-assign-roles')}}">Manage Assign Roles</a></li>                            
                            </ul>
                        </li>
                    <?php } ?>
                    <?php   if((((in_array('30', $permissions_id)) && (in_array('31', $permissions_id))) || ((in_array('37', $permissions_id)) && (in_array('38', $permissions_id))) || ((in_array('42', $permissions_id)) && (in_array('43', $permissions_id))) || ((in_array('47', $permissions_id)) && (in_array('48', $permissions_id)))
                        || ((in_array('62', $permissions_id)) && (in_array('63', $permissions_id)))
                        || ((in_array('52', $permissions_id)) && (in_array('53', $permissions_id)))
                        || ((in_array('57', $permissions_id)) && (in_array('58', $permissions_id)))
                        || ((in_array('67', $permissions_id)))) || ($user_details->role_id == '1')){
                    ?>
                        <li>
                            <a><i class="fa fa-users"></i>Employees Master's<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">

                                <?php   if(((in_array('30', $permissions_id)) && (in_array('31', $permissions_id) )) || ($user_details->role_id == '1')){
                                ?>
                                    <li><a>Employee Details<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('admin/employee-add')}}">Add Employee</a></li>
                                            <li><a href="{{url('admin/employee-management-list')}}">Manage Employees</a></li>
                                        </ul>
                                    </li>
                                <?php } ?>

                                <?php if(((in_array('37', $permissions_id)) && (in_array('38', $permissions_id) )) || ($user_details->role_id == '1')){

                                ?>
                                    <li><a>Personal Details<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('admin/employee-personal-detail-add')}}">Add Employee Personal Details</a></li>
                                            <li><a href="{{url('admin/employee-personal-details-list')}}">Manage Employees Personal Details</a></li>
                                        </ul> 
                                    </li>
                                <?php } ?>
                                <?php if(((in_array('42', $permissions_id)) && (in_array('43', $permissions_id) )) || ($user_details->role_id == '1')){

                                ?>
                                    <li><a>Documents Details<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu"> 
                                            <li><a href="{{url('admin/employee-personal-document-add')}}">Add Employee Personal Documents</a></li>    
                                            <li><a href="{{url('admin/employee-personal-documents-list')}}">Manage Employees Personal Documents</a></li>
                                        </ul>
                                    </li>
                                <?php } ?>
                                <?php if(((in_array('47', $permissions_id)) && (in_array('48', $permissions_id) )) || ($user_details->role_id == '1')){

                                ?>
                                    <li><a>Resignation<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu"> 
                                            <li><a href="{{url('admin/resignation-add')}}">Add Employee Resignation</a></li>
                                            <li><a href="{{url('admin/resignation-management-list')}}">Manage Employees Resignation</a></li>
                                        </ul>
                                    </li>
                                <?php } ?>
                                <?php if(((in_array('62', $permissions_id)) && (in_array('63', $permissions_id) )) || ($user_details->role_id == '1')){

                                ?>
                                    <li><a>After Joining<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu"> 
                                            <li><a href="{{url('admin/after-joining-add')}}">Add After Joining</a></li>
                                            <li><a href="{{url('admin/after-joining-management-list')}}">Manage After Joining</a></li>
                                        </ul>
                                    </li>
                                <?php } ?>
                                <?php if(((in_array('52', $permissions_id)) && (in_array('53', $permissions_id) )) || ($user_details->role_id == '1')){

                                ?>
                                    <li><a>Increment Details<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('admin/increment-details-add')}}">Add Increment Details</a></li>
                                            <li><a href="{{url('admin/increment-details-management-list')}}">Manage Increment Details</a></li>
                                        </ul>
                                    </li>
                                <?php } ?>
                                <?php if(((in_array('57', $permissions_id)) && (in_array('58', $permissions_id) )) || ($user_details->role_id == '1')){

                                ?>
                                    <li><a>Previous Experience<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('admin/previous-experience-details-add')}}">Add Previous Experience Details</a></li>
                                            <li><a href="{{url('admin/previous-experience-details-list')}}">Manage Previous Experience Details</a></li>
                                        </ul>
                                    </li>      
                                <?php } ?>
                                <?php if(((in_array('67', $permissions_id))) || ($user_details->role_id == '1')){

                                ?>
                                    <li><a href="{{url('admin/employee-master-form')}}">Employees Complete Details</a></li>
                                <?php } ?>                          
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if(((in_array('75', $permissions_id)) && (in_array('76', $permissions_id) )) || ($user_details->role_id == '1')){

                    ?>
                        <li>
                            <a><i class="fa fa-list"></i>Staturory Detail<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{url('admin/statutory-add')}}">Add Staturory</a></li>
                                <li><a href="{{url('admin/statutory-management-list')}}">Manage Staturory</a></li>                            
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if(((in_array('70', $permissions_id)) && (in_array('71', $permissions_id) )) || ($user_details->role_id == '1')){
                    ?>
                        <li>
                            <a><i class="fa fa-clone"></i>IT Assets Detail<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{url('admin/asset-add')}}">Add Asset</a></li>
                                <li><a href="{{url('admin/asset-management-list')}} ">Manage Assets</a></li>                            
                            </ul>
                        </li>
                    <?php } ?>

                    <?php   if(((in_array('22', $permissions_id)) && (in_array('23', $permissions_id)) ) || ($user_details->role_id == '1')){
                    ?>
                        <li>
                            <a><i class="fa fa-pencil"></i>Bussiness Units<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{url('admin/business-management-add')}}">Add Bussiness Unit</a></li>
                                <li><a href="{{url('admin/business-management-list')}}">Manage Bussiness Units</a></li>
                                                    
                            </ul>
                        </li>

                    <?php } ?>

                    <?php   if(((in_array('26', $permissions_id)) && (in_array('27', $permissions_id))) || ($user_details->role_id == '1')){
                    ?>
                        <li>
                            <a><i class="fa fa-pencil"></i>Designation<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{url('admin/designation-management-add')}}">Add Designation</a></li>
                                <li><a href="{{url('admin/designation-management-list')}}">Manage Designation</a></li>
                                                    
                            </ul>
                        </li>
                    <?php } ?>

                    
                    <!-- <li>
                        <a><i class="fa fa-users"></i> Department Dashboards <span class="fa fa-chevron-down"></span></a>
                        <?php $units = App\BusinessUnit::get(); ?>
                        <ul class="nav child_menu">
                            @foreach($units as $list)
                                <li><a href="{{url('admin/dashboard/'.$list->business_unit_url)}}">{{$list->name}}</a></li>
                            @endforeach                         
                        </ul>
                    </li> -->
                 
                    <li>
                        <a><i class="fa fa-clock-o"></i> Attendance System <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a>Leave Types<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{url('admin/leave-add')}}">Add Leave Type</a></li>
                                    <li><a href="{{url('admin/leave-management-list')}}">Manage Leaves</a></li>
                                </ul>
                            </li>                          
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-umbrella" aria-hidden="true"></i>Employees Leave<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Apply Leave</a></li>
                            <li><a href="{{url('admin/leaves-by-year')}}">Manage Leaves</a></li>
                            <li><a href="{{url('admin/leaves-by-year-month')}}">Leaves By Year & Month</a></li>
                        </ul>
                    </li>

                    <?php if($user_details->role_id == '2' || $user_details->role_id == '1' ){ ?>
                        <li>
                            <a><i class="fa fa-lock"></i>Permissions<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{url('admin/add-permissions-to-user')}}">Add Permission To User</a></li>
                                <li><a href="{{url('admin/manage-users-permissions')}}">Manage User Permissions</a></li> 
                                <li style="display:none"><a href="{{url('admin/permission-list')}}">Permissions List</a></li>                           
                            </ul>
                        </li>
                    <?php } ?>              
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>