@props(['value', 'is_required' => false])

@if($is_required === false)
<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>

@else
<div class="block">
    <label {{ $attributes->merge(['class' => 'inline-block font-medium text-sm text-gray-700']) }}>
        {{ $value ?? $slot }}
    </label>
    <span class="required">*</span>
</div>
@endif
