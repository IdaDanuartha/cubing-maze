/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/tw-elements/dist/js/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        "worksans-light": ['worksans-light', 'sans-serif'],
        "worksans-regular": ['worksans-regular', 'sans-serif'],
        "worksans-medium": ['worksans-medium', 'sans-serif'],
        "worksans-semibold": ['worksans-semibold', 'sans-serif'],
        "worksans-bold": ['worksans-bold', 'sans-serif'],
      },
      colors: {
        'main-color': '#1B262C',
        'secondary-color': '#0F4C75',
        'third-color': '#3282B8',
        'fourth-color': '#BBE1FA',
      },
    }
  },
  plugins: [
    require('tw-elements/dist/plugin')
  ]
}
