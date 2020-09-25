<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//=============================BackEnd Routes=================================================================

// Employee Personal Details Form Multiple Steps Start Here

Route::match(['get','post'],'employee-personal-form/{user_id}/{security_code}','EmployeeFormStepsController@employee_personal_detail_form_step_1');

Route::match(['get','post'],'employee-personal-form/{user_id}/{security_code}/step-2','EmployeeFormStepsController@employee_personal_detail_form_step_2');

Route::match(['get','post'],'employee-personal-form/{user_id}/{security_code}/step-2','EmployeeFormStepsController@employee_personal_detail_form_step_2');

Route::match(['get','post'],'employee-personal-form/{user_id}/{security_code}/step-3','EmployeeFormStepsController@employee_personal_detail_form_step_3');

Route::match(['get','post'],'employee-personal-form/{user_id}/{security_code}/step-4','EmployeeFormStepsController@employee_personal_detail_form_step_4');

Route::match(['get','post'],'employee-personal-form/{user_id}','EmployeeFormStepsController@employee_form_finish');

// Employee Personal Details Form Multiple Steps Ends Here

Route::match(['get','post'],'/','BackEnd\LoginRegisterController@login');

Route::match(['get','post'],'admin/register','BackEnd\LoginRegisterController@register');

Route::match(['get','post'],'admin/logout','BackEnd\LoginRegisterController@logout');

Route::match(['get','post'],'activate-your-account/{encoded_user_id}','BackEnd\LoginRegisterController@activate_your_account');

//Cities Ajax
Route::match(['get','post'],'admin/india-cities/{state_id}','Controller@cities')->name('Cities Ajax');


//Email Already Exists

Route::match(['get','post'],'admin/email-exists-check','Controller@email_exists_check')->name('Email Already Exist');

Route::match(['get','post'],'admin/email-exists-check-edit/{user_id}','Controller@email_exists_check_edit')->name('Email Exists Edit Time');

//Personal Email Already Exists

Route::match(['get','post'],'admin/personal-email-exists-check','Controller@personal_email_exists_check')->name('Personal Email Already Exist');

Route::match(['get','post'],'admin/personal-email-exists-check-edit/{user_id}','Controller@personal_email_exists_check_edit')->name('Personal Email Exists Edit Time');

//Phone Already Exists 

Route::match(['get','post'],'admin/phone-exists-check','Controller@phone_exists_check')->name('Phone Exists Check');

Route::match(['get','post'],'admin/phone-exists-check-edit/{user_id}','Controller@phone_exists_check_edit')->name('Phone Already Exists Edit Time');

