@php
  $class ??= null;
@endphp

<div @class([
  "form-check form-switch",
  $class,
])>
  <input type="hidden" name="{{ $name }}" id="{{ $name }}" value="0">
  <input type="checkbox" name="{{ $name }}" id="{{ $name }}" class="form-check-input @error($name) is-invalid @enderror" role="switch" value="1" @checked(old($name, $value ?? false)) id="{{ $name }}">
  <label for="{{ $name }}" class="form-check-label">{{ $label }}</label>
  @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>
