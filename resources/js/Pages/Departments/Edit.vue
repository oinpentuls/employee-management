<script lang="ts" setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router, useForm } from '@inertiajs/vue3';

type Department = {
    name: String
    description: String

}

const form = useForm<Department>({
    name: "",
    description: ""
})

const submit = () => {
    form.post(route('departments.store'), {
        onFinish: () => form.reset()
    })
}
</script>

<template>
    <Head title="Edit Department" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <div class="flex justify-between content-center">
                    <p>
                        Edit Department
                    </p>
                </div>
            </h2>
        </template>

        <div class="py-12 flex flex-col flex-wrap gap-2 justify-center content-center">
            <form @submit.prevent="submit" class="w-full max-w-3xl sm:px-6 lg:px-8">
                <div class="flex flex-col flex-wrap justify-center content-center gap-5">
                    <div class="w-full">
                        <InputLabel for="department-name" value="Name" required />
                        <TextInput id="department-name" type="text" class="block w-full max-w-xl" v-model="form.name"
                            required aria-required="true" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="w-full">
                        <InputLabel for="department-description" value="Description" />
                        <TextInput id="department-description" type="text" class="block w-full max-w-xl"
                            v-model="form.description" />
                        <InputError class="mt-2" :message="form.errors.description" />
                    </div>

                    <PrimaryButton class="max-w-xl text-center" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Update</PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