Route::group(['middleware' => 'CheckAdminAuth','prefix' => 'admin'], function () {


	Route::match(['get','post'],'/dashboard','BackEnd\Admin\DashboardController@dashboard');

	//Admin Routes Starts here

	Route::match(['get','post'],'/my-profile','BackEnd\Admin\DashboardController@my_profile')->name('User My Profile');

	Route::match(['get','post'],'/change-password','BackEnd\Admin\DashboardController@change_password')->name('User Change Password');

	//User Management Routes Starts Here

	Route::match(['get','post'],'/users-list','BackEnd\UserManagement\UserManagementController@index')->name('Users List');

	Route::match(['get','post'],'/user-add','BackEnd\UserManagement\UserManagementController@add')->name('Add New User');

	Route::match(['get','post'],'/user-edit/{user_id}','BackEnd\UserManagement\UserManagementController@edit')->name('Edit Existing User Details');

	Route::match(['get','post'],'/user-delete/{user_id}','BackEnd\UserManagement\UserManagementController@delete')->name('Delete Existing User Details');

	//User Management Routes Ends Here

	//=========================== Business Management Routes Starts Here ======================

	Route::match(['get','post'],'/business-management-list','BackEnd\BusinessManagement\BusinessManagementController@index')->name('Business Management List');

	Route::match(['get','post'],'/business-management-add','BackEnd\BusinessManagement\BusinessManagementController@add')->name('Business Management Add');

	Route::match(['get','post'],'/business-management-edit/{b_m}','BackEnd\BusinessManagement\BusinessManagementController@edit')->name('Business Management Edit');

	Route::match(['get','post'],'/business-management-delete/{b_m}','BackEnd\BusinessManagement\BusinessManagementController@delete')->name('Business Management Delete');


	//=================== Business Management Routes Ends Here ===============================


	//==================== Designation Management Routes Starts Here ========================

	Route::match(['get','post'],'/designation-management-list','BackEnd\Designation\DesignationManagementController@index')->name('Designation Management List');

	Route::match(['get','post'],'/designation-management-add','BackEnd\Designation\DesignationManagementController@add')->name('Designation Management Add');

	Route::match(['get','post'],'/designation-management-edit/{b_m}','BackEnd\Designation\DesignationManagementController@edit')->name('Designation Management Edit');

	Route::match(['get','post'],'/designation-management-delete/{b_m}','BackEnd\Designation\DesignationManagementController@delete')->name('Designation Management Delete');

	//====================== Designation Management Routes Ends Here ===================


	//Employee Details Edit Routes Starts Here

	Route::match(['get','post'],'/employee-details','BackEnd\EmployeeDetails\EmployeeDetailsController@employee_details');

	//================== Employees Management Routes Start Here===========================

	Route::match(['get','post'],'/employee-management-list','BackEnd\EmployeeManagement\EmployeeManagementController@index')->name('Manage Employee Details List');

	Route::match(['get','post'],'/employee-add','BackEnd\EmployeeManagement\EmployeeManagementController@add')->name('Add Employee Details');

	Route::match(['get','post'],'/employee-edit/{emp_id}','BackEnd\EmployeeManagement\EmployeeManagementController@edit')->name('Edit Employee Details');

	Route::match(['get','post'],'/employee-delete/{emp_id}','BackEnd\EmployeeManagement\EmployeeManagementController@delete')->name('Delete Employee Details');

	//User Details Ajax
	Route::match(['get','post'],'/user-details/{unit_id}','BackEnd\EmployeeManagement\EmployeeManagementController@user_details')->name('Employee User Details');

	//User Designation Details
	Route::match(['get','post'],'/designation-details/{business_unit_id}','BackEnd\EmployeeManagement\EmployeeManagementController@designation_details')->name(' Employee Designation Details And Level');


	//Employee Personal Details

	Route::match(['get','post'],'/employee-personal-details-list','BackEnd\EmployeeManagement\EmployeeManagementController@employee_personal_details_index')->name('Employee Personal Details List');

	Route::match(['get','post'],'/employee-personal-detail-add','BackEnd\EmployeeManagement\EmployeeManagementController@employee_personal_details_add')->name('Employee Personal Details Add');

	Route::match(['get','post'],'/employee-personal-detail-edit/{emp_id}','BackEnd\EmployeeManagement\EmployeeManagementController@employee_personal_details_edit')->name('Employee Personal Details Edit');

	Route::match(['get','post'],'/employee-personal-detail-delete/{emp_id}','BackEnd\EmployeeManagement\EmployeeManagementController@employee_personal_details_delete')->name('Employee Personal Details Delete');

	//User Details Personal Details 
	Route::match(['get','post'],'/user-details-personal-details/{unit_id}','BackEnd\EmployeeManagement\EmployeeManagementController@user_details_personal_details')->name('Employee Personal Users Details');

	//Employee Personal Documents

	Route::match(['get','post'],'/employee-personal-documents-list','BackEnd\EmployeeManagement\EmployeeManagementController@employee_personal_documents_index')->name('Employee Personal Documents List');

	Route::match(['get','post'],'/employee-personal-document-add','BackEnd\EmployeeManagement\EmployeeManagementController@employee_personal_documents_add')->name('Employee Personal Documents Add');

	Route::match(['get','post'],'/employee-personal-document-edit/{emp_id}','BackEnd\EmployeeManagement\EmployeeManagementController@employee_personal_documents_edit')->name('Employee Personal Documents Edit');

	Route::match(['get','post'],'/employee-personal-document-delete/{emp_id}','BackEnd\EmployeeManagement\EmployeeManagementController@employee_personal_documents_delete')->name('Employee Personal Documents Delete');

	//User Details Personal Documents 
	Route::match(['get','post'],'/user-details-documents-details/{unit_id}','BackEnd\EmployeeManagement\EmployeeManagementController@user_details_documents')->name('Employee Personal Documents User Details');

	// Employee Resignation Start Here
	Route::match(['get','post'],'/resignation-management-list','BackEnd\EmployeeManagement\ResignationController@index')->name('Employee Resignation Management List');
	
	Route::match(['get','post'],'/resignation-add','BackEnd\EmployeeManagement\ResignationController@add')->name('Employee Resignation Add');

	Route::match(['get','post'],'/resignation-edit/{res_id}','BackEnd\EmployeeManagement\ResignationController@edit')->name('Employee Resignation Edit');

	Route::match(['get','post'],'/resignation-delete/{res_id}','BackEnd\EmployeeManagement\ResignationController@delete')->name('Employee Resignation Delete');

	//User Details Ajax For Resignation
	Route::match(['get','post'],'/user-resignation-details/{unit_id}','BackEnd\EmployeeManagement\ResignationController@user_resignation_details')->name('Employee Resignation User Details');

	// Employees Increment Details
	Route::match(['get','post'],'/increment-details-add','BackEnd\EmployeeManagement\IncrementDetailsManagementController@add')->name('Employee Increment Details Add');

	Route::match(['get','post'],'/increment-details-management-list','BackEnd\EmployeeManagement\IncrementDetailsManagementController@index')->name('Employee Increment Details List');

	Route::match(['get','post'],'/increment-details-edit/{increment_id}','BackEnd\EmployeeManagement\IncrementDetailsManagementController@edit')->name('Employee Increment Details Edit');

	Route::match(['get','post'],'/increment-details-delete/{increment_id}','BackEnd\EmployeeManagement\IncrementDetailsManagementController@delete')->name('Employee Increment Details Delete');

	//Increment Details Ajax For Employee
	Route::match(['get','post'],'/increment-details/{increment_id}','BackEnd\EmployeeManagement\IncrementDetailsManagementController@increment_details')->name('Employee Increment User Details');

	// Employees Previous Experience Details
	Route::match(['get','post'],'/previous-experience-details-add','BackEnd\EmployeeManagement\PreviousYearExperienceController@add')->name('Employee Previous Experience  Details Add');

	Route::match(['get','post'],'/previous-experience-details-list','BackEnd\EmployeeManagement\PreviousYearExperienceController@index')->name('Employee Previous Experience  Details List');

	Route::match(['get','post'],'/previous-experience-details-edit/{previous_id}','BackEnd\EmployeeManagement\PreviousYearExperienceController@edit')->name('Employee Previous Experience  Details Edit');

	Route::match(['get','post'],'/previous-experience-details-delete/{previous_id}','BackEnd\EmployeeManagement\PreviousYearExperienceController@delete')->name('Employee Previous Experience  Details Delete');

	//Previous Year Experience Details Ajax For Employee
	Route::match(['get','post'],'/previous-experience-details/{previous_id}','BackEnd\EmployeeManagement\PreviousYearExperienceController@previous_experience_details')->name('Employee Previous Experience User Details');

	// Employees after Joining

	Route::match(['get','post'],'/after-joining-management-list','BackEnd\EmployeeManagement\AfterJoiningManagementController@index')->name('Employee After Joining Management List');

	Route::match(['get','post'],'/after-joining-add','BackEnd\EmployeeManagement\AfterJoiningManagementController@add')->name('Employee After Joining Management Add');

	Route::match(['get','post'],'/after-joining-edit/{aj_id}','BackEnd\EmployeeManagement\AfterJoiningManagementController@edit')->name('Employee After Joining Management Edit');

	Route::match(['get','post'],'/after-joining-delete/{aj_id}','BackEnd\EmployeeManagement\AfterJoiningManagementController@delete')->name('Employee After Joining Management Delete');

	//User Details Ajax For After Join
	Route::match(['get','post'],'/user-after-join-details/{unit_id}','BackEnd\EmployeeManagement\AfterJoiningManagementController@user_after_join_details')->name('Employee After Joining Management User Details');

	// Employee Master Routes

	Route::match(['get','post'],'/employee-master-form','BackEnd\EmployeeManagement\EmployeeMasterController@employee_master')->name('Employee Master Form View');

	Route::match(['get','post'],'/employee-master-users/{unit_id}','BackEnd\EmployeeManagement\EmployeeMasterController@employee_master_users')->name('Employee Master Users Details');

	Route::match(['get','post'],'/employee-master-user-details','BackEnd\EmployeeManagement\EmployeeMasterController@employee_master_user_details')->name('Employee Master All Details');

	// =========================Employees Management Routes End Here========================


	// =========================Leave Management System Routes Start Here===================

	Route::match(['get','post'],'/leave-management-list','BackEnd\AttendanceManagement\LeaveManagementController@index')->name('Leave Management List');

	Route::match(['get','post'],'/leave-add','BackEnd\AttendanceManagement\LeaveManagementController@add')->name('Leave Management Add');

	Route::match(['get','post'],'/leave-edit/{leave_id}','BackEnd\AttendanceManagement\LeaveManagementController@edit')->name('Leave Management Edit');

	Route::match(['get','post'],'/leave-delete/{leave_id}','BackEnd\AttendanceManagement\LeaveManagementController@delete')->name('Leave Management Delete');

	// =========================Leave Management System Routes Start Here===================


	// =========================Employee Leaves Starts Here =======================================

	// Leaves By Year & Month

	Route::match(['get','post'],'/leaves-by-year-month','BackEnd\EmployeesLeave\EmployeesLeaveController@leaves_by_year_month')->name('Leave By Year Month');

	Route::match(['get','post'],'/leaves-by-year-month-data','BackEnd\EmployeesLeave\EmployeesLeaveController@leaves_by_year_month_ajax')->name('Leave By Year Month Get Data');

	// Leaves By Years Only

	Route::match(['get','post'],'/leaves-by-year','BackEnd\EmployeesLeave\EmployeesLeaveController@leaves_by_year')->name('Leave By Year');

	Route::match(['get','post'],'/leaves-by-year-data','BackEnd\EmployeesLeave\EmployeesLeaveController@leaves_by_year_ajax')->name('Leave By Year Get Data');


	// =========================Employee Leaves Ends Here =======================================
	

	// =====================Assets Management Routes Start Here============================


	Route::match(['get','post'],'/asset-management-list','BackEnd\AssetManagement\AssetManagementController@index')->name('Asset Management List');

	Route::match(['get','post'],'/asset-add','BackEnd\AssetManagement\AssetManagementController@add')->name('Asset Management Add');

	Route::match(['get','post'],'/asset-edit/{asset_id}','BackEnd\AssetManagement\AssetManagementController@edit')->name('Asset Management Edit');

	Route::match(['get','post'],'/asset-delete/{asset_id}','BackEnd\AssetManagement\AssetManagementController@delete')->name('Asset Management Delete');

	//User Details Assets Ajax
	Route::match(['get','post'],'/user-details-assets/{unit_id}','BackEnd\AssetManagement\AssetManagementController@user_details_assets')->name('Asset Management User Details');

	//========================= Assets Management Routes End Here==========================

	//========================== Statutory Start Here(Employee PF) ========================

	Route::match(['get','post'],'/statutory-management-list','BackEnd\StatutoryManagement\StatutoryManagementController@index')->name('Statutory Management List');

	Route::match(['get','post'],'/statutory-add','BackEnd\StatutoryManagement\StatutoryManagementController@add')->name('Statutory Management Add');

	Route::match(['get','post'],'/statutory-edit/{statutory_id}','BackEnd\StatutoryManagement\StatutoryManagementController@edit')->name('Statutory Management Edit');

	Route::match(['get','post'],'/statutory-delete/{statutory_id}','BackEnd\StatutoryManagement\StatutoryManagementController@delete')->name('Statutory Management Delete');

	//User Details Ajax For Statutory
	Route::match(['get','post'],'/user-statutory-details/{unit_id}','BackEnd\StatutoryManagement\StatutoryManagementController@user_statutory_details')->name('Statutory Management User Details');

	//========================= Statutory End Here(Employee PF) =============================


	//========================= Roles and Permissions =======================================

	// Assign Roles To Users 

	Route::match(['get','post'],'/manage-assign-roles','BackEnd\RolesManagement\RolesManagementController@assign_roles_index')->name('Manage Assign Roles');

	Route::match(['get','post'],'/add-role-to-user','BackEnd\RolesManagement\RolesManagementController@add_role_to_user')->name('Add Assign Role To User');

	Route::match(['get','post'],'/edit-role-to-user/{user_id}','BackEnd\RolesManagement\RolesManagementController@edit_role_to_user')->name('Edit Assign Role To User');

	//User Details For Assign Roles
	Route::match(['get','post'],'/user-details-for-assign-role/{unit_id}','BackEnd\RolesManagement\RolesManagementController@user_details_for_assign_role')->name('User Details For Assign Roles');


	//Permissions Routes

	Route::match(['get','post'],'/permission-list/','BackEnd\PermissionManagement\PermissionManagementController@permissions_list')->name('All Permissions List');

	Route::match(['get','post'],'/permissions-refresh/','BackEnd\PermissionManagement\PermissionManagementController@permission_refresh')->name('Permissions Refresh');

	Route::match(['get','post'],'/permission-update/','BackEnd\PermissionManagement\PermissionManagementController@permission_update')->name('Permissions Update');

	Route::match(['get','post'],'/manage-users-permissions/','BackEnd\PermissionManagement\PermissionManagementController@manage_permission_users_index')->name('Manage Users Permissions');

	Route::match(['get','post'],'/add-permissions-to-user/','BackEnd\PermissionManagement\PermissionManagementController@add_permissions_to_user')->name('Add Permissions To User');

	Route::match(['get','post'],'/edit-permissions-to-user/{user_id}','BackEnd\PermissionManagement\PermissionManagementController@edit_permissions_to_user')->name('Edit Permissions To User');

	Route::match(['get','post'],'/user-details-for-permissions/{unit_id}','BackEnd\PermissionManagement\PermissionManagementController@user_details_for_permissions')->name('User Details For Permissions');



});



