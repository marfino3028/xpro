@extends('layouts.index')

@section('title')
    X Pro - Work Order Settings
@endsection


@section('content')

<!-- Circle Buttons -->
<div class="content-wrapper">
    <section class="content">
        <div class="content-wrapper">
            <div class="card">
				<div class="card-body">
					<h6 class="m-0 font-weight-bold text-primary">Work Order Settings</h6>

				<div class="card-body" id="cardMoreOptions">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#menu1">Settings</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu2">Statues</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu3">Actions</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu4">Layout</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu5">Custom Fields</a>
						</li>
					</ul>

					<div class="tab-content">
						<!-- Content Setting -->
						<div id="menu1" class=" tab-pane active ml-3"><br>
							<div class="form-group mt-3 ml-2">
								<label for="disabledTextInput" class="mr-5">Next Work Order Number</label>
								<a  href="" class="far fa-edit ml-5" style="font-size: 12px;"> Auto Number Settings</a><br>
								<input class="form-control" id="disabledInput" type="text" placeholder="W-0005" disabled  style="width: 420px;">
									<br/>
								<label for="">Budget Calculation </label><br>
								<select class="custom-select" style="width: 420px;">
									<option selected value="1">Expenses</option>
									<option value="2">Invoices</option>
								</select>
							</div>
							<hr>
							<a href="#" class="btn btn-sm btn-outline-success btn-icon-split col-auto ml-3">
								<i class="fas fa-save"></i>
								<span class="text">Save</span>
							</a>
						</div>
						<!-- Content Statues -->
						<div id="menu2" class=" tab-pane fade"><br>
							<table class="table">
							<thead class="thead" style="background-color: gainsboro;">
								<tr>
									<th>Name</th>
									<th>Color</th>
									<th>Status</th>
									<th>Delete</th>
								</tr>
							</thead>
								<tbody class="tbody-light">
									<tr>
										<td style="width: 100px;">
											<input type="text" class="form-control" id="exampleInputName">
										</td>
										<td style="width: 100px;">
											<div class="btn-group">
												<a id="selected-color2" class="btn dropdown-toggle" data-toggle="dropdown"><i>Choose</i></a>
												<ul class="dropdown-menu" style="width:293px;">
													<li style="display:inline-block;">
														<div> font color</div>
														<div id="colorpalette2"></div>
													</li>
													<li style="display:inline-block;">
														<div> background color</div>
														<div id="colorpalette3"></div>
													</li>
												</ul>
											</div>
										</td>
										<td style="width: 100px;">
											<select class="custom-select">
												<option selected value="1">Open</option>
												<option value="2">Closed</option>
											</select>
										</td>
										<td style="width: 100px;">
											<a href="#" class="btn btn-sm btn-icon-split">
												<span class="icon">
													<i class="fas fa-trash"></i>
												</span>
												<span class="text">Delete</span>
											</a>
										</td>
									</tr>
								</tbody>
							</table>
							<table class="table-borderless">
							<tbody>
								<tr>
									<td>
										<button type="submit" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Add new Status</button>
									</td>
								</tr>
								<tr>
									<td align="right" style="width: 1000px;">
										<a href="#" class="btn btn-success btn-icon-split col-auto ml-3">
											<span class="icon text-white-50">
												<i class="fas fa-chevron-right"></i>
											</span>
											<span class="text">Save</span>
										</a>
									</td>
								</tr>
							</tbody>
							</table>
						</div>

						<!-- Content Actions -->
						<div id="menu3" class=" tab-pane fade"><br>
							<table class=" table">
							<thead class="thead" style="background-color: gainsboro;">
								<tr>
									<th colspan="4">Name</th>
								</tr>
							</thead>
								<tbody class="tbody-light">
									<tr>
										<td style="width: 410px;">
											<input type="text" class="form-control" id="exampleInputName" style="width: 400px;">
										</td>
										<td colspan="3">
											<a href="#" class="btn btn-sm btn-icon-split">
												<span class="icon">
													<i class="fas fa-trash"></i>
												</span>
												<span class="text">Delete</span>
											</a>
										</td>
									</tr>
								</tbody>
							</table>
							<table class="table-borderless">
							<tbody>
								<tr>
									<td>
										<button type="submit" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Add new Status</button>
									</td>
								</tr>
								<tr>
									<td align="right" style="width: 1000px;">
										<a href="#" class="btn btn-success btn-icon-split col-auto ml-3">
											<span class="icon text-white-50">
												<i class="fas fa-chevron-right"></i>
											</span>
											<span class="text">Save</span>
										</a>
									</td>
								</tr>
							</tbody>
							</table>
						</div>

						<!-- Content Layout -->
						<div id="menu4" class=" tab-pane fade"><br>
							Empety
						</div>

						<!-- Custom Fields -->
						<div id="menu5" class=" tab-pane fade"><br>
							Empety
						</div>
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