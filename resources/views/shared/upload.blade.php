@php
  $class ??= null;
  $multiple ??= false;
@endphp

<div @class([
  "form-group",
  $class,
])>
  <label for="{{ $name }}">{{ $label }}</label>
  <input type="file" name="{{ $name . ($multiple ? '[]' : '') }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" {{ $multiple ? 'multiple' : '' }}>

  @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>