if (!defined('DefaultImgPath')) define('DefaultImgPath', asset('public/images/no_image.png'));


if (!defined('COMMON_ERROR')) define('COMMON_ERROR', 'An Error Occurred, Please Try Again Later');

//blade file
if (!defined('profileImageImagePath')) define('profileImageImagePath',asset('public/profile_images'));


//controller file
if (!defined('profileImageBasePath')) define('profileImageBasePath','public/profile_images');


//Employee Passport Images Blade
if (!defined('employeePassportImagePath')) define('employeePassportImagePath',asset('public/employees_passport_images'));


//Employee Passport Images Controller
if (!defined('employeePassportImageBasePath')) define('employeePassportImageBasePath','public/employees_passport_images');


//Employee Pancard Images Blade
if (!defined('employeePancardImagePath')) define('employeePancardImagePath',asset('public/employees_pancard'));


//Employee Pancard Images Controller
if (!defined('employeePancardImageBasePath')) define('employeePancardImageBasePath','public/employees_pancard');


//Employee Passport Blade
if (!defined('employeePassportImagesPath')) define('employeePassportImagesPath',asset('public/employees_passport'));


//Employee Passport Controller
if (!defined('employeePassportImagesBasePath')) define('employeePassportImagesBasePath','public/employees_passport');

