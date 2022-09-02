<script setup>
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import MedizonaAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { DocumentPlusIcon, DocumentMinusIcon, PencilSquareIcon, EyeIcon } from '@heroicons/vue/24/outline'
    import moment from 'moment'
    import { PaperClipIcon } from '@heroicons/vue/20/solid'

    defineProps({
        canLogin: Boolean,
        canRegister: Boolean,
        customers: {
            type: Object,
            default: () => ({}),
        },
        items: {
            type: Object,
            default: () => ({}),
        },
    });
    const form = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        terms: false,
    });

    const submit = () => {
        form.post(route('note.store'), {
            onFinish: () => form.reset('password', 'password_confirmation'),
        });
    };
</script>
    
<template>
    <Head title="Create Sales Notes" />
    <MedizonaAuthenticatedLayout>
        <template #header>Create Sales Note</template>
        <template #main>
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <form class="mt-8 space-y-6" @submit.prevent="submit">
                    <div class="-space-y-px rounded-md shadow-sm">
                        <div>
                            <MedizonaLabel class="sr-only" for="name" value="Name" />
                            <MedizonaInput id="name" type="text" class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" v-model="form.name" required autofocus autocomplete="name" placeholder="Name"/>
                            <MedizonaInputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <div>
                            <MedizonaLabel class="sr-only" for="email" value="Email" />
                            <MedizonaInput id="email" type="email" class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" v-model="form.email" required autocomplete="username" placeholder="Email address"/>
                            <MedizonaInputError class="mt-2" :message="form.errors.email" />
                        </div>
                    </div>
                    <div class="-space-y-px rounded-md shadow-sm">
                        <div>
                            <MedizonaLabel class="sr-only" for="password" value="password" />
                            <MedizonaInput id="password" type="password" class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" v-model="form.password" required autocomplete="new-password" placeholder="Password"/>
                            <MedizonaInputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div>
                            <MedizonaLabel class="sr-only" for="password_confirmation" value="Confirm Password" />
                            <MedizonaInput id="password_confirmation" type="password" class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" v-model="form.password_confirmation" required autocomplete="new-password" placeholder="Confirm password"/>
                            <MedizonaInputError class="mt-2" :message="form.errors.password_confirmation" />
                        </div>
                    </div>
                    <div>
                        <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Already registered?
                        </Link>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <MedizonaButton class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Register
                        </MedizonaButton>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <Link :href="route('notes.index')" class="group relative flex w-full justify-center font-medium text-indigo-600 hover:text-indigo-500">
                            Cancel
                        </Link>
                    </div>
                </form>
            </div>
        </template>
    </MedizonaAuthenticatedLayout>
</template>
