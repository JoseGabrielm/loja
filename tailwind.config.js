const {
    colors
} = require('tailwindcss/defaultTheme');
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {

        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            'branco': '#f8f7ff',
            'preto': '#0b090a',
            azul: {
                100: '#caf0f8',
                200: '#ade8f4',
                300: '#a9d6e5',
                400: '#89c2d9',
                500: '#61a5c2',
                600: '#2c7da0',
                700: '#014f86',
                800: '#013a63',
                900: '#012a4a',
            },
            cinza: {
                100: '#f8f9fa',
                200: '#e9ecef',
                300: '#dee2e6',
                400: '#ced4da',
                500: '#adb5bd',
                600: '#6c757d',
                700: '#495057',
                800: '#343a40',
                900: '#212529',
            },
            amarelo: {
                100: '#FFF9C4',
                200: '#FFF59D',
                300: '#FFF176',
                400: '#FFEE58',
                500: '#FFEB3B',
                600: '#FEE338',
                700: '#FDD835',
                800: '#FBC02D',
                900: '#F9A825',
            },
            vermelho: {
                100: '#f6cacc',
                200: '#f1a7a9',
                300: '#ec8385',
                400: '#e66063',
                500: '#D95356',
                600: '#CC474A',
                700: '#BC383A',
                800: '#AC282A',
                900: '#9c191b',
            },

            verde: {
                100: '#9ceaef',
                200: '#68d8d6',
                300: '#07beb8',
                400: '#0FABA6',
                500: '#149E99',
                600: '#1B8E8A',
                700: '#218380',
                800: '#127475',
                900: '#216869',
            },
            marrom: {
                100: '#e6b8a2',
                200: '#deab90',
                300: '#d69f7e',
                400: '#cd9777',
                500: '#c38e70',
                600: '#b07d62',
                700: '#9d6b53',
                800: '#8a5a44',
                900: '#774936',
            },
            terra: {
                10: '#e0e2db',
                20: '#d2d4c8',
                30: '#b8bdb5',
                40: '#889696',
                50: '#5f7470',
            },
            floresta: {
                60: '#16697a',
                50: '#2c6975',
                40: '#588b8b',
                30: '#5ca4a9',
                20: '#85cbcc',
                10: '#a8dee0',
            },
            celeste: {
                40: '#114b5f',
                30: '#457b9d',
                20: '#95b8d1',
                10: '#bdd5ea',
            },
            argila: {
                40: '#fbc78d',
                30: '#fcd19c',
                20: '#f9e2ae',
                10: '#faedcb',
            },
            relva: {
                40: '#bfd3c1',
                30: '#bae0d3',
                20: '#d3e6c8',
                10: '#eff6e6',
            },
            supreme: {
                rosa: '#facde1',
                terra: '#d8c8b9',
                base: '#c5c3c6',
                fundo: '#e0e2db',
                ecinco: '#e5e5e5',
            },
        },

        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            spacing: {
              '100': '30rem',
              '120': '35rem',
              '150': '40rem',
              '200': '50rem',
            }
        },

    },


    variants: {
        extend: {
            scale: ['active'],
            opacity: ['responsive', 'hover', 'focus', 'disabled'],
            backgroundColor: ['odd', 'even'],
            boxShadow: ['active', 'hover'],
            textColor: ['active', 'group-hover'],
            rotate: ['group-hover'],
            borderStyle: ['hover', 'focus'],
        },
    },



    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography') ],
};
