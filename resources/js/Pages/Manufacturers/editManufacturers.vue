<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const data = usePage().props.manufacturer;

const form = useForm({
    dsManufacturer: data.dsManufacturer,
});

const store = () => {
    form.put(route('manufacturers.update', data.id), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {},
    });
};

const previousUrl = computed( () => {
    return window.history.back();
})
</script>

<template>
    <Head title="Editar marca" />
    
    <MainLayout>
        <template #header>
            <h2>Editar marca</h2>
        </template>
        <section>
            <form @submit.prevent="store" class="space-y-6">
                <div>
                    <InputLabel for="dsManufacturer" value="Descrição" />

                    <TextInput
                        id="dsManufacturer"
                        ref="dsManufacturerInput"
                        v-model="form.dsManufacturer"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="ds-product"
                    />

                    <InputError :message="form.errors.dsManufacturer" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                    <PrimaryButton :disabled="form.processing">Editar</PrimaryButton>

                    <Transition
                        enter-active-class="transition ease-in-out"
                        enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out"
                        leave-to-class="opacity-0"
                    >
                        <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                    </Transition>
                    <button @click="previousUrl" class="btn btn-secondary">Voltar</button> 
                </div>
            </form>
        </section>
    </MainLayout>
</template>