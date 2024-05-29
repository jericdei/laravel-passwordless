<script setup lang="ts">
defineProps<{
    title: string;
}>();
</script>

<template>
    <Head :title />

    <main
        class="h-screen bg-surface-200 dark:bg-surface-900 dark:text-surface-100 grid place-items-center"
    >
        <slot />
    </main>
</template>
