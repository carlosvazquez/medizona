<script setup>
import { ref, onMounted } from 'vue';

import Navigation from '@/Components/Navigation.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
})

const showingNavigationDropdown = ref(false);

onMounted(() => {
    console.log('onMounted');
});
</script>

<template>
    <div class="relative overflow-hidden bg-white">
        <div class="lg:mx-auto max-w-7xl">
            <div class="relative z-10 bg-white pb-2 sm:pb-16 md:pb-20 lg:w-full lg:max-w-2xl lg:pb-3 xl:pb-4">
                <Navigation :canLogin="false" :canRegister="false"/>
            </div>
        </div>
        <slot />
    </div>
    <div class="lg:mx-auto max-w-7xl px-6 sm:px-6 lg:px-8">
        <div
            v-if="$page.props.flash.message"
            class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
            role="alert"
        >
        <span class="font-medium">{{ $page.props.flash.message }}</span>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-6 bg-white border-b border-gray-200">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight"><slot name="header" /></h2>
            </div>
        </div>
    </div>
    <div class="lg:mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <slot name="main" />
    </div>
</template>
