<script setup>
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import MedizonaAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { TrashIcon, PencilSquareIcon, DocumentPlusIcon } from '@heroicons/vue/24/outline'
    import moment from 'moment'
    import { Inertia } from "@inertiajs/inertia";
    import MedizonaButton from '@/Components/Button.vue';
    import MedizonaCheckbox from '@/Components/Checkbox.vue';
    import MedizonaAuthLayout from '@/Layouts/Auth.vue';
    import MedizonaInput from '@/Components/Input.vue';
    import MedizonaInputError from '@/Components/InputError.vue';
    import MedizonaLabel from '@/Components/Label.vue';


    defineProps({
        canLogin: Boolean,
        canRegister: Boolean,
        notes: {
            type: Object,
            default: () => ({}),
        },
    });
    const form = useForm();

    function destroy(id) {
        if (confirm("Are you sure you want to Delete")) {
            form.delete(route('notes.destroy', id));
        }

        return { destroy }
    }
</script>
    
<template>
    <Head title="Sales Notes" />
    <MedizonaAuthenticatedLayout>
        <template #header>Sales note</template>
        <template #main>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pb-5">
                <div class="pt-6">
                    <table class="w-full table-auto border">
                        <thead>
                        <tr>
                            <th class="font-bold p-2 px-4 border-b text-left">#Note</th>
                            <th class="font-bold p-2 px-4 border-b text-left">Customer</th>
                            <th class="font-bold py-2 px-4 border-b text-center">Qty</th>
                            <th class="font-bold py-2 px-4 border-b text-right">Total</th>
                            <th class="font-bold py-2 px-4 border-b text-left">Date</th>
                            <th class="font-bold py-2 px-4 border-b text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="note in notes">
                            <td class="py-2 px-4 border-b text-left">
                                <Link :href="route('notes.show', note.id)" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ note.id }}</Link>
                            </td>
                            <td class="py-2 px-4 border-b text-left">{{ note.customer.name }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ note.quantity }}</td>
                            <td class="py-2 px-4 border-b text-right">{{ note.money }}</td>
                            <td class="py-2 px-4 border-b text-left">{{ moment(note.date).format('LLL') }}</td>
                            <td class="py-2 px-4 border-b text-right">
                                <MedizonaButton class="group relative flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-2 text-md font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                    @click="destroy(note.id)"
                                >
                                    <span class="flex items-center p-0">
                                        <TrashIcon class="h-5 w-5 text-white group-hover:text-white" aria-hidden="true" />
                                    </span>
                                </MedizonaButton>
                                <MedizonaButton class="group relative flex justify-center ml-1 rounded-md border border-transparent bg-green-600 py-2 px-2 text-md font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                    <span class="flex items-center p-0">
                                        <PencilSquareIcon class="h-5 w-5 text-white group-hover:text-green-400" aria-hidden="true" />
                                    </span>
                                </MedizonaButton>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pb-5">
                <div class="pt-6">
                    <Link :href="route('notes.create')" class="group relative ml-1 rounded-md border border-transparent bg-green-600 py-2 px-2 text-md font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        New Sales Note
                    </Link>
                </div>
            </div>
        </template>
    </MedizonaAuthenticatedLayout>
</template>
