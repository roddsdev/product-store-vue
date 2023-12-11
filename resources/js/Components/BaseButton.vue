<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
  label: {
    type: [String, Number],
    default: null,
  },
  href: {
    type: String,
    default: null,
  },
  target: {
    type: String,
    default: null,
  },
  routeName: {
    type: String,
    default: null,
  },
  type: {
    type: String,
    default: null,
  },
  color: {
    type: String,
    default: "white",
  },
  as: {
    type: String,
    default: null,
  },
  small: Boolean,
  disabled: Boolean,
  roundedFull: Boolean,
});

const is = computed(() => {
  if (props.as) return props.as;
  if (props.routeName) return Link;
  if (props.href) return Link;

  return "button";
});

const twColor = computed(() => {
  let color = "";

  switch(props.color) {
    case "green":
        color = "bg-green-600";
        break;
    case "blue":
        color = "bg-blue-600";
        break;
    case "yellow":
        color = "bg-yellow-600";
        break;
    case "red":
        color = "bg-red-600";
        break;
    case "gray":
        color = "bg-gray-400";
        break;
    case "black":
        color = "bg-gray-900";
        break;
    default:
        color = "bg-white";
  }

  return color;
});

const computedType = computed(() => {
  if (is.value === "button") return props.type ?? "button";

  return null;
});

const labelClass = computed(() => {
  const base = [
    "px-2",
    props.color != "white" ? "text-white" : "text-gray-900"
  ]

  return base;
});

const componentClass = computed(() => {
  const base = [
    "inline-flex",
    "justify-center",
    "items-center",
    "whitespace-nowrap",
    "focus:outline-none",
    "transition-colors",
    "focus:ring",
    "duration-150",
    "border",
    twColor.value,
    props.disabled ? "cursor-not-allowed" : "cursor-pointer",
    props.roundedFull ? "rounded-full" : "rounded",
  ];

  if (props.small) {
    base.push("text-sm", props.roundedFull ? "px-3 py-1" : "p-1");
  } else {
    base.push("py-2", props.roundedFull ? "px-6" : "px-3");
  }

  return base;
});
</script>

<template>
  <component
    :is="is"
    :class="componentClass"
    :href="routeName ? route(routeName) : href"
    :type="computedType"
    :target="target"
    :disabled="disabled"
  >
    <span v-if="label" :class="labelClass">{{ label }}</span>
  </component>
</template>
