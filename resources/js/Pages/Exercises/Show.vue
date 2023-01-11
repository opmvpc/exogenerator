<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    exercise: {
        type: Array,
        required: true,
    },
    variation: {
        type: Array,
        required: true,
    },
    studentResults: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Exercises
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"></div>
        </div>
    </AppLayout>
</template>
