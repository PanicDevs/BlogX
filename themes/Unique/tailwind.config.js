import colors from "tailwindcss/colors";

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        './views/**/*.{blade.php,js}',
        './views/**/**/*.{blade.php,js}',
        './views/**/**/**/*.{blade.php,js}',
        './views/**/**/**/**/*.{blade.php,js}',
        './views/**/**/**/**/**/*.{blade.php,js}',
        './views/**/**/**/**/**/**/*.{blade.php,js}',
        './views/**/**/**/**/**/**/**/*.{blade.php,js}',
        './views/**/**/**/**/**/**/**/**/*.{blade.php,js}',
        './views/**/**/**/**/**/**/**/**/**/*.{blade.php,js}',
    ],
    theme: {
        extend: {
            colors: {
                black    : colors.black,
                white    : colors.white,
                dark     : colors.slate,
                light    : colors.slate,
                primary  : colors.indigo,
                secondary: colors.slate,
                danger   : colors.red,
                success  : colors.green,
                info     : colors.blue,
                warning  : colors.amber,
            }
        },
    },
    plugins: [],
}
