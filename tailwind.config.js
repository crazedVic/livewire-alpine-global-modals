module.exports = {
    mode: 'jit',
    purge:[
        "./resources/**/*.blade.php",
        "./resources/**/*.js"
    ],
  theme: {
    extend: {
        fontSize: {
            xxs: '.5rem',
        },
        padding: {
            '0.5': '3px',
        },
        margin: {
            '0.25': '3px',
        }
    },
  },
  plugins: [],
}
