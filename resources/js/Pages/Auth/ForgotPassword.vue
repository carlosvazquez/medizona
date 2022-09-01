<script setup>
import MedizonaButton from '@/Components/Button.vue';
import MedizonaAuthLayout from '@/Layouts/Auth.vue';
import MedizonaInput from '@/Components/Input.vue';
import MedizonaInputError from '@/Components/InputError.vue';
import MedizonaLabel from '@/Components/Label.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <MedizonaAuthLayout>
        <Head title="Forgot Password" />
        <div>
            <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600" alt="Workflow" />
            <h4 class="mt-6 text-center tracking-tight text-gray-900"><strong>Forgot your password?</strong> No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</h4>
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div class="rounded-md shadow-sm">
                <div>
                    <MedizonaLabel class="sr-only" for="email" value="Email" />
                    <MedizonaInput id="email" type="email" class="relative block w-full appearance-none rounded border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" v-model="form.email" required autofocus autocomplete="username" placeholder="Email address"/>
                    <MedizonaInputError class="mt-2" :message="form.errors.email" />
                </div>
            </div>

            <div>
                <MedizonaButton class="group mt-4 relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Email Password Reset Link
                </MedizonaButton>
            </div>
        </form>
    </MedizonaAuthLayout>
</template>
