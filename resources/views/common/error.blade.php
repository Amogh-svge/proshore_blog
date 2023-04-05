@error($value)
    <span class="error-message"> <small>{{ $errors->first($value) }}</small></span>
@enderror
