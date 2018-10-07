const BundleAnalyzerPlugin  = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const CleanWebpackPlugin    = require('clean-webpack-plugin');
const config                = require('./app.config.json');
const CopyWebpackPlugin     = require('copy-webpack-plugin');
const HtmlWebpackPlugin     = require('html-webpack-plugin');
const ImageminPlugin        = require('imagemin-webpack-plugin').default;
const MiniCssExtractPlugin  = require('mini-css-extract-plugin');
const path                  = require('path');
const UglifyJsPlugin        = require('uglifyjs-webpack-plugin');
const webpack               = require('webpack');

const webapp = {
  name: config.title,
  short_name: config.short_name,
  description: config.description,
  background_color: config.theme_color,
  theme_color: config.theme_color,
  icons: [
    {
      src: path.resolve('./src/images/logo.png'),
      sizes: [96, 128, 192, 256, 384, 512]
    }
  ]
};

const copyFiles = [
  { from: './src/images/', to: './images' },
  { from: './src/favicon.ico', to: './' },
];

const baseWebpack = {
  entry: {
    app: './src/app.js',
    editor: './src/editor.scss'
  },
  output: {
    publicPath: '/',
    path: path.resolve(__dirname, 'dist'),
    filename: '[name].bundle.js'
  },
  module: {
    rules: [
      {
        test: /\.scss/,
        use: [
          { loader: 'style-loader', options: { sourceMap: true } },
          MiniCssExtractPlugin.loader,
          { loader: 'css-loader', options: { sourceMap: true } },
          {
            loader: 'postcss-loader',
            options: {
              ident: 'postcss',
              plugins: [
                require('autoprefixer')({}),
                require('cssnano')({ preset: 'default' })
              ],
              minimize: true,
              sourceMap: true
            }
          },
          { loader: 'sass-loader', options: { sourceMap: true } },
        ]
      },
      {
        test: /\.jpe?g$|\.gif$|\.png$|\.svg$/,
        use: 'file-loader'
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['env']
          }
        }
      }
    ]
  },
  plugins: [
    new webpack.DefinePlugin({
      'process.env.WEBPACK_MODE': JSON.stringify(process.env.WEBPACK_MODE)
    }),
    new CleanWebpackPlugin(['dist']),
    new HtmlWebpackPlugin({
      hash: false,
      template: './src/index.html'
    }),
    new MiniCssExtractPlugin({
      filename: '[name].css',
    }),
    new CopyWebpackPlugin(copyFiles),
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      Popper: 'popper.js'
    })
  ]
};

const prodStart = () => {
  baseWebpack.optimization = {
    minimizer: [ new UglifyJsPlugin() ],
  };
  baseWebpack.plugins.push(new ImageminPlugin({ test: /\.(jpe?g|png|gif|svg)$/i }));
  baseWebpack.plugins.push(new BundleAnalyzerPlugin({analyzerMode: 'disabled'}));
};

const devStart = () => {
  baseWebpack.devServer = {
    contentBase: path.join(__dirname, 'dist'),
    compress: true,
    open: true,
    port: 9000
  };
};

module.exports = (env, options) => {
  if (options.mode === 'production') {
    prodStart();
  }

  if (options.mode === 'development') {
    devStart();
  }

  return baseWebpack;
};

