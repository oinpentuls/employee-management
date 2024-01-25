<script lang="ts" setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

type Department = {
    uuid: String
    name: String
    description: String
}

type Response = {
    data: Department[],
}

defineProps<({
    departments: Response
})>()
</script>

<template>
    <Head title="Department" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <div class="flex justify-between content-center">
                    <p>
                        Department
                    </p>

                    <Link as="button" :href="route('departments.add')"
                        class="text-sm bg-blue-300 text-white p-2 rounded-md">
                    Add Department
                    </Link>
                </div>
            </h2>
        </template>

        <div class="py-12 flex flex-col gap-2 max-w-3xl mx-auto">
            <div v-if="departments.data.length <= 0" class="h3">There is no department. Create one <button
                    class="">create</button></div>

            <div v-else v-for="department in departments.data" class="max-w-3xl sm:px-6 lg:px-8 cursor-pointer">
                <div class="bg-white overflow-hidden shadow sm:rounded-lg">

                    <Link :href="route('departments.show', { uuid: department.uuid })">
                    <div class="flex justify-between p-6 text-gray-900">
                        <div class="flex flex-col gap-4">
                            <p>{{ department.name }}</p>
                            <small class="text-gray-400">{{ department.description }}</small>
                        </div>

                        <div class="flex flex-col gap-4">
                            <p>{{ 80 }} peoples</p>
                        </div>
                    </div>
                    </Link>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
