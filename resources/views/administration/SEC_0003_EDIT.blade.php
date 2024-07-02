@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">User</h5>
            <form class="row g-3" action="/sec/SEC_0003_EDIT/update" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="USER_ID" value="{{ $tabledata->USER_ID }}">
                <div class="col-md-12">
                    <label for="first_name" class="form-label">First Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-user'></i></span>
                        <input type="text" maxlength="15" value={{ $tabledata->FIRST_NAME }} class="form-control"
                            id="first_name" name="FIRST_NAME" placeholder="First Name">
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="LAST_NAME" class="form-label">Last Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-user'></i></span>
                        <input type="text" maxlength="15" value={{ $tabledata->LAST_NAME }} class="form-control"
                            name="LAST_NAME" placeholder="Last Name">
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="EMAIL" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-envelope'></i></span>
                        <input type="text" name="EMAIL" id="EMAIL" value={{ $tabledata->EMAIL }} class="form-control" id="input27"
                            placeholder="Email">
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="PASSWORDD" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-lock-alt'></i></span>
                        <input name="PASSWORDD" type="password" value={{ $tabledata->PASSWORDD }} class="form-control" id="PASSWORDD"
                            placeholder="Password">
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="DOB" class="form-label">DOB</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-calendar'></i></span>
                        <input name="DOB" type="date" value={{ $tabledata->DOB }} class="form-control" id="DOB"
                            max={{ now() }}>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="GENDER_SNO" class="form-label">Gender</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-flag'></i></span>
                        <select class="form-select" id="GENDER_SNO" name="GENDER_SNO">
                            {{-- <option selected>Open this select menu</option> --}}
                            @foreach ($erppoplists['genderlov'] as $key => $record)
                                <option value={{ $record->GENDER_SNO }}
                                    {{ $record->GENDER_SNO == $tabledata->GENDER_SNO ? 'selected' : '' }}>
                                    {{ $record->GENDER_DESCRIPTION }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="MOBILE_NO" class="form-label">Mobile No</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-pin'></i></span>
                        <input type="text" class="form-control" value={{ $tabledata->MOBILE_NO }} id="MOBILE_NO" name="MOBILE_NO"
                            placeholder="Mobile">
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="PHONE_NO" class="form-label">Phone No</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-pin'></i></span>
                        <input type="text" class="form-control" value={{ $tabledata->PHONE_NO }} id="phone_no" name="PHONE_NO"
                            placeholder="Phone">
                    </div>
                </div>


                <div class="col-md-12">
                    <label for="CNIC_NO" class="form-label">CNIC No</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-pin'></i></span>
                        <input type="number" class="form-control" value={{ $tabledata->CNIC_NO }} id="CNIC_NO" name="CNIC_NO"
                            placeholder="CNIC No">
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="IS_LOCK" class="form-label">Lock</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-pin'></i></span>
                        <input type="text" class="form-control" value={{ $tabledata->IS_LOCK }} id="IS_LOCK" name="IS_LOCK"
                            placeholder="Lock">
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="LOCK_DATE" class="form-label">Lock Date</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-pin'></i></span>
                        <input type="date" class="form-control" value={{ $tabledata->LOCK_DATE }} id="LOCK_DATE" name="LOCK_DATE"
                            placeholder="Lock Date">
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="IS_EXPIRED" class="form-label">Expired</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-pin'></i></span>
                        <input name="IS_EXPIRED" type="text" class="form-control" value={{ $tabledata->IS_EXPIRED }} id="IS_EXPIRED"
                            placeholder="Expired">
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="EXPIRY_DATE" class="form-label">Expiry Date</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-pin'></i></span>
                        <input name="EXPIRY_DATE" type="date" class="form-control" value={{ $tabledata->EXPIRY_DATE }} id="EXPIRY_DATE"
                            placeholder="Lock Date">
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="LAST_LOGIN_DATE" class="form-label">Last Login Date</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-pin'></i></span>
                        <input value="LAST_LOGIN_DATE" type="date" readonly class="form-control" value={{ $tabledata->LAST_LOGIN_DATE }}
                            id="LAST_LOGIN_DATE" placeholder="Last Login Date">
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="COUNTRY_SNO" class="form-label">Country</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-flag'></i></span>
                        <select class="form-select" id="COUNTRY_SNO" name="COUNTRY_SNO">
                            {{-- <option selected>Open this select menu</option> --}}
                            @foreach ($erppoplists['countrylov'] as $key => $record)
                                <option value={{ $record->COUNTRYCODE }}
                                    {{ $record->COUNTRYCODE == $tabledata->COUNTRY_SNO ? 'selected' : '' }}>
                                    {{ $record->COUNTRYNAME }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="CITY_SNO" class="form-label">City</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-buildings'></i></span>
                        <input name="CITY_SNO" type="text" class="form-control" id="input32" placeholder="City">
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="ALLOWED_IP_ADDRESS" class="form-label">Allowed IP</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-pin'></i></span>
                        <input type="text" class="form-control" value={{ $tabledata->ALLOWED_IP_ADDRESS }}
                            name="ALLOWED_IP_ADDRESS" id="ALLOWED_IP_ADDRESS" placeholder="Allowed IPs">
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="USER_TYPE_SNO" class="form-label">User Type</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-pin'></i></span>
                        <input type="text" class="form-control" value={{ $tabledata->USER_TYPE_SNO }}
                            name="USER_TYPE_SNO" id="USER_TYPE_SNO" placeholder="User Type">
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="ACCESS_TYPE" class="form-label">Access Type</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-pin'></i></span>
                        <input type="text" class="form-control" value={{ $tabledata->ACCESS_TYPE }} id="ACCESS_TYPE"
                            placeholder="Access Type">
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="REMARKS" class="form-label">Remarks</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-pin'></i></span>
                        <input value="REMARKS" type="text" class="form-control" value={{ $tabledata->REMARKS }} id="REMARKS" value="REMARKS"
                            placeholder="Remarks">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4">Save</button>
                        <button type="button" class="btn btn-light px-4">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