//Employee Aadhaar Card Blade
if (!defined('employeeAadhaarCardImagesPath')) define('employeeAadhaarCardImagesPath',asset('public/employees_aadhaar_card'));


//Employee Aadhaar Card Controller
if (!defined('employeeAadhaarCardImagesBasePath')) define('employeeAadhaarCardImagesBasePath','public/employees_aadhaar_card');

//Employee Tenth Qualification Blade
if (!defined('tenthQualificationImagePath')) define('tenthQualificationImagePath',asset('public/employees_tenth_qualification'));


//Employee Tenth Qualification Controller
if (!defined('tenthQualificationImageBasePath')) define('tenthQualificationImageBasePath','public/employees_tenth_qualification');

//Employee Twelve Qualification Blade
if (!defined('twelveQualificationImagePath')) define('twelveQualificationImagePath',asset('public/employees_twelve_qualification'));


//Employee Twelve Qualification Controller
if (!defined('twelveQualificationImageBasePath')) define('twelveQualificationImageBasePath','public/employees_twelve_qualification');


//Employee Other Qualification Blade
if (!defined('otherQualificationImagePath')) define('otherQualificationImagePath',asset('public/employees_other_qualification'));


//Employee Other Qualification Controller
if (!defined('otherQualificationImageBasePath')) define('otherQualificationImageBasePath','public/employees_other_qualification');


