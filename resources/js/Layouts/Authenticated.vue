<script setup>
import { ref } from 'vue';

import Navigation from '@/Components/Navigation.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
})

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="h-screen relative overflow-hidden bg-white">
        <div class="lg:h-screen mx-auto max-w-7xl">
            <div class="relative z-10 bg-white pb-20 sm:pb-16 md:pb-20 lg:w-full lg:max-w-2xl lg:pb-28 xl:pb-32">
                <Navigation :canLogin="false" :canRegister="false"/>
            </div>
        </div>
        <slot />
    </div>
</template>
