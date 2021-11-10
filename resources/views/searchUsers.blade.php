<div class="col-lg-12 col-md-12" style="padding-top: 20px;">
    <div class="card">
        <div class="card-body">
            <form method="Post"  action="{{ url('user/searchUsers') }}" novalidate>
                @csrf
                <input name="__RequestVerificationToken" type="hidden"
                    value="CfDJ8MLwQWxgY8BJosaUQFmdheAJnS5exHRf9bKq3LM8bNRzWa036b1rgGUVUtkt9lLtdOWpHHwHzPnF-Os6JecE-KtGkDGHiTDA-M6grWSyNPa1h77TVyRkvZPWbJwqoqkF8gtJzCpc-nnejIeS3L-X7CA" />
                <div class="form-group">
                    <label for="StudentSearchViewModel_Search"><strong>Search Student</strong></label>
                    <input type="text" placeholder="Enter Student's Surname e.g. Ade" class="form-control"
                        data-val="true" data-val-required="Search field is required."
                        id="StudentSearchViewModel_Search" name="question"  />
                    <span class="has-error text-danger field-validation-valid"
                        data-valmsg-for="StudentSearchViewModel.Search" data-valmsg-replace="true"></span>
                </div>
                <div class="form-group">
                    <button id="search-btn" class="btn btn-primary btn-sm pull-right">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>