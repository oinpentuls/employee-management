<script lang="ts" setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

type Department = {
    uuid: String
    name: String
    description: String
}

type Response = {
    data: Department,
}

defineProps<({
    department: Response
})>()
</script>

<template>
    <Head title="Departments Detail" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <div class="flex justify-between content-center">
                    <p>
                        Department Detail
                    </p>

                    <Link as="button" :href="route('departments.edit', { uuid: department.data.uuid })"
                        class="text-sm bg-blue-300 text-white p-2 rounded-md">
                    Edit Department
                    </Link>
                </div>
            </h2>
        </template>

        <div class="py-12 flex flex-col gap-2 max-w-3xl mx-auto">
            <div class="max-w-3xl sm:px-6 lg:px-8 cursor-pointer">
                <div v-if="department.data == undefined">There is no data for this department</div>
                <div v-else class="bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="flex justify-between p-6 text-gray-900">
                        <div class="flex flex-col gap-4">
                            <p>{{ department.data.name }}</p>
                            <small class="text-gray-400">{{ department.data.description }}</small>
                        </div>

                        <div class="flex flex-col gap-4">
                            <p>80 peoples</p>

                            <!-- <Link as="button" :href="route('departments.remove', { uuid: department.data.uuid })"
                                class="text-sm bg-red-500 py-1 text-white rounded-md">
                            Remove department ?
                            </Link> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
