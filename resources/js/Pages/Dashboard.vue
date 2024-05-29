<script setup lang="ts">
import Authenticated from "@/Layouts/Authenticated.vue";
import { router } from "@inertiajs/vue3";
import Button from "primevue/button";
</script>

<template>
    <Authenticated title="Home Page">
        <div class="flex flex-col gap-4">
            <p>Hi, {{ $page.props.auth.user.name }}!</p>

            <Button
                label="Logout"
                @click="() => router.post(route('auth.logout'))"
            />
        </div>
    </Authenticated>
</template>
