// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    modules: ["@nuxtjs/tailwindcss"],
    css: ["@/assets/css/main.css"],
    app: {
        head: {
            title: "Nature Social App",
            meta: [
                {
                    charset: "utf-8",
                },
                {
                    name: "viewport",
                    content: "width=device-width, initial-scale=1",
                },
                {
                    hid: "description",
                    name: "description",
                    content: "Nature Social App",
                },
                {
                    name: "format-detection",
                    content: "telephone-no",
                },
            ],
            link: [
                {
                    rel: "stylesheet",
                    href: "https://fonts.googleapis.com/css2?family=Playfair:wght@300;400;500;600;800&display=swap",
                },
                {
                    rel: "icon",
                    type: "image/x-icon",
                    href: "favicon.ico",
                },
            ],
        },
    },
});
