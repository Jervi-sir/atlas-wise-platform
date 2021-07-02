<div class="tab-pane fade" id="account-vertical-schedual" role="tabpanel" aria-labelledby="account-pill-schedual" aria-expanded="false">
    <!-- form class="validate-form" -->
    <div class="col-12">
        <div class="d-flex align-items-center mb-2">
            <i data-feather="calendar" class="font-medium-3"></i>
            <h4 class="mb-0 ml-75">Schedual</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <img src="https://drive.google.com/uc?export=view&id={{ Auth()->user()->profile()->first()->schedual_pic }}" alt="">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ route('upload.schedual') }}" >
                        @csrf
                        <div class="row justify-content-between">
                        @if (Auth()->user()->profile()->first()->schedual_pic != NULL)
                            <div class="cold-md-4 pb-1">Update my schedual</div>
                        @else
                            <div class="cold-md-4 pb-1">You haven't uploaded a file yet</div>
                        @endif
                            <div class="form-group col-md-4 px-0">
                                <input type="file" name="image" placeholder="Choose file" id="file">
                            </div>
                            <div class="col-">
                                <button type="submit" class="btn btn-primary" id="submit">Upload</button>
                            </div>
                        </div>     
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ form -->
</div>

