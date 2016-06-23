const autoprefixer = require('autoprefixer')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
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
    outputStyle: 'nested'
  },
  postcss: [
    autoprefixer({
      browsers: ['last 2 versions']
    })
  ],
  plugins: [
    new ExtractTextPlugin('[name].css')
  ],
  resolve: {
    extensions: ['', '.js', '.scss'],
    root: [path.join(__dirname, './src')]
  },
  output: {
    filename: '[name].js',
    path: path.join(__dirname, './build'),
    publicPath: '/build'
  }
}

module.exports = config
