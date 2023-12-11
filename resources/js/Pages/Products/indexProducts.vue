<script setup>
import BaseButton from '@/Components/BaseButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, router, useForm, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const table = computed( () => usePage().props.table );

const showModal = ref(false);
const selectedID = ref(null);
const selectedDescription = ref(null);
const toggleModal = (id, description) => {
    selectedID.value = id;
    selectedDescription.value = description;
    showModal.value = !showModal.value;
}

const formDelete = useForm({});
const destroy = () => {
    formDelete.delete(route('products.destroy', selectedID.value), {
        preserveScroll: true,
        onSuccess: () => showModal.value = !showModal.value,
        onError: () => {},
    });
};

const searchText = ref('');
const search = () => {
    router.get(route('products.index', {'buscar': searchText.value}));
};
</script>

<template>
    <Head title="Produtos" />

    <MainLayout>
        <template #header>
            <h2>Lista de Produtos</h2>
            <BaseButton route-name="products.create" label="+ Produto" color="blue" small />
        </template>
        <template #search>
            <form @submit.prevent="search" class="flex items-center justify-center w-full">
                <TextInput
                    id="search"
                    ref="searchInput"
                    v-model="searchText"
                    type="text"
                    class="block w-full"
                    placeholder="Digite a descrição, preço e/ou marca do produto"
                />
                <BaseButton label="Pesquisar" type="submit" color="black" />
            </form>
        </template>
        <div v-if="table.data.length">
            <table>
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Cor</th>
                        <th>Peso</th>
                        <th>Marca</th>
                        <th width="40px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in table.data" :key="item.id">
                        <td>{{ item.dsProduct }}</td>
                        <td><div class="whitespace-nowrap">R$ {{ item.price.toFixed(2) }}</div></td>
                        <td><div v-bind:style="{ backgroundColor: item.color}" style="width:100%; height:30px;"></div></td>
                        <td>{{ item.weight }}</td>
                        <td>{{ item.manufacturer.dsManufacturer }}</td>
                        <td>
                            <div class="inline-flex self-stretch">
                                <BaseButton :href="route('products.show', item.id)" label="Ver" color="gray" small />
                                <BaseButton :href="route('products.edit', item.id)" label="Editar" color="green" small />
                                <BaseButton @click="toggleModal(item.id, item.dsProduct)" label="Deletar" color="red" small />
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <nav class="pagination" aria-label="Table navigation">
                <span class="pagination-showing">Exibindo <span class="font-semibold text-gray-900 dark:text-white">{{ table.from }}-{{ table.to }}</span> de <span class="font-semibold text-gray-900">{{ table.total }}</span> registros</span>
                <ul>
                    <li v-for="link in table.links" :key="link.id">
                        <a v-if="link.active" :href=link.url aria-current="page" class="pagination-buttons text-blue-600 bg-blue-50 hover:bg-blue-100 hover:text-blue-700" v-html="link.label"></a>
                        <a v-else :href=link.url class="pagination-buttons ms-0 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700" v-html="link.label"></a>
                    </li>
                </ul>
            </nav>
        </div>
        <div v-else class="flex justify-center text-gray-500"> Nenhum registro encontrado</div>
    </MainLayout>

    <Modal :show="showModal">
        <!--content-->
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Deseja deletar o registro selecionado?
            </h2>

            <p class="mt-3 text-sm text-gray-600">
                Selecionado: <b>{{ selectedDescription }}</b>
            </p>

            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="toggleModal"> Cancelar </SecondaryButton>

                <DangerButton
                    class="ms-3"
                    :class="{ 'opacity-25': formDelete.processing }"
                    :disabled="formDelete.processing"
                    @click="destroy"
                >
                    Deletar
                </DangerButton>
            </div>
        </div>
    </Modal>    
</template>
