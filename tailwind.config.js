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
            10: '#263238',
            "vanilla": '#EFEFEF'
        }
        ,
        brown: {
            10: '#fff4af',
            "button": '#B78103',
            "bg" :"#533e2d",
            400 :"#ddca7d",



        },
        coffe: {
            'bg': '#212121',
            'hover': '#141414'
        }
      },
      extend: {},
    },
    plugins: [
      require('flowbite-typography'),
      require('flowbite/plugin')
    ],
  }
