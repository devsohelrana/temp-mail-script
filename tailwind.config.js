/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],

  darkMode: "selector",

  theme: {
    container: {
      // padding: {
      //   DEFAULT: "15px",
      // },
    },
    screens: {
      sm: "640px",
      md: "780px",
      lg: "960px",
      xl: "1200px",
    },
    fontFamily: {
      poppins: "'Poppins', sans-serif",
      exo: "'Exo 2', sans-serif",
    },
    backgroundImage: {
      hero: "url(/assets/img/hero.svg)",
      // grid: "url(/assets/grid.png)",
    },
    extend: {
      colors: {
        primary: {
          DEFAULT: "#5d719f24",
          hover: "#111827",
        },
        secondary: "4d5053",
        blue: {
          DEFAULT: "#1e3a8a",
          secondary: "#1d4ed8",
          hover: "#a78bfa",
        },
        dark: {
          DEFAULT: "#111827",
          primary: "#374151",
          hover: "#1F2937",
          front: "#9CA3AF",
          line: "#374151"
        }
      },
    },
  },
  plugins: [],
}

