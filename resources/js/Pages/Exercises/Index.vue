<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { CheckCircleIcon } from "@heroicons/vue/24/outline";
import { Link } from "@inertiajs/inertia-vue3";
import SectionTitle from "@/Components/SectionTitle.vue";

defineProps({
    chapters: {
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
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <ol>
                    <li v-for="chapter in chapters">
                        <SectionTitle class="mb-4">
                            <template #title>
                                {{ `${chapter.order}. ${chapter.name}` }}
                            </template>
                        </SectionTitle>

                        <ol role="list" class="-mb-8 ml-10">
                            <li
                                v-for="(
                                    exercise, exerciseIdx
                                ) in chapter.exercises"
                                :key="exercise.id"
                            >
                                <div class="relative pb-8">
                                    <span
                                        v-if="
                                            exerciseIdx !==
                                            chapter.exercises.length - 1
                                        "
                                        class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                        aria-hidden="true"
                                    />
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span
                                                class="h-8 w-8 rounded-full flex items-center justify-center ring-8 ring-gray-100 bg-green-500"
                                            >
                                                <component
                                                    :is="CheckCircleIcon"
                                                    class="h-5 w-5 text-white"
                                                    aria-hidden="true"
                                                />
                                            </span>
                                        </div>
                                        <Link
                                            :href="
                                                route(
                                                    'exercises.show',
                                                    exercise.id
                                                )
                                            "
                                            class="font-medium text-gray-900"
                                        >
                                            <div
                                                class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5"
                                            >
                                                <div>
                                                    <p
                                                        class="text-sm text-gray-500"
                                                    >
                                                        {{
                                                            `${exercise.order}. ${exercise.name}`
                                                        }}
                                                    </p>
                                                </div>
                                            </div>
                                        </Link>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </li>
                </ol>
            </div>
        </div>
    </AppLayout>
</template>
