module.exports = {
    darkMode: 'class',
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      fontFamily: {
        'passion': ['Passion One', 'cursive'],
        'poppins': ['Poppins', 'sans-serif'],
      },
      colors: {
        'black': '#04060A'
      },
      extend: {},
    },
    plugins: [
      require('flowbite-typography'),
      require('flowbite/plugin')
    ],
  }
