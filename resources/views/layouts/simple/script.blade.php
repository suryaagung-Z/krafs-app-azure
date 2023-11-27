<!-- latest jquery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Bootstrap js-->
<script src="/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- feather icon js-->
<script src="/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="/assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- scrollbar js-->
<script src="/assets/js/scrollbar/simplebar.js"></script>
<script src="/assets/js/scrollbar/custom.js"></script>
<!-- Sidebar jquery-->
<script src="/assets/js/config.js"></script>
<!-- Plugins JS start-->
<script src="/assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="/assets/js/chart/apex-chart/stock-prices.js"></script>
<script id="menu" src="/assets/js/sidebar-menu.js"></script>
<script src="/assets/js/slick/slick.min.js"></script>
<script src="/assets/js/slick/slick.js"></script>
<script src="/assets/js/header-slick.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('script')

@if(Route::current()->getName() != 'popover')
<script src="/assets/js/tooltip-init.js"></script>
@endif

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="/assets/js/script.js"></script>
{{-- <script src="/assets/js/theme-customizer/customizer.js"></script> --}}
<script src="/assets/js/custom-script.js"></script>


{{-- @if(Route::current()->getName() == 'index') 
	<script src="/assets/js/layout-change.js"></script>
@endif --}}

@if(Route::currentRouteName() == 'index')
<script>
	new WOW().init();
</script>
@endif

@if (session('danger'))
<script lang="javascript">
	Swal.fire({
		position: "top-end",
		icon: "error",
		title: "{{ session('danger",
		showConfirmButton: false,
		timer: 2000
	});
</script>
@elseif(session('warning'))
<script lang="javascript">
	Swal.fire({
		position: "top-end",
		icon: "warning",
		title: "{{ session('warning",
		showConfirmButton: false,
		timer: 2000
	});
</script>
@elseif(session('success'))
<script lang="javascript">
	Swal.fire({
		position: "top-end",
		icon: "success",
		title: "{{ session('success",
		showConfirmButton: false,
		timer: 2000
	});
</script>
@endif