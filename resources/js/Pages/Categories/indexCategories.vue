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
    formDelete.delete(route('categories.destroy', selectedID.value), {
        preserveScroll: true,
        onSuccess: () => showModal.value = !showModal.value,
        onError: () => {},
    });
};

const searchText = ref('');
const search = () => {
    router.get(route('categories.index', {'buscar': searchText.value}));
};
</script>

<template>
    <Head title="Categorias" />

    <MainLayout>
        <template #header>
            <h2>Lista de Categorias</h2>
            <BaseButton route-name="categories.create" label="+ Categoria" color="blue" small />
        </template>
        <template #search>
            <form @submit.prevent="search" class="flex items-center justify-center w-full">
                <TextInput
                    id="search"
                    ref="searchInput"
                    v-model="searchText"
                    type="text"
                    class="block w-full"
                    placeholder="Digite a descrição da categoria"
                />
                <BaseButton label="Pesquisar" type="submit" color="black" />
            </form>
        </template>
        <div v-if="table.data.length">
            <table>
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th width="40px">Ações</th>
                    </tr>
                </thead>
                <tbody v-if="table.data">
                    <tr v-for="item in table.data" :key="item.id">
                        <td>{{ item.dsCategory }}</td>
                        <td>
                            <div class="inline-flex self-stretch">
                                <BaseButton :href="route('categories.show', item.id)" label="Ver" color="gray" small />
                                <BaseButton :href="route('categories.edit', item.id)" label="Editar" color="green" small />
                                <BaseButton @click="toggleModal(item.id, item.dsCategory)" label="Deletar" color="red" small />
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
