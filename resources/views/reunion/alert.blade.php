@if (session('alert'))
<div class="demo-spacing-0 row px-2 mb-2" id="alert-div">
    <div class="col-md-3 col-sm-12"></div>
    <div class="alert alert-success col-md-9 col-sm-12" role="alert">
        <div class="alert-body"><strong>{{ session('alert') }}</strong></div>
    </div>
</div>
@endif

@if (session('error'))
<div class="demo-spacing-0 row px-2 mb-2" id="alert-div">
    <div class="col-md-3 col-sm-12"></div>
    <div class="alert alert-info col-md-9 col-sm-12" role="alert">
        <div class="alert-body"><strong>{{ session('error') }}</strong></div>
    </div>
</div>
@endif