/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
          colors: {
            'text': /*'#000000', */'#e3f3e4',

            'background': '#051005',
            'primary': '#8ee490',
            'primary-content': '#0a0b08',
            'secondary': '#178c1b',
            'secondary-content': '#f0f1ec',
            'accent': '#25e92b',
            'base-100': '#2a2b28',
          }
        },
    },
    plugins: [],
};