//Employee Graduation Blade
if (!defined('graduationImagePath')) define('graduationImagePath',asset('public/graduation_img'));


//Employee Graduation Controller
if (!defined('graduationImageBasePath')) define('graduationImageBasePath','public/graduation_img');

//Employee Post Graduation Blade
if (!defined('postGraduationImagePath')) define('postGraduationImagePath',asset('public/post_graduation_img'));


//Employee Post Graduation Controller
if (!defined('postGraduationImageBasePath')) define('postGraduationImageBasePath','public/post_graduation_img');

//Employee Other Documents Blade
if (!defined('otherDocumentsImagePath')) define('otherDocumentsImagePath',asset('public/other_documents'));


//Employee Other Documents Controller
if (!defined('otherDocumentsImageBasePath')) define('otherDocumentsImageBasePath','public/other_documents');


//blade file
if (!defined('iprLetterImagePath')) define('iprLetterImagePath',asset('public/ipr_letter'));


//controller file
if (!defined('iprLetterImageBasePath')) define('iprLetterImageBasePath','public/ipr_letter');

// Letter of Employment blade file
if (!defined('employmentLetterImagePath')) define('employmentLetterImagePath',asset('public/employment_letter'));


// Letter of Employment Controller file
if (!defined('employmentLetterImageBasePath')) define('employmentLetterImageBasePath','public/employment_letter');

