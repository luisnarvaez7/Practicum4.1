
<div class="mb-4" x-data="{ localValue: @entangle($attributes->wire('model')) }">
  <label class="block text-sm font-medium mb-1" :for="$props.id">{{ $props.label }}</label>
  <select
    :id="$props.id"
    x-model="localValue"
    @change="$dispatch('input', localValue)"
    :class="[
      'block w-full border rounded px-3 py-2',
      $props.error ? 'border-red-500' : 'border-gray-300'
    ]"
  >
    <option value="" disabled>{{ $props.placeholder }}</option>
    <template x-for="option in $props.options" :key="option.id">
      <option :value="option.id" x-text="option.name"></option>
    </template>
  </select>
  <p x-show="$props.error" class="text-red-500 text-sm mt-1" x-text="$props.error"></p>
</div>
