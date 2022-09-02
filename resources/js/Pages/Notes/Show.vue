<script setup>
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import MedizonaAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { DocumentPlusIcon, DocumentMinusIcon, PencilSquareIcon, EyeIcon } from '@heroicons/vue/24/outline'
    import moment from 'moment'
    import { PaperClipIcon } from '@heroicons/vue/20/solid'

    defineProps({
        canLogin: Boolean,
        canRegister: Boolean,
        note: {
            type: Object,
            default: () => ({}),
        },
    });
</script>
    
<template>
    <Head title="Sales Notes" />
    <MedizonaAuthenticatedLayout>
        <template #header>Sales Note</template>
        <template #main>
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-6 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">#{{ note.id }}</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Date: {{ moment(note.date).format('LLL') }}</p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Customer name</dt><dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ note.customer.name }}</dd>
                        </div>
                        <div class="bg-white px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Address</dt><dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ note.customer.address }}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">email </dt><dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ note.customer.email }}</dd>
                        </div>
                        <div class="bg-white px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Total</dt><dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ note.money }}</dd>
                        </div>
                    </dl>
                </div>
                <div class="border-t border-gray-200">
                    <div class="bg-gray-50 px-4 pt-6 pb-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Items</h3>
                    </div>
                    <div class="bg-gray-50 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <ul v-for="item in note.items" role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                            <li class="py-3 pl-3 pr-4 text-sm">
                                <div class="">
                                    <strong>{{ item.name }}</strong> <br> SKU: {{ item.sku }} <br>QTY: {{ item.quantity }} <br> Unit Price: {{ item.money }}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </template>
    </MedizonaAuthenticatedLayout>
</template>
