module.exports = {
  purge: [
    './src/**/*.twig',
    './src/**/*.svg'
  ],
  theme: {
    fontFamily: {
      body: ['Raleway', 'sans-serif']
    },
    extend: {
      colors: {
        kombiblue: {
          default: '#0088AB',
          dark: '005166'
        },
        kombigrey: {
          default: '#EBF0F2'
        },
        kombiblack: {
          default: '#00161C'
        }
      },
      spacing: {
       meganav: '40rem',
       '16x9': '56.25%'
      },
      opacity: {
        '85': '0.85',
        '90': '0.90',
        '95': '0.95'
      }
    }
  },
  variants: {},
  plugins: [],
}
