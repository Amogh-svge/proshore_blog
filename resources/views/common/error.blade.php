@error($value)
    <span class="error-message">{{ $errors->first($value) }}</span>
@enderror
