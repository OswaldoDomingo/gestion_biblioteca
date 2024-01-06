/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php", //Cualquier archivo blade carga tailwindcss
    "./resources/**/*.js", //Cualquier archivo js carga tailwindcss
    "./resources/**/*.vue", //Cualquier archivo vue carga tailwindcss
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

