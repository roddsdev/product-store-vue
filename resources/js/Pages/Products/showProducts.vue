<script setup>
import BaseButton from '@/Components/BaseButton.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const product = usePage().props.product;

const previousUrl = computed( () => {
    return window.history.back();
})
</script>

<template>
    <Head title="Sobre o produto" />
    
    <MainLayout>
        <template #header>
            <h2>Sobre o produto</h2>
        </template>
        <section>
            <div>
                <h2>Informações do cadastro</h2>
                <hr>
                <p><b>Descrição:</b> {{ product.dsProduct }}</p>
                <p><b>Preço:</b> R$ {{ product.price }}</p>
                <p><b>Marca:</b> {{ product.manufacturer.dsManufacturer }}</p>
                <p class="inline-flex items-center">
                    <b class="pr-2">Cor:</b> 
                    <div class="color-section"></div>
                </p>
            </div>
            <div>
                <h2>Categorias associadas</h2>
                <hr>
                <p class="category-items" v-for="category in product.categories">{{ category.dsCategory }}</p>
            </div>
            <BaseButton label="Voltar" @click="previousUrl()" as="button" />
        </section>
    </MainLayout>
</template>

<style scoped>
.color-section {
    background-color: v-bind('product.color');
    @apply min-w-[30px] h-5 rounded-md;
}

.category-items {
    @apply pb-1;
}

h2 {
    @apply text-lg font-medium text-gray-900;
}

b {
    @apply text-blue-600;
}

div {
    @apply pb-7;
}

hr {
    @apply pb-3;
}
</style>