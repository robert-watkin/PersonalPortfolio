/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
          colors: {
            'text': '#000000',
            'background': '#ffffff',
            'primary-button': '#8fb4ff',
            'secondary-button': '#ebf1ff',
            'accent': '#ff8f94',
          }
        },
    },
    plugins: [],
};

