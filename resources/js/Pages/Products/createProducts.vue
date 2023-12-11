<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import ColorInput from '@/Components/ColorInput.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import Multiselect from '@vueform/multiselect'
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const categories = usePage().props.aggregateData.categories;
const manufacturers = usePage().props.aggregateData.manufacturers;
const categoriesOpt = categories.map(category => ({ value: category.id, label: category.dsCategory }));

const form = useForm({
    dsProduct: '',
    price: '',
    color: '#FFFFFF',
    weight: '',
    manufacturer_id: '',
    categories: []
});

const store = () => {
    form.post(route('products.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            // if (form.errors.password) {
            //     form.reset('password', 'password_confirmation');
            //     passwordInput.value.focus();
            // }
        },
    });
};

const inputElClass = computed(() => {
  const base = {          
    container: 'relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded-md bg-white text-base leading-snug',
    containerActive: 'max-w-full ring-1 ring-indigo-500 ring-opacity-30 border-solid border-2 border-indigo-500 focus:outline-none w-full',
    tagsSearch: 'bg-white absolute inset-0 border-0 outline-none focus:ring-0 appearance-none p-0 text-base font-sans box-border w-full',
    placeholder: 'flex items-center h-full absolute left-0 top-0 pointer-events-none leading-snug pl-3.5 text-gray-700 rtl:left-auto rtl:right-0 rtl:pl-0 rtl:pr-3.5',
    noOptions: 'py-2 px-3 text-gray-400 text-left',
    noResults: 'py-2 px-3 text-gray-400 text-left',
    tag: 'bg-blue-500 text-white text-sm font-semibold py-0.5 pl-2 rounded mr-1 mb-1 flex items-center whitespace-nowrap min-w-0 rtl:pl-0 rtl:pr-2 rtl:mr-0 rtl:ml-1',
  }

  return base;
});

const previousUrl = computed( () => {
    return window.history.back();
})
</script>

<template>
    <Head title="Cadastrar produto" />
    
    <MainLayout>
        <template #header>
            <h2>Cadastrar produto</h2>
        </template>
        <section>
            <form @submit.prevent="store" class="space-y-6">
                <div>
                    <InputLabel for="dsProduct" value="Descrição" />

                    <TextInput
                        id="dsProduct"
                        ref="dsProductInput"
                        v-model="form.dsProduct"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="ds-product"
                    />

                    <InputError :message="form.errors.dsProduct" class="mt-2" />
                </div>

                <div>
                    <InputLabel for="price" value="Preço" />

                    <TextInput
                        id="price"
                        ref="priceInput"
                        v-model="form.price"
                        type="number"
                        class="mt-1 block w-full"
                        autocomplete="price"
                    />

                    <InputError :message="form.errors.price" class="mt-2" />
                </div>
                
                <div>
                    <InputLabel for="color" value="Cor" />

                    <ColorInput
                        id="color"
                        ref="colorInput"
                        v-model="form.color"
                        class="mt-1 block"
                        autocomplete="color"
                    />

                    <InputError :message="form.errors.color" class="mt-2" />
                </div>
                
                <div>
                    <InputLabel for="weight" value="Peso" />

                    <TextInput
                        id="weight"
                        ref="weightInput"
                        v-model="form.weight"
                        type="number"
                        class="mt-1 block w-full"
                        autocomplete="weight"
                    />

                    <InputError :message="form.errors.weight" class="mt-2" />
                </div>
                
                <div>
                    <InputLabel for="manufacturer_id" value="Marca" />

                    <select name="manufacturer_id" v-model="form.manufacturer_id" placeholder="Selecione uma opção">
                        <option value="">Selecione uma opção</option>
                        <option v-for="manufacturer in manufacturers" :value="manufacturer.id">{{ manufacturer.dsManufacturer }}</option>
                    </select>

                    <InputError :message="form.errors.manufacturer_id" class="mt-2" />
                </div>
                
                <div>
                    <InputLabel for="categories" value="Categorias" />

                    <Multiselect 
                        v-model="form.categories"
                        :options="categoriesOpt"
                        placeholder="Escolha uma ou mais opções"
                        mode="tags"
                        searchable
                        :classes="inputElClass"
                        openDirection="top"
                        :searchable="true"
                        />

                    <InputError :message="form.errors.categories" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                    <PrimaryButton :disabled="form.processing">Adicionar</PrimaryButton>

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

<style src="@vueform/multiselect/themes/default.css"></style>