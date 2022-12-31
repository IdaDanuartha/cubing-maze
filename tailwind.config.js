/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        "worksans-light": ['worksans-light', 'sans-serif'],
        "worksans-medium": ['worksans-medium', 'sans-serif'],
        "worksans-semibold": ['worksans-semibold', 'sans-serif'],
      }
    },
  },
  plugins: []
}
