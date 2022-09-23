@props(['label', 'name', 'value', 'placeholder' => '', 'type' => 'text'])

<div class="mb-3">
  <label for="setting-input-2" class="form-label">{{ $label }}</label>
  <input 
    type="{{ $type }}" 
    name="{{ $name }}"
    class="form-control  
      @error('name')
        is-invalid
      @enderror" 
    id="setting-input-2" 
    placeholder="{{ $placeholder }}"  
    value="{{ old($name, $value ?? null) }}"  
  >
  @error($name)
    <div class="mt-1">
      <small>
        <i><b class="text-danger">{{ $message }}</b></i>
      </small>
    </div>
  @enderror
</div>