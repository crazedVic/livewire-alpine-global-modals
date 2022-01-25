module.exports = {
    mode: 'jit',
    purge:[
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        './vendor/usernotnull/tall-toasts/config/**/*.php',
        './vendor/usernotnull/tall-toasts/resources/views/**/*.blade.php'
    ],
  theme: {
    extend: {
        // screens: {
        //     'md': '800px',
        //     // => @media (min-width: 992px) { ... }
        // },
        fontSize: {
            xxs: '.5rem',
        },
        padding: {
            '0.5': '3px',
        },
        margin: {
            '0.25': '3px',
        },
        animation: {
            fade: 'fadeOut 1s ease-in-out',
        },
        keyframes: theme => ({
            fadeOut: {
                '0%': {opacity: 0},
                '100%': { opacity: 1},
            },
        }),
    },
  },
  plugins: [],
}
