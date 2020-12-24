@extends('layouts.index')

@section('title')
    X Pro - Time Sheet Settings
@endsection


@section('content')

<!-- Circle Buttons -->
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card">
				<div class="card-body">
					<h6 class="m-0 font-weight-bold text-primary">Time Sheet Settings</h6>

				<div class="card-body" id="cardMoreOptions">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#menu1">Settings</a>
						</li>
					</ul>

					<div class="tab-content">
						@if (session('success'))
						<div class="alert alert-success">
						{{ session('success') }}
						</div>
						@endif 
						@if (session('failed'))
						<div class="alert alert-danger">
						{{ session('failed') }}
						</div>
						@endif
						<!-- Content Setting -->
						<form action="" method="POST" >
							@csrf
						<div id="menu1" class=" tab-pane active ml-3"><br>
							<div class="form-check col-auto ml-3">
                                <input type="checkbox" class="form-check-input" name="enable_penalty"  id="exampleCheck1" {{ $data->enable_penalty ? "checked" : "" }}>
                                <label class="form-check-label" for="exampleCheck1">Enable Normal Hours</label>
                            </div>
                            <div class="form-group mt-3 ml-2">
                                <label for="disabledTextInput">Normal Hours</label>
                                <input class="form-control" id="disabledInput" type="text" name="normal_hours" value="{{ $data->normal_hours }}" placeholder="8 hours">
							</div>
							<div class="form-group mt-3 ml-2">
                                <label for="disabledTextInput">Penalty Rates 1</label>
                                <input class="form-control" id="disabledInput" type="text" name="penalty_rates_1" value="{{ $data->penalty_rates_1 }}">
							</div>
							<div class="form-group mt-3 ml-2">
                                <label for="disabledTextInput">Max Hours Penalty 1</label>
                                <input class="form-control" id="disabledInput" type="text" name="max_hours_penalty_1" value="{{ $data->max_hours_penalty_1 }}">
							</div>
							<div class="form-group mt-3 ml-2">
                                <label for="disabledTextInput">Penalty Rates 2</label>
                                <input class="form-control" id="disabledInput" type="text" name="penalty_rates_2" value="{{ $data->penalty_rates_2 }}">
							</div>
							<div class="form-group mt-3 ml-2">
                                <label for="disabledTextInput">Max Hours Penalty 2</label>
                                <input class="form-control" id="disabledInput" type="text" name="max_hours_penalty_2" value="{{ $data->max_hours_penalty_2 }}">
							</div>
							<hr>
							<button type="submit" class="btn btn-sm btn-outline-success btn-icon-split col-auto ml-3">
								<i class="fas fa-save"></i>
								<span class="text">Save</span>
							</button>
						</div>
						</form>
					</div> 
				</div>
			</div>
		</div>
	</section>
</div>
  
@endsection

@push('js')

  <script>
  		$('#colorpalette2').colorPalette().on('selectColor', function(e)
  		 {
    		$('#selected-color2 i').css('color', e.color);
 		 });
		$('#colorpalette3').colorPalette().on('selectColor', function(e) 
		{
    		$('#selected-color2 i').css('background-color', e.color);
 		 });
  </script>
@endpush