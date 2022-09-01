<script setup>
import MedizonaButton from '@/Components/Button.vue';
import MedizonaGuestLayout from '@/Layouts/Guest.vue';
import MedizonaInput from '@/Components/Input.vue';
import MedizonaInputError from '@/Components/InputError.vue';
import MedizonaLabel from '@/Components/Label.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <MedizonaGuestLayout>
        <Head title="Reset Password" />

        <form @submit.prevent="submit">
            <div>
                <MedizonaLabel for="email" value="Email" />
                <MedizonaInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
                <MedizonaInputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <MedizonaLabel for="password" value="Password" />
                <MedizonaInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                <MedizonaInputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <MedizonaLabel for="password_confirmation" value="Confirm Password" />
                <MedizonaInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                <MedizonaInputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <MedizonaButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Reset Password
                </MedizonaButton>
            </div>
        </form>
    </MedizonaGuestLayout>
</template>
