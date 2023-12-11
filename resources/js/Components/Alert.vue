<script setup>
import { computed } from 'vue';

const props = defineProps({
    modelValue: {
        type: Boolean,
        default: false,
    },
    class: {
        type: String,
        required: true,
    },
    msg: {
        type: String,
        required: true,
    }
});

const style = computed( () => {
    let data = []
    if (props.class == "alert-success") {
        data.bgcolor = "bg-green-200";
        data.bordercolor = "border-green-700";
        data.textcolor = "text-green-700";
        data.title = "Tudo certo.";
    }
    if (props.class == "alert-warning") {
        data.bgcolor = "bg-yellow-200";
        data.bordercolor = "border-yellow-700";
        data.textcolor = "text-yellow-700";
        data.title = "Falhou..";
    }
    if (props.class == "alert-danger") {
        data.bgcolor = "bg-red-200";
        data.bordercolor = "border-red-700";
        data.textcolor = "text-red-700";
        data.title = "Erro!";
    }

    return data;
})

const elClass = computed( () => {
    let base = ["border", "px-4", "py-3", "rounded", "relative"];
    base.push(style.value.bgcolor);
    base.push(style.value.bordercolor);
    base.push(style.value.textcolor);

    return base;
})

const emit = defineEmits(["update:modelValue"]);

const closeAlert = () => {
    emit("update:modelValue", !props.modelValue)
}
</script>

<template>
    <div :class="elClass" role="alert" v-if="modelValue">
        <strong class="font-bold">{{ style.title }}</strong>
        <span class="block sm:inline pl-1">{{ msg }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" role="button" @click="closeAlert" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
</template>
