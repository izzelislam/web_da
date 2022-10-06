@props(['label', 'name', 'value', 'checked' => null])

<div class="form-check mb-3">
  <input c
    lass="form-check-input" 
    type="checkbox" 
    value="{{ old($name, $value ?? null) }}"
    id="settings-checkbox-3"
    name="{{ $name }}"
  >
  <label class="form-check-label" for="settings-checkbox-3">
      {{ $label }}
  </label>
  @error($name)
    <div class="mt-1">
      <small>
        <i><b class="text-danger">{{ $message }}</b></i>
      </small>
    </div>
  @enderror
</div>