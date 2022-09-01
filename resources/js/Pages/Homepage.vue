<script setup>
import MedizonaGuestLayout from '@/Layouts/Guest.vue';
import Navigation from '@/Components/Navigation.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
})
</script>

<template>
    <MedizonaGuestLayout>
        <div class="lg:h-screen mx-auto max-w-7xl">
            <div class="relative z-10 bg-white pb-20 sm:pb-16 md:pb-20 lg:w-full lg:max-w-2xl lg:pb-28 xl:pb-32">
                <Navigation :canLogin="canLogin" :canRegister="canRegister"/>
                <main class="lg:h-screen mx-auto mt-20 max-w-7xl px-4 sm:mt-30 sm:px-6 md:mt-26 lg:mt-30 lg:px-8 xl:mt-48">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl md:text-6xl"><span class="block xl:inline">Code </span><span class="block text-indigo-600 xl:inline">Challenge</span></h1>
                        <p class="mt-3 text-base text-gray-500 sm:mx-auto sm:mt-5 sm:max-w-xl sm:text-lg md:mt-5 md:text-xl lg:mx-0">It’s not a bug, it’s a undocumented feature.</p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a :href="route('dashboard')" class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 md:py-4 md:px-10 md:text-lg">Live Demo</a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="h-300 lg:h-screen sm:w-full lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-50 w-full object-cover sm:h-72 md:h-96 lg:h-full lg:w-full" src="YoMedRobot.jpg" alt="" />
        </div>
    </MedizonaGuestLayout>
</template>
