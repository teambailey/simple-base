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
    // Not sure what you do yet.
    // Think that you compile the Sass
    // and act as the loader too
    new ExtractTextPlugin('[name].css'),
    // Uglifies the final compiled
    // build JS file. Its disabled b/c
    // I still need to figure out the
    // production build process
    // new webpack.optimize.UglifyJsPlugin({
    //   compress: {
    //       warnings: false
    //   }
    // }),
    // Creates a development web server
    // at localhost:3000. A proxy can be
    // setup to unitilize the
    // webpack server thingy
    new BrowserSyncPlugin({
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
  // Prevents unnecessary stats
  // that are outputed to the terminal
  stats: { children: false }
}

module.exports = config
