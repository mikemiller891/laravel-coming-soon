const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    darkMode: 'media',
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: { /* be gone, ye stylishly subtle box shadows! */
                'sm': '0 1px 2px 0 rgba(0,0,0, 1)',
                'DEFAULT': '0 1px 3px 0 rgba(0,0,0, 1)',
                'md': '0 4px 6px -1px rgba(0,0,0, 1)',
                'lg': '0 10px 15px -3px rgba(0,0,0, 1)',
                'xl': '0 20px 25px -5px rgba(0,0,0, 1)',
                '2xl': '0 25px 50px -12px rgba(0,0,0, 1)',
                'inner': 'inset 0 2px 4px 0 rgba(0,0,0, 1)',
                /* box glow */
                'nsm': '0 1px 2px 0 rgba(255,255,255, 1)',
                'n': '0 1px 3px 0 rgba(255,255,255, 1)',
                'nmd': '0 4px 6px -1px rgba(255,255,255, 1)',
                'nlg': '0 10px 15px -3px rgba(255,255,255, 1)',
                'nxl': '0 20px 25px -5px rgba(255,255,255, 1)',
                'n2xl': '0 25px 50px -12px rgba(255,255,255, 1)',
                'ninner': 'inset 0 2px 4px 0 rgba(255,255,255, 1)',
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
        extend: {
            boxShadow: ['dark'],
        },
    },
};
