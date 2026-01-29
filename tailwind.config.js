import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    safelist: [
        {
            pattern: /bg-(indigo|emerald|purple|orange|pink|blue|cyan|teal|red|gray)-(50|100|200|300|400|500|600|700|800|900)/,
        },
        {
            pattern: /from-(indigo|emerald|purple|orange|pink|blue|cyan|teal|red|gray)-(400|500|600)/,
        },
        {
            pattern: /to-(indigo|emerald|purple|orange|pink|blue|cyan|teal|red|gray)-(400|500|600)/,
        },
        {
            pattern: /text-(indigo|emerald|purple|orange|pink|blue|cyan|teal|red|gray)-(400|500|600|700)/,
        },
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};