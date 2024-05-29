<script setup lang="ts">
import Guest from "@/Layouts/Guest.vue";
import Button from "primevue/button";
</script>

<template>
    <Guest title="Home Page">
        <div class="flex">
            <Link :href="route('auth.login')">
                <Button label="Login" />
            </Link>
        </div>
    </Guest>
</template>
