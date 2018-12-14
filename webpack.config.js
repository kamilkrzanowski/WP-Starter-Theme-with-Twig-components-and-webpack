const ExtractTextPlugin = require('extract-text-webpack-plugin')
const CleanWebpackPlugin = require('clean-webpack-plugin')
const styleLintPlugin = require('stylelint-webpack-plugin')
const webpack = require('webpack')
const path = require('path')

module.exports = {
  entry: {
    bundle: './js/app.js',
    style: './scss/app.scss',
  },
  output: {
    publicPath: "/",
    path: path.resolve(__dirname, "src"),
    filename: '[name].js'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        use: {
          loader: "babel-loader",
          options: { presets: ["es2015"] }
        }
      },
      {
        test: /\.(gif|svg|jpg|png)$/,
        loader: "file-loader",
        options: {
          emitFile: true,
          name: 'assets/[name].[ext]',
          context: '',
          publicPath: '/'
        }
      },
      {
        test: /\.(css|scss)$/,
        use: ExtractTextPlugin.extract({
          fallback: "style-loader", 
          use: [
            {
              loader: 'css-loader',
              options: {
                minimize: true || {/* CSSNano Options */}
              }
            },
            {
              loader: 'postcss-loader'
            },
            {
              loader: 'sass-loader'
            }
          ]
        }) 
      }
    ]
  },
  plugins: [
    new ExtractTextPlugin({
      filename: 'style.css',
      publicPath: '/'
    }),
    new CleanWebpackPlugin([path.join(__dirname, "/src")], {
      root: process.cwd()
    }),
    new styleLintPlugin({
      configFile: '.stylelintrc',
      context: 'src',
      files: '**/*.scss',
      failOnError: false,
      quiet: false,
    })
  ]
};