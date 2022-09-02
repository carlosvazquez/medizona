<script setup>
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import { Popover, PopoverButton, PopoverPanel } from '@headlessui/vue'
    import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'

    const props = defineProps(['canLogin', 'canRegister']);

</script>
<template>
    <svg class="absolute inset-y-0 right-0 hidden h-full w-48 translate-x-1/2 transform text-white lg:block" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
    <polygon points="50,0 100,0 50,100 0,100" />
    </svg>
    <Popover>
        <div class="relative px-4 pt-6 sm:px-6 lg:px-8">
            <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
                <div class="flex flex-shrink-0 flex-grow items-center lg:flex-grow-0">
                    <div class="flex w-full items-center justify-between md:w-auto">
                    <a style="width:47px;" href="/">
                        <span class="sr-only">Workflow</span>
                        <img alt="Workflow" style="width: 47px;" class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600" />
                    </a>
                    <div class="-mr-2 flex items-center md:hidden">
                        <PopoverButton class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                        </PopoverButton>
                    </div>
                    </div>
                </div>
                <div class="hidden md:ml-10 md:block md:space-x-8 md:pr-4">
                    <template v-if="$page.props.auth.user">
                        <Link :href="route('dashboard')" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>
                        <Link :href="route('notes.index')" class="text-sm text-gray-700 dark:text-gray-500 underline">Sales Notes</Link>
                    </template>
                    <template v-else>
                        <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>
                        <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</Link>
                    </template>
                    <Link v-if="$page.props.auth.user" :href="route('close.logout')" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</Link>
                </div>
            </nav>
        </div>

        <transition enter-active-class="duration-150 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
            <PopoverPanel focus class="absolute inset-x-0 top-0 z-10 origin-top-right transform p-2 transition md:hidden">
            <div class="overflow-hidden rounded-lg bg-white shadow-md ring-1 ring-black ring-opacity-5">
                <div class="flex items-center justify-between px-5 pt-4">
                <div>
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600" alt="" />
                </div>
                <div class="-mr-2">
                    <PopoverButton class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Close main menu</span>
                    <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                    </PopoverButton>
                </div>
                </div>
                <div class="space-y-1 px-2 pt-2 pb-3">
                <a v-for="item in navigation" :key="item.name" :href="item.href" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">{{ item.name }}</a>
                </div>
                <Link :href="route('login')" class="block w-full bg-gray-50 px-5 py-3 text-center font-medium text-indigo-600 hover:bg-gray-100">Log in</Link>
            </div>
            </PopoverPanel>
        </transition>
    </Popover>
</template>
