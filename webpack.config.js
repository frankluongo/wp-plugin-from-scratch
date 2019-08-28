const webpack = require('webpack');
const path = require('path');

const paths = {
  src: './plugin/index.js',
  dist: path.resolve(
    __dirname,
    'app/wordpress/plugins/frankluongo-plugin/assets',
  ),
};

const config = {
  entry: paths.src,
  output: {
    path: paths.dist,
    filename: 'frankluongo-plugin.js',
  },
  module: {
    rules: [
      {
        test: /\.(js)$/,
        exclude: /node_modules/,
        use: 'babel-loader',
      },
    ],
  },
};
module.exports = config;
