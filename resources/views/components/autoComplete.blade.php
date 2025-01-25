<template>
    <div class="mb-4">
      <label class="block text-sm font-medium mb-1" :for="id">{{ label }}</label>
      <input
        :id="id"
        type="text"
        v-model="localSearchQuery"
        :placeholder="placeholder"
        :disabled="disabled"
        :class="[
          'block w-full border rounded px-3 py-2',
          error ? 'border-red-500' : 'border-gray-300'
        ]"
      />
      <ul
        v-if="filteredOptions.length"
        class="border border-gray-300 rounded mt-1 max-h-40 overflow-y-auto"
      >
        <li
          v-for="option in filteredOptions"
          :key="option.id"
          @click="selectOption(option)"
          class="px-3 py-2 hover:bg-gray-100 cursor-pointer"
        >
          {{ option.name }}
        </li>
      </ul>
      <p v-if="error" class="text-red-500 text-sm mt-1">{{ error }}</p>
    </div>
  </template>

  <script>
  export default {
    name: "AutoComplete",
    props: {
      label: { type: String, required: true },
      modelValue: [String, Number],
      searchQuery: { type: String, required: true },
      options: { type: Array, required: true },
      error: { type: String, default: "" },
      placeholder: { type: String, default: "Type to search..." },
      disabled: { type: Boolean, default: false },
      id: { type: String, default: () => `autocomplete-${Math.random().toString(36).substr(2, 9)}` }
    },
    computed: {
      localSearchQuery: {
        get() {
          return this.searchQuery;
        },
        set(value) {
          this.$emit("update:searchQuery", value);
        }
      },
      filteredOptions() {
        return this.options.filter((option) =>
          option.name.toLowerCase().includes(this.localSearchQuery.toLowerCase())
        );
      }
    },
    methods: {
      selectOption(option) {
        this.$emit("update:modelValue", option.id);
        this.$emit("update:searchQuery", option.name);
      }
    }
  };
  </script>
