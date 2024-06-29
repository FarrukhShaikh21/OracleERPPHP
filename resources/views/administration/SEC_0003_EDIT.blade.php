@extends('admin.admin_dashboard')
@section('admin') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

						<div class="card">
							<div class="card-body p-4">
								<h5 class="mb-4">Vertical Addon</h5>
								<form class="row g-3">
									<div class="col-md-12">
										<label for="input25" class="form-label">First Name</label>
										 <div class="input-group">
											<span class="input-group-text"><i class='bx bx-user'></i></span>
											<input type="text" maxlength="15" value={{$tabledata->first_name}} class="form-control" id="first_name" placeholder="First Name">
										  </div>
									</div>
									<div class="col-md-12">
										<label for="input26" class="form-label">Last Name</label>
										<div class="input-group">
											<span class="input-group-text"><i class='bx bx-user'></i></span>
											<input type="text" maxlength="15" value={{$tabledata->last_name}} class="form-control" id="input26" placeholder="Last Name">
										  </div>
									</div>
									<div class="col-md-12">
										<label for="input27" class="form-label">Email</label>
										<div class="input-group">
											<span class="input-group-text"><i class='bx bx-envelope'></i></span>
											<input type="text" value={{$tabledata->email}} class="form-control" id="input27" placeholder="Email">
										  </div>
									</div>
									<div class="col-md-12">
										<label for="input28" class="form-label">Password</label>
										<div class="input-group">
											<span class="input-group-text"><i class='bx bx-lock-alt'></i></span>
											<input type="password" value={{$tabledata->password}} class="form-control" id="input28" placeholder="Password">
										  </div>
									</div>
									<div class="col-md-12">
										<label for="input29" class="form-label">DOB</label>
										<div class="input-group">
											<span class="input-group-text"><i class='bx bx-calendar'></i></span>
											<input type="date" class="form-control" id="date"  max={{now()}}>
										  </div>
									</div>
                                    
                                    <div class="col-md-12">
										<label for="input30" class="form-label">Gender</label>
										<div class="input-group">
											<span class="input-group-text"><i class='bx bx-flag'></i></span>
											<select class="form-select" id="input30" value="3">
												{{-- <option selected>Open this select menu</option> --}}
                                               @foreach($erpgender as $key=> $record ) 
                                                <option value={{$record->GENDER_SNO}} {{$record->GENDER_SNO==$tabledata->gender_sno?"selected":""}}>{{$record->GENDER_DESCRIPTION}}</option>
											    @endforeach
											  </select>
										  </div>
									</div>

									<div class="col-md-12">
										<label for="input30" class="form-label">Country</label>
										<div class="input-group">
											<span class="input-group-text"><i class='bx bx-flag'></i></span>
											<select class="form-select" id="input30">
												<option selected>Open this select menu</option>
												<option value="1">One</option>
												<option value="2">Two</option>
												<option value="3">Three</option>
											  </select>
										  </div>
									</div>
									<div class="col-md-12">
										<label for="input31" class="form-label">Zip</label>
										<div class="input-group">
											<span class="input-group-text"><i class='bx bx-pin'></i></span>
											<input type="text" class="form-control" id="input31" placeholder="Zip">
										  </div>
									</div>
									<div class="col-md-12">
										<label for="input32" class="form-label">City</label>
										<div class="input-group">
											<span class="input-group-text"><i class='bx bx-buildings'></i></span>
											<input type="text" class="form-control" id="input32" placeholder="City">
										  </div>
									</div>
									<div class="col-md-12">
										<label for="input33" class="form-label">State</label>
										<div class="input-group">
											<span class="input-group-text"><i class='bx bxs-city'></i></span>
											<select class="form-select" id="input33">
												<option selected>Open this select menu</option>
												<option value="1">One</option>
												<option value="2">Two</option>
												<option value="3">Three</option>
											  </select>
										  </div>
									</div>
									<div class="col-md-12">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="input34">
											<label class="form-check-label" for="input34">Check me out</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="d-md-flex d-grid align-items-center gap-3">
											<button type="button" class="btn btn-primary px-4">Submit</button>
											<button type="button" class="btn btn-light px-4">Reset</button>
										</div>
									</div>
								</form>
							</div>
						</div>
@endsection