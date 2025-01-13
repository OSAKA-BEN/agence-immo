@php
  $label ??= ucfirst($name);  
  $type ??= 'text';
  $class ??= null;
  $name ??= null;
  $value ??= null;
@endphp

<div @class([
  "form-group",
  $class,
])>
  <label for="{{ $name }}">{{ $label }}</label>
  @if($type === 'textarea')
    <textarea name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror">{{ old($name, $value) }}</textarea>
  @else
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}" class="form-control @error($name) is-invalid @enderror">
  @endif
  @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

