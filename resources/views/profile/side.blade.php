<!-- twitter link input -->
@isset($socials->twitter)
<div class="col-12 col-sm-6">
    <div class="form-group">
        <label for="account-twitter">Twitter</label>
        <input type="text" id="account-twitter" class="form-control" placeholder="Add link" name="twitter" value="{{ $socials->twitter }}" />
    </div>
</div>
@endisset

<!-- facebook link input -->
@isset($socials->facebook)
<div class="col-12 col-sm-6">
    <div class="form-group">
        <label for="account-facebook">Facebook</label>
        <input type="text" id="account-facebook" class="form-control" name="facebook" value="{{ $socials->facebook }}" placeholder="Add link" />
    </div>
</div>
@endisset

<!-- linkedin link input -->
@isset($socials->linkedin)
<div class="col-12 col-sm-6">
    <div class="form-group">
        <label for="account-linkedin">LinkedIn</label>
        <input type="text" id="account-linkedin" class="form-control" name="linkedin" placeholder="Add link" value="{{ $socials->linkedin }}" />
    </div>
</div>
@endisset

<!-- instagram link input -->
@isset($socials->instagram)
<div class="col-12 col-sm-6">
    <div class="form-group">
        <label for="account-instagram">Instagram</label>
        <input type="text" id="account-instagram" class="form-control" name="instagram" value="{{ $socials->instagram }}" placeholder="Add link" />
    </div>
</div>
@endisset

<!-- Quora link input -->
@isset($socials->quora)
<div class="col-12 col-sm-6">
    <div class="form-group">
        <label for="account-quora">Quora</label>
        <input type="text" id="account-quora" class="form-control" name="quora" value="{{ $socials->quora }}" placeholder="Add link" />
    </div>
</div>
@endisset