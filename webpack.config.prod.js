// webpack v4
const path = require('path')
const views = require('./webpack.helper.js')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')
// const OptimizeCSSAssetsPlugin = require('optim')
module.exports = {
  stats: {
    modules: false,
    colors: true,
    version: false,
    children: false
  },
  entry: {
    index: './src/js/index.js',
    admin:'./src/js/admin.js'
  },
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'js/[name].js'
  },
  devServer: {
    hot: true,
    historyApiFallback: true
  },
  optimization: {
    // splitChunks: {
    //   chunks: 'all',
    //   name: true
    // },
    minimizer: [
      new UglifyJsPlugin({
        cache: true,
        parallel: true,
        // compress: {
        //   unused: false,
        //   keep_fnames: true,
        //   warnings: true
        // },
        uglifyOptions : {
          compress: {
            unused: false,
            keep_fnames: true,
            warnings: true
          }
        }
        // uglifyOptions: {
        // }
        // sourceMap: true // set to true if you want JS source maps
      })
      // ,
      // new OptimizeCSSAssetsPlugin({})
    ]
  },
  mode: 'production',
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader"
        }
      },
      {
        test: /\.scss$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              publicPath: '../'
            }
          },
          
          'css-loader',
          {
            loader:'sass-loader',
            options:{
              // sourceMap: true,
              sourceMapContents: false,
              outputStyle: 'compressed'

            }
          }
          
        ]

      },
      {
        test: /\.pug$/,
        use: [
          'html-loader',
          {
            loader: 'pug-html-loader',
            options: {
              pretty: true
            }
          }
        ]
      },
      {
        test: /\.(png|jpg|gif|JPG|PNG|GIF|svg)$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: 'assets/img/[name].[ext]'
            }
          }
        ]
      },
      
      {
        test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
        exclude: /node_modules/,
        use: [{
            loader: 'file-loader',
            options: {
              name: 'assets/fonts/[name].[ext]'
              // ,
              // publicPath: '/assets'    
            }
        }]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "css/[name].css",
    }),
    ...views.pages({
      srcDir: './src/pug',
      filesExt: 'pug',
      hash: true
    })
  ]
};