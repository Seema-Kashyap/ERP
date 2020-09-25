<script type="text/javascript">

	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "newestOnTop": true,
	  "progressBar": true,
	  "positionClass": "toast-top-right",
	  "preventDuplicates": false,
	  "showDuration": "30000000",
	  "hideDuration": "5000",
	  "timeOut": "6000",
	  "extendedTimeOut": "5000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}
</script>
<script type="text/javascript">
	<?php if(Session::has('success')){

		$success = Session::get('success')
	?>

	toastr.success("{{$success}}");

	<?php } ?>
	
	<?php if(Session::has('error')){

		$error = Session::get('error')
	?>

	toastr.error("{{$error}}");

	<?php } ?>

	<?php if(Session::has('warning')){

		$warning = Session::get('warning')
	?>

	toastr.error("{{$warning}}");

	<?php } ?>
</script>