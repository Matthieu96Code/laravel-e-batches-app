/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  // darkMode: 'class',
  theme: {
    extend: {
      backgroundImage: {
        "gradient-radial": "radial-gradient(var(--tw-gradient-stops))",
        "gradient-conic": "conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))",
      },
      colors: {
        "triooti": "#b5da21",
        "color-one": "#2174b5",
        "color-two": "#b5da21",
        "color-three": "#da2121",
        "color-four": "#21b5b5",
        "color-five": "#5c21da",
        "color-six": "#da7821"

      },
      textColor: {
        skin: {
          primary: 'var(--color-text-primary)',
          'primary-title': 'var(--color-text-primary-title)',
          'primary-muted': 'var(--color-text-primary-muted)',
          secondary: 'var(--color-text-secondary)',
          'secondary-title': 'var(--color-text-secondary-title)',
          'secondary-muted': 'var(--color-text-secondary-muted)',
          button: 'var(--color-text-button)',
        }
      },
      backgroundColor: {
        skin: {
          primary: 'var(--color-primary)',
          secondary: 'var(--color-secondary)',
          'background-primary': 'var(--color-background-primary)',
          'background-secondary': 'var(--color-background-secondary)',

          'button-accent': 'var(--color-button-accent)',
          'button-accent-hover': 'var(--color-button-accent-hover)',
          'button-succes': 'var(--color-button-succes)',
          'button-succes-hover': 'var(--color-button-succes-hover)',
          'button-dark': 'var(--color-button-dark)',
          'button-dark-hover': 'var(--color-button-dark-hover)',
          'button-muted': 'var(--color-button-muted)',
        }
      },
      borderColor: {
        skin: {
          input: 'var(--color-border-input)',
          'input-hover': 'var(--color-button-accent)',
        }
      },
    },
  },
  plugins: [],
}

