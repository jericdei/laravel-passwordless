<script setup lang="ts">
import Guest from "@/Layouts/Guest.vue";
import { router, useForm } from "@inertiajs/vue3";
import InputText from "primevue/inputtext";
import FloatLabel from "primevue/floatlabel";
import { ref } from "vue";
import Button, { ButtonPassThroughOptions } from "primevue/button";
import Divider from "primevue/divider";

const form = useForm<{
    email: string;
    name: string;
}>({
    email: "",
    name: "",
});

const isEmail = ref(false);

const oauthProviders: {
    name: string;
    icon: string;
    pt: ButtonPassThroughOptions;
}[] = [
    {
        name: "GitHub",
        icon: "ri-github-fill",
        pt: {
            root: "bg-surface-200 dark:bg-surface-900 text-surface-700 dark:text-surface-100 border-none",
        },
    },
];

function redirectToProvider(provider: string) {
    const popup = window.open(
        route("auth.provider.redirect", { provider }),
        "_blank",
        "width=780,height=540,toolbar=0,scrollbars=0,status=0,resizable=0,location=0,menuBar=0,left=500,top=200"
    );

    window.addEventListener("message", function handleMessage(event) {
        if (event.source === popup && event.data === "windowClosed") {
            router.get(route("dashboard"));

            window.removeEventListener("message", handleMessage);
        }
    });
}

function submit() {
    form.post(route("auth.login.store"));
}
</script>

<template>
    <Guest title="Login">
        <div class="p-4 bg-surface-300 dark:bg-surface-700 rounded-lg w-96">
            <div v-if="!isEmail" class="flex flex-col gap-4">
                <Button
                    v-for="provider in oauthProviders"
                    :key="provider.name"
                    :label="`Login with ${provider.name}`"
                    :icon="provider.icon"
                    unstyled
                    :pt="provider.pt"
                    :pt-options="{
                        mergeProps: true,
                    }"
                    @click="redirectToProvider(provider.name.toLowerCase())"
                />

                <Divider />

                <Button
                    label="Login with Email"
                    icon="ri-mail-fill"
                    @click="isEmail = true"
                />
            </div>

            <form
                v-if="isEmail"
                class="py-4 flex flex-col gap-4"
                @submit.prevent="submit"
            >
                <div>
                    <Button
                        label="Back"
                        icon="ri-arrow-left-line"
                        text
                        severity="contrast"
                        @click="isEmail = false"
                    />
                </div>

                <FloatLabel class="mt-4">
                    <InputText
                        type="email"
                        id="email"
                        v-model="form.email"
                        class="w-full"
                    />
                    <label for="email">Email</label>
                </FloatLabel>

                <FloatLabel class="mt-4">
                    <InputText id="name" v-model="form.name" class="w-full" />
                    <label for="name">Name</label>
                </FloatLabel>

                <Button type="submit" label="Login" />
            </form>
        </div>
    </Guest>
</template>
