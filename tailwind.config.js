module.exports = {
    darkMode: 'class',
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        colors: {
            'black': '#04060A'
        },
      extend: {},
    },
    plugins: [
        require('flowbite/plugin')
    ],

  }
