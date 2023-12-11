<script setup>
import { onMounted, computed, ref, watch } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link, usePage } from '@inertiajs/vue3';
import Alert from '@/Components/Alert.vue';

const flashData = computed( () => usePage().props.flash.message );
const showingNavigationDropdown = ref(false);

const showAlert = ref(false);
onMounted( () => {
    if (flashData.value) showAlert.value = true;
})
watch( flashData, () => {
    if (flashData.value) showAlert.value = true;
})
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('products')">
                                    <ApplicationLogo
                                        class="block h-9 w-auto fill-current text-gray-800"
                                    />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink :href="route('products.index')" :active="route().current('products.*')">
                                    Produtos
                                </NavLink>
                                <NavLink :href="route('manufacturers.index')" :active="route().current('manufacturers.*')">
                                    Marcas
                                </NavLink>
                                <NavLink :href="route('categories.index')" :active="route().current('categories.*')">
                                    Categorias
                                </NavLink>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                            >
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('products')" :active="route().current('products')">
                            Produtos
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('products')" :active="route().current('products')">
                            Marcas
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('products')" :active="route().current('products')">
                            Categorias
                        </ResponsiveNavLink>
                    </div>

                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div v-if="showAlert" class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4">
                        <Alert 
                            :class="flashData.class" 
                            :msg="flashData.msg" 
                            v-model="showAlert"
                            />
                    </div>
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <!-- Page search area -->
                            <div v-if="$slots.search" class="p-6 text-gray-900 flex items-center justify-center">
                                <slot name="search" />
                            </div>
                            <div class="shadow-md sm:rounded-lg p-6">
                                <slot />
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>
