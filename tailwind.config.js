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
        blue: {
            10: '#133B60'
        },
        gray: {
            10: '#263238'
        }
      },
      extend: {},
    },
    plugins: [
      require('flowbite-typography'),
      require('flowbite/plugin')
    ],
  }
