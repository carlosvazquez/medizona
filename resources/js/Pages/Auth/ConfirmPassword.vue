<script setup>
import MedizonaButton from '@/Components/Button.vue';
import MedizonaGuestLayout from '@/Layouts/Guest.vue';
import MedizonaInput from '@/Components/Input.vue';
import MedizonaInputError from '@/Components/InputError.vue';
import MedizonaLabel from '@/Components/Label.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    })
};
</script>

<template>
    <MedizonaGuestLayout>
        <Head title="Confirm Password" />

        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <form @submit.prevent="submit">
            <div>
                <MedizonaLabel for="password" value="Password" />
                <MedizonaInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" autofocus />
                <MedizonaInputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex justify-end mt-4">
                <MedizonaButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </MedizonaButton>
            </div>
        </form>
    </MedizonaGuestLayout>
</template>
