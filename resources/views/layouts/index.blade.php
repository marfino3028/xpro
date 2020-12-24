<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>XPROS</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="/assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
  <link href="/assets/custom/css/layout.min.css" rel="stylesheet" type="text/css">
  <link href="/assets/custom/css/components.min.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/components.min.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="/assets/js/main/jquery.min.js"></script>
	<script src="/assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="/assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="/assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

  <!-- Theme JS files -->
	<script src="/assets/js/plugins/tables/datatables/datatables.min.js"></script>
  <script src="/assets/js/plugins/forms/selects/select2.min.js"></script>
  <script src="/assets/js/demo_pages/datatables_sorting.js"></script>
  <script src="/assets/custom/js/app.js"></script>
  <script src="/assets/js/plugins/ui/moment/moment.min.js"></script>
  <script src="/assets/js/plugins/notifications/sweet_alert.min.js"></script>
  <script src="/assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="/assets/js/plugins/pickers/anytime.min.js"></script>
	<script src="/assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script src="/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script src="/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script src="/assets/js/plugins/pickers/pickadate/legacy.js"></script>
  <script src="/assets/js/plugins/notifications/jgrowl.min.js"></script>
  <script src="/assets/js/plugins/forms/tags/tagsinput.min.js"></script>
	<script src="/assets/js/plugins/forms/tags/tokenfield.min.js"></script>
	<script src="/assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
  <script src="/assets/js/plugins/ui/prism.min.js"></script>  
  <script src="/assets/js/demo_pages/form_tags_input.js"></script>


 <!-- Theme JS files Calender adn Timesheet -->
  <script src="/assets/js/plugins/ui/fullcalendar/core/main.min.js"></script>
  <script src="/assets/js/plugins/ui/fullcalendar/daygrid/main.min.js"></script>
  <script src="/assets/js/plugins/ui/fullcalendar/timegrid/main.min.js"></script>
  <script src="/assets/js/plugins/ui/fullcalendar/list/main.min.js"></script>
  <script src="/assets/js/plugins/ui/fullcalendar/interaction/main.min.js"></script>
  <!-- /theme JS files Calender adn Timesheet -->

  <!-- Theme JS files Form Input -->
  <script src="/assets/js/plugins/forms/styling/uniform.min.js"></script>
  <script src="/assets/js/demo_pages/form_inputs.js"></script>
  <!-- /theme JS files  Form Input-->

  <!-- Theme JS files TAGS -->
  <script src="/assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
  <script src="/assets/js/demo_pages/form_select2.js"></script>
  <!-- /theme JS files TAGS-->

  <script>
  document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
  });
  document.onkeydown = function(e) {
    if (e.ctrlKey && 
        (e.keyCode === 67 || 
          e.keyCode === 86 || 
          e.keyCode === 85 || 
          e.keyCode === 117)) {
        alert('Opps!');
        return false;
    } else {
        return true;
    }
  };
     var swalInit = swal.mixin({
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-light'
          });
  </script>
	<!-- /theme JS files -->
  <style>
    thead {
      font-size: .8125rem;
      font-weight : 450;
    }
    tbody {
      font-size: .8125rem;
    }
    </style>
</head>

  <body>

    @include('layouts/navbar')

	<div class="page-content">
    @include('layouts/sidebar')
        <div class="content-wrapper">
	        @yield('content')
          @include('layouts.footer')
        </div>
  </div>

  </body>
</html>