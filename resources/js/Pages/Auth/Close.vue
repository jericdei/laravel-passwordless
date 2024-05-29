<script setup lang="ts">
import { onBeforeMount } from "vue";
import Guest from "@/Layouts/Guest.vue";

const props = defineProps<{
    message?: string;
}>();

onBeforeMount(() => {
    if (window.opener) {
        window.opener.postMessage("windowClosed", "*");
        window.close();
    }
});
</script>

<template>
    <Guest title="Log in successful">
        <p class="text-xl text-center p-32">
            {{ props.message }}
        </p>
    </Guest>
</template>
