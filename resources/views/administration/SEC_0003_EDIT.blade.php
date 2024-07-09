@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title">User Information </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                        aria-selected="false" tabindex="-1">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title">Room Number</div>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                            <form action="/sec/SEC_0003_EDIT/update" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content py-3">
                                    <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">

                                        <div class="col-xl-12 mx-auto">


                                            <div class="card">
                                                <div class="card-body p-4">
                                                    <div class="row g-3">

                                                        <div class="col-md-12">
                                                            <div class="d-md-flex d-grid align-items-center gap-3">
                                                                <button type="submit"
                                                                    class="btn btn-primary px-4">Save</button>
                                                                <button type="button"
                                                                    class="btn btn-light px-4">Reset</button>
                                                            </div>
                                                            <input type="hidden" name="USER_ID"
                                                                value="{{ $tabledata->USER_ID }}">
                                                        </div>



                                                        <div class="col-md-6">
                                                            <label for="USER_CODE" class="form-label">User Code</label>
                                                            <div class="input-group">
                                                                <input type="text" value={{ $tabledata->USER_CODE }}
                                                                    class="form-control" id="USER_CODE" name="USER_CODE"
                                                                    placeholder="User Code">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="FIRST_NAME" class="form-label">First Name</label>
                                                            <div class="input-group">
                                                                <input type="text" maxlength="15"
                                                                    value="{{ old('FIRST_NAME', $tabledata->FIRST_NAME) }}"
                                                                    class="form-control" id="FIRST_NAME" name="FIRST_NAME"
                                                                    placeholder="First Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="LAST_NAME" class="form-label">Last Name</label>
                                                            <div class="input-group">
                                                                <input type="text" maxlength="15"
                                                                    value="{{ old('LAST_NAME', $tabledata->LAST_NAME) }}"
                                                                    class="form-control" name="LAST_NAME"
                                                                    placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="EMAIL" class="form-label">Email</label>
                                                            <div class="input-group">
                                                                <input type="text" name="EMAIL" id="EMAIL"
                                                                    value="{{ old('EMAIL', $tabledata->EMAIL) }}"
                                                                    class="form-control" id="EMAIL" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="PASSWORDD" class="form-label">Password</label>
                                                            <div class="input-group">
                                                                <input name="PASSWORDD" type="password"
                                                                    value="{{ old('PASSWORDD', $tabledata->PASSWORDD) }}"
                                                                    class="form-control" id="PASSWORDD"
                                                                    placeholder="Password">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="DOB" class="form-label">DOB</label>
                                                            <div class="input-group">
                                                                <input name="DOB" type="date"
                                                                    value="{{ old('DOB', $tabledata->DOB) }}"
                                                                    class="form-control" id="DOB"
                                                                    max={{ now() }}>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="GENDER_SNO" class="form-label">Gender</label>
                                                            <div class="input-group">
                                                                <select class="form-select" id="GENDER_SNO"
                                                                    name="GENDER_SNO">
                                                                    {{-- <option selected>Open this select menu</option> --}}
                                                                    @foreach ($erppoplists['genderlov'] as $key => $record)
                                                                        <option value={{ $record->GENDER_SNO }}
                                                                            {{ $record->GENDER_SNO == $tabledata->GENDER_SNO ? 'selected' : '' }}>
                                                                            {{ $record->GENDER_DESCRIPTION }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="MOBILE_NO" class="form-label">Mobile No</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ old('MOBILE_NO', $tabledata->MOBILE_NO) }}"
                                                                    id="MOBILE_NO" name="MOBILE_NO" placeholder="Mobile">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="PHONE_NO" class="form-label">Phone No</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ old('PHONE_NO', $tabledata->PHONE_NO) }}"
                                                                    id="phone_no" name="PHONE_NO" placeholder="Phone">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <label for="CNIC_NO" class="form-label">CNIC No</label>
                                                            <div class="input-group">
                                                                <input
                                                                    title="CNIC Should be 13 characters with out dashes '-' "
                                                                    type="text"
                                                                    class="form-control @error('CNIC_NO') is-invalid @enderror"
                                                                    value="{{ old('CNIC_NO', $tabledata->CNIC_NO) }}"
                                                                    id="cnic_no" name="CNIC_NO" placeholder="CNIC NO">

                                                                @error('CNIC_NO')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="IS_LOCK" class="form-label">Lock</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value={{ $tabledata->IS_LOCK }} id="IS_LOCK"
                                                                    name="IS_LOCK" placeholder="Lock">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="LOCK_DATE" class="form-label">Lock Date</label>
                                                            <div class="input-group">
                                                                <input type="date" class="form-control"
                                                                    value={{ $tabledata->LOCK_DATE }} id="LOCK_DATE"
                                                                    name="LOCK_DATE" placeholder="Lock Date">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="IS_EXPIRED" class="form-label">Expired</label>
                                                            <div class="input-group">
                                                                <input name="IS_EXPIRED" type="text"
                                                                    class="form-control"
                                                                    value={{ $tabledata->IS_EXPIRED }} id="IS_EXPIRED"
                                                                    placeholder="Expired">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="EXPIRY_DATE" class="form-label">Expiry
                                                                Date</label>
                                                            <div class="input-group">
                                                                <input name="EXPIRY_DATE" type="date"
                                                                    class="form-control"
                                                                    value={{ $tabledata->EXPIRY_DATE }} id="EXPIRY_DATE"
                                                                    placeholder="Expity Date">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="LAST_LOGIN_DATE" class="form-label">Last Login
                                                                Date</label>
                                                            <div class="input-group">
                                                                <input value="LAST_LOGIN_DATE" type="date" readonly
                                                                    class="form-control"
                                                                    value={{ $tabledata->LAST_LOGIN_DATE }}
                                                                    id="LAST_LOGIN_DATE" placeholder="Last Login Date">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="COUNTRY_SNO" class="form-label">Country</label>
                                                            <div class="input-group">
                                                                <select class="form-select" id="COUNTRY_SNO"
                                                                    name="COUNTRY_SNO">
                                                                    {{-- <option selected>Open this select menu</option> --}}
                                                                    @foreach ($erppoplists['countrylov'] as $key => $record)
                                                                        <option value={{ $record->COUNTRYCODE }}
                                                                            {{ $record->COUNTRYCODE == $tabledata->COUNTRY_SNO ? 'selected' : '' }}>
                                                                            {{ $record->COUNTRYNAME }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="CITY_SNO" class="form-label">City</label>
                                                            <div class="input-group">
                                                                <input name="CITY_SNO" type="text"
                                                                    class="form-control" id="input32"
                                                                    placeholder="City">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="ALLOWED_IP_ADDRESS" class="form-label">Allowed
                                                                IP</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value={{ $tabledata->ALLOWED_IP_ADDRESS }}
                                                                    name="ALLOWED_IP_ADDRESS" id="ALLOWED_IP_ADDRESS"
                                                                    placeholder="Allowed IPs">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="USER_TYPE_SNO" class="form-label">User
                                                                Type</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class='bx bx-pin'></i></span>
                                                                <input type="text" class="form-control"
                                                                    value={{ $tabledata->USER_TYPE_SNO }}
                                                                    name="USER_TYPE_SNO" id="USER_TYPE_SNO"
                                                                    placeholder="User Type">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="ACCESS_TYPE" class="form-label">Access
                                                                Type</label>
                                                            <div class="input-group">
                                                                <input name="ACCESS_TYPE" type="text"
                                                                    class="form-control"
                                                                    value={{ $tabledata->ACCESS_TYPE }} id="ACCESS_TYPE"
                                                                    placeholder="Access Type">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="SCAN_PATH" class="form-label">Scan Path</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ old('SCAN_PATH', $tabledata->SCAN_PATH) }}"
                                                                    id="SCAN_PATH" name="SCAN_PATH"
                                                                    placeholder="Scan Path">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="SAVE_PATH" class="form-label">Save Path</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ old('SAVE_PATH', $tabledata->SAVE_PATH) }}"
                                                                    id="SAVE_PATH" name="SAVE_PATH"
                                                                    placeholder="Save Path">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="REMARKS" class="form-label">Remarks</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value={{ $tabledata->REMARKS }} id="REMARKS"
                                                                    name="REMARKS" placeholder="Remarks">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>





                                    </div>
                                    {{-- // End primaryhome --}}

                                    <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">

                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
