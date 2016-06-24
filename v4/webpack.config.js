const webpack = require('webpack');
const autoprefixer = require('autoprefixer')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
const UglifyJsPlugin = require('uglify-js')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const path = require('path')


const sassLoaders = [
  'css-loader',
  'postcss-loader',
  // 'sass-loader?indentedSyntax=sass&includePaths[]=' + path.resolve(__dirname, './src')
  'sass-loader'
]

const config = {
  entry: {
    app: ['./src/index']
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loaders: ['babel-loader']
      },
      {
        test: /\.scss$/,
        loader: ExtractTextPlugin.extract('style-loader', sassLoaders.join('!'))
      }
    ]
  },
  sassLoader: {
    includePaths: [path.resolve(__dirname, "./src")],
    outputStyle: 'compressed'
  },
  postcss: [
    autoprefixer({
      browsers: ['last 2 versions']
    })
  ],
  plugins: [
    new ExtractTextPlugin('[name].css'),
    // new webpack.optimize.UglifyJsPlugin({
    //   compress: {
    //       warnings: false
    //   }
    // }),
    new BrowserSyncPlugin({
      // browse to http://localhost:3000/ during development,
      // ./public directory is being served
      host: 'localhost',
      port: 3000,
      server: { baseDir: ['./'] }
    })
  ],
  resolve: {
    extensions: ['', '.js', '.scss'],
    root: [path.join(__dirname, './src')]
  },
  output: {
    filename: '[name].js',
    path: path.join(__dirname, './build'),
    publicPath: '/build'
  },
  stats: { children: false }
}

module.exports = config
