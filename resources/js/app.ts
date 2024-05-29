import "./bootstrap";
import "../css/app.css";
import "remixicon/fonts/remixicon.css";

import { createApp, h, DefineComponent } from "vue";
import { Head, Link, createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "ziggy-js";
import PrimeVue from "primevue/config";
import Lara from "@/Presets/lara";

const appName = import.meta.env.VITE_APP_NAME || "Laravel Passwordless";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob<DefineComponent>("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component("Head", Head)
            .component("Link", Link)
            .use(PrimeVue, {
                unstyled: true,
                pt: Lara,
            })
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
