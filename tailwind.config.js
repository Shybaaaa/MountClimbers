/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./public/**/*.{html,js,php}",
        "./private/**/*.{html,js,php}",
        "./index.php",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            gridTemplateRows: {
                '[auto,auto,1fr]': 'auto auto 1fr',
            },
        },
    },
    plugins: [
        require('flowbite/plugin'),
        require('@tailwindcss/aspect-ratio'),
    ],
}

