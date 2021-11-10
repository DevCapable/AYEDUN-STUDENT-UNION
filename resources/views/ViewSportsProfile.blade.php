<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>User | Dashboard</title>
	@include('layouts.styles')
	<style>
		.help-block {
			color: #dc3545;
		}

		.has-error {
			color: #dc3545;
		}

		.card:hover {
            box-shadow: 0px 2px 7px 2px gray ;
        }
	
		body {
			font-family: Arial;
		}

		
	</style>
</head>

<body style="padding-top: 100px">
	@include('layouts.header')
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
			</div>
			<div class="col-sm-6">
				<form method="POST" action="{{ url('user/image-upload') }}" id="logout" novalidate>
					<button style=" float: right;" type="submit" class="btn btn-sm btn-primary"> <a
							style="color: white; text-decoration:none" href="/user/image-upload"> Upload Profile
							Picture</a></button>
				</form>
				<form method="POST" action="{{ url('user/logout') }}" id="logout" novalidate>
					@csrf
					<button style=" float: right;" type="submit" class="btn btn-sm btn-primary">Log Out</button>
				</form>
			</div>
		</div>
		<div class="row mt-12">
			<div class="col-md-12 offset-col-md-4">
				<div class="card">
					<div class="card-header">
                        <h3 class="card-title pull-left text-uppercase text-info font-weight-bolder">{{ strtoupper($UserId->full_name) }}'S PROFILE</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<section class="blog-page">
									<div class="container">
										<div class="row">
											<div class="col-md-10 col-md-offset-2">
												<div class="blog-item"> <div>
													<span style="float: left"
													class="badge badge-info pull-right">From ({{ $UserId->year_of_tenure_from }}) To ({{ $UserId->year_of_tenure_to }})
												</span><br>
												</div>
													<div class="down-content">

														<div class="row">
															<details>
																<summary style="background-color:red; color:#fff;">
																	...Click to See <i class="fa fa-eye"></i>
																	 {{ $UserId->full_name }} s' Profile
																</summary>
																<table class="table"
																	style="padding-left: 20px; margin-left: 30px;">
																	<tr>
																		<td colspan="2">
																			<img src="{{ asset($UserId->picture) }}"
																				class="img-thumbnail" width="100px" width="100px"  style="box-shadow: 0px 2px 7px 2px gray ;" alt="Ayedun Students' Union"/>
																		</td>
																	</tr>
																	<tr>
																		<th>
																			FULL NAME:
																		</th>
																		<td>
																			{{ $UserId->full_name }}
																		</td>
																	</tr>
																	<tr>
																		<th>
																			OFFICE:
																		</th>
																		<td>
																			{{ $UserId->post }}
																		</td>
																	</tr>
																	<tr>
																		<th>
																			DESCIPLINE:
																		</th>
																		<td>
																			{{ $UserId->discepline }}
																		</td>
																	</tr>
																	<tr>
																		<th>
																			GENDER:
																		</th>
																		<td>
																			{{ $UserId->gender }}
																		</td>
																	</tr>
																	<tr>
																		<th>
																			DATE OF BIRTH:
																		</th>
																		<td>
																			{{ $UserId->date_of_birth }}
																		</td>
																	</tr>
																	<tr>
																		<th>
																			COMPOUND:
																		</th>
																		<td>
																			{{ $UserId->compound }}
																		</td>
																	</tr>

																	<tr>
																		<th>
																			SCHOOL:
																		</th>
																		<td>
																			{{ $UserId->institution }}
																		</td>
																	</tr>
																	<tr>
																		<th>
																			YEAR OF TNURE FROM:
																		</th>
																		<td>
																			{{ $UserId->year_of_tenure_from }}
																		</td>
																	</tr>
                                                                    <tr>
																		<th>
																			YEAR OF TNURE TO:
																		</th>
																		<td>
																			{{ $UserId->year_of_tenure_to}}
																		</td>
																	</tr>

																	<tr>
																		<th>
																			HISTORY/PROJECT EXECUTED:
																		</th>
																		<td>
																			{{ $UserId->history }}
																		</td>
																	</tr>
																	<tr>
																		<th>
																			PHONE NUMBER:
																		</th>
																		<td>
																			{{ $UserId->phone }}
																		</td>
																	</tr>
																	<tr>
																		<td colspan="2">
																			
																	<button class="btn btn-info" style="float: right; background-color: #4CAF50;
                                                  color: white;
                                                  padding: 14px 20px;
                                                  margin: 8px 0;
                                                  border: none;
                                                  cursor: pointer;
                                                  width: 100%;"> <a style="text-decoration: none; color: #fff; "
																					 href={{ url('user/home') }}>GO HOME</a></button>
																
																			
																		</td></tr>		
																</table>
																</table>
															</details>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
							<div class="col-sm-6">	
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	</div>

	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->

	</div>
	@include('layouts.footer')
	@include('layouts.scripts')

</div>
</body>

</html>