import './bootstrap';
import { createPinia } from "pinia";
import { useDarkModeStore } from "@/Stores/darkMode.js";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "ziggy-js";
import { InertiaProgress } from "@inertiajs/progress";


const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "PKKMB-SV-UNS";

const pinia = createPinia();

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: async (name) => {
        const page = await resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        );

        // Import CSS based on the page name
        if (name.startsWith("Views")) {
            await import("../css/views.css");
        } else {
            await import("../css/admin.css");
        }

        return page;
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(pinia)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});

InertiaProgress.init();

const darkModeStore = useDarkModeStore(pinia);

if (
    (!localStorage["darkMode"] &&
        window.matchMedia("(prefers-color-scheme: dark)").matches) ||
    localStorage["darkMode"] === "1"
) {
    darkModeStore.set(true);
}

