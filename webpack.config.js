const path = require('path');

module.exports = {
  mode: 'production',
  entry: {
    app: './src/example.js',
    admin: './src/admin.js'
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'build'),
  }
};