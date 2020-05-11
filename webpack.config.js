const path = require('path');

module.exports = {
  mode: 'production',
  entry: './src/example.js',
  output: {
    filename: 'main.js',
    path: path.resolve(__dirname, 'build'),
  },
};