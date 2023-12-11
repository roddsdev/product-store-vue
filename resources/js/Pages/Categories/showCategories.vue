<script setup>
import BaseButton from '@/Components/BaseButton.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const category = computed( () => usePage().props.category )

const previousUrl = computed( () => {
    return window.history.back();
})

const refresh = () => {
    router.reload();
}
</script>

<template>
    <Head title="Sobre a categoria" />
    
    <MainLayout>
        <template #header>
            <h2>Sobre a categoria</h2>
        </template>
        <section>
            <div>
                <h2>Informações do cadastro</h2>
                <hr>
                <p><b>Descrição:</b> {{ category.dsCategory }}</p>
            </div>
            <div>
                <h2>
                    Produtos associados
                    <BaseButton label="Atualizar" @click="refresh()" as="button" small />
                </h2>
                <hr>
                <p class="product-items" v-for="product in category.products">
                    <div class="color-section" v-bind:style="{'background-color': product.color}"></div>
                    <Link :href="route('products.edit', product.id)">{{ product.dsProduct }}</Link>
                </p>
            </div>
            <BaseButton label="Voltar" @click="previousUrl()" as="button" />
        </section>
    </MainLayout>
</template>

<style scoped>
.color-section {
    @apply min-w-[30px] h-5 rounded-md mr-2;
}

.product-items {
    @apply pb-2 inline-flex items-center;
}

h2 {
    @apply flex justify-between items-end text-lg font-medium text-gray-900;
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