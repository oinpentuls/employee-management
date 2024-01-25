<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    uuid: String
})
</script>

<template>
    <Head title="Departments Detail" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Department Details
            </h2>
        </template>

        <div class="py-12 flex flex-col gap-2 max-w-3xl mx-auto">
            <div class="max-w-3xl sm:px-6 lg:px-8 cursor-pointer">
                <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="flex justify-between p-6 text-gray-900">
                        <div class="flex flex-col gap-4">
                            <p>Department Name</p>
                            <small class="text-gray-400">Description</small>
                        </div>

                        <p>{{ uuid }}</p>

                        <div class="flex flex-col gap-4">
                            <p>80 peoples</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
