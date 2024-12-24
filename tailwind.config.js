import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        colors: {
            'primary': {
                "50": "#708ec5",
                "100": "#587bbc",
                "200": "#4069b2",
                "300": "#2856a9",
                "400": "#1f4c9f",
                "500": "#10439F",
                "600": "#0e3c8f",
                "700": "#0d367f",
                "800": "#0b2f6f",
                "900": "#0a285f",
            },
            'secondary': {
                "50": "#f388ff",
                "100": "#d879ff",
                "200": "#bd6aff",
                "300": "#a25bf4",
                "400": "#9453e0",
                "500": "#874ccc",
                "600": "#7944b7",
                "700": "#6c3ca3",
                "800": "#5e358e",
                "900": "#512d7a",
            },
            'tertiary': {
                '50': '#f8b2f9',
                '100': '#ec9ef1',
                '200': '#e08ae9',
                '300': '#d476e1',
                '400': '#c962d8',
                '500': '#c65bcf',
                '600': '#b152ba',
                '700': '#9d49a6',
                '800': '#884092',
                '900': '#73377d',
            },
            'accent': {
                "50": "#ffe4f4",
                "100": "#ffcceb",
                "200": "#ffb4e2",
                "300": "#fc9dda",
                "400": "#f986d1",
                "500": "#f27bbd",
                "600": "#d671aa",
                "700": "#b96697",
                "800": "#9c5c84",
                "900": "#805271",
            },
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
};
