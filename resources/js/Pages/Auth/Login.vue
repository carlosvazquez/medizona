<script setup>
import MedizonaButton from '@/Components/Button.vue';
import MedizonaCheckbox from '@/Components/Checkbox.vue';
import MedizonaAuthLayout from '@/Layouts/Auth.vue';
import MedizonaInput from '@/Components/Input.vue';
import MedizonaInputError from '@/Components/InputError.vue';
import MedizonaLabel from '@/Components/Label.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <MedizonaAuthLayout>
        <Head title="Log in" />
        <div>
            <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600" alt="Workflow" />
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form  class="mt-8 space-y-6" @submit.prevent="submit">
            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <MedizonaLabel class="sr-only" for="email" value="Email" />
                    <MedizonaInput id="email" type="email" class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" v-model="form.email" required autofocus autocomplete="username" placeholder="Email address"/>
                    <MedizonaInputError class="mt-2" :message="form.errors.email" />
                </div>
                <div>
                    <MedizonaLabel class="sr-only" for="password" value="Password" />
                    <MedizonaInput id="password" type="password" class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" v-model="form.password" required autocomplete="current-password" placeholder="Password"/>
                    <MedizonaInputError class="mt-2" :message="form.errors.password" />
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <MedizonaCheckbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </div>
                <div class="text-sm">
                    <Link v-if="canResetPassword" :href="route('password.request')" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</Link>
                </div>
            </div>
            <div>
                <MedizonaButton class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-4 px-4 text-lg font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true" />
                    </span>
                    Sign in
                </MedizonaButton>
            </div>
            <div>
                <Link :href="route('home')" class="group relative flex w-full justify-center font-medium text-indigo-600 hover:text-indigo-500">
                    Cancel
                </Link>
            </div>
        </form>
    </MedizonaAuthLayout>
</template>
