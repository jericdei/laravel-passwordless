<script setup lang="ts">
import Guest from "@/Layouts/Guest.vue";
import { useForm } from "@inertiajs/vue3";
import InputText from "primevue/inputtext";
import FloatLabel from "primevue/floatlabel";
import { ref } from "vue";
import Button from "primevue/button";

const form = useForm<{
    email: string;
}>({
    email: "",
});

const isEmail = ref(false);

function submit() {}
</script>

<template>
    <Guest title="Login">
        <div class="p-4 bg-surface-300 dark:bg-surface-700 rounded-lg">
            <div v-if="!isEmail" class="flex flex-col">
                <Button label="Login with Email" @click="isEmail = true" />
            </div>

            <form v-if="isEmail" @submit.prevent="submit">
                <FloatLabel>
                    <InputText id="email" v-model="form.email" />
                    <label for="email">Email</label>
                </FloatLabel>
            </form>
        </div>
    </Guest>
</template>