// Appointment Letter of Employment blade file
if (!defined('appointmentLetterImagePath')) define('appointmentLetterImagePath',asset('public/appointment_letter'));


// Appointment Letter of Employment Controller file
if (!defined('appointmentLetterImageBasePath')) define('appointmentLetterImageBasePath','public/appointment_letter');

// Confirmation Letter of Employment blade file
if (!defined('confirmationLetterImagePath')) define('confirmationLetterImagePath',asset('public/confirmation_letter'));

// Confirmation Letter of Employment Controller file
if (!defined('confirmationLetterImageBasePath')) define('confirmationLetterImageBasePath','public/confirmation_letter');


// Confirmation Letter of Employment Controller file
if (!defined('transferLetterImageBasePath')) define('transferLetterImageBasePath','public/transfer_letter');

// Transfer Letter of Employment blade file
if (!defined('transferLetterImagePath')) define('transferLetterImagePath',asset('public/transfer_letter'));


// Transfer Letter of Employment Controller file
if (!defined('transferLetterImageBasePath')) define('transferLetterImageBasePath','public/transfer_letter');

// Previous Year Copy of Resignation Letter  blade file
if (!defined('copyResignationLetterImagePath')) define('copyResignationLetterImagePath',asset('public/copy_resignation_letter'));


// Previous Year Copy of Resignation Letter Controller file
if (!defined('copyResignationLetterImageBasePath')) define('copyResignationLetterImageBasePath','public/copy_resignation_letter');

// Previous Year Experience Copy of Relieving Letter  blade file
if (!defined('previousRelievingLetterImagePath')) define('previousRelievingLetterImagePath',asset('public/copy_previous_relieving_letter'));


// Previous Year Relieving Copy of Relieving Letter Controller file
if (!defined('previousRelievingLetterImageBasePath')) define('previousRelievingLetterImageBasePath','public/copy_previous_relieving_letter');




