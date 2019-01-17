'use strict';
const path = require('path');
const utils = require('./utils');
const webpack = require('webpack');
const config = require('./config');
const merge = require('webpack-merge');
const baseWebpackConfig = require('./webpack.base.conf');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const FriendlyErrorsPlugin = require('friendly-errors-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const portfinder = require('portfinder');

function resolve (dir) {
  return path.join(__dirname, '..', dir)
}

const HOST = process.env.HOST;
const PORT = process.env.PORT && Number(process.env.PORT);

const devWebpackConfig = merge(baseWebpackConfig, {
  module: {
    rules: utils.styleLoaders({ sourceMap: config.dev.cssSourceMap, usePostCSS: true })
  },
  // cheap-module-eval-source-map is faster for development
  devtool: config.dev.devtool,

  // these devServer options should be customized in /config/index.js
  devServer: {
    mode: 'development',
    clientLogLevel: 'warning',
    historyApiFallback: true,
    hot: true,
    compress: true,
    host: HOST || config.dev.host,
    port: PORT || config.dev.port,
    open: config.dev.autoOpenBrowser || true,
    overlay: config.dev.errorOverlay
      ? { warnings: false, errors: true }
      : false,
    publicPath: config.dev.assetsPublicPath,
    proxy: config.dev.proxyTable,
    quiet: true, // necessary for FriendlyErrorsPlugin
    watchOptions: {
      poll: config.dev.poll,
      aggregateTimeout: 300
    },
    noInfo:true,
    stats: {colors: true}
    
  },
  plugins: [
    new webpack.DefinePlugin({
      'process.env': require('./config/dev.env')
    }),
    new webpack.HotModuleReplacementPlugin(),
    new webpack.WatchIgnorePlugin([
         path.resolve(__dirname,'./node_module/')
    ]),
    new webpack.NamedModulesPlugin(), // HMR shows correct file names in console on update.
    new webpack.NoEmitOnErrorsPlugin(),
    new BrowserSyncPlugin({
      // browse to http://localhost:3000/ during development,
      // ./public directory is being served
      host: 'localhost',
      port: 3000,
      //server: { baseDir: ['public/build'] }
      files: [
               'public/build**/*'               
       ]
    })
    // https://github.com/ampedandwired/html-webpack-plugin
   /* new HtmlWebpackPlugin({
      filename: 'index.html',
      template: 'index.html',
      inject: true,
      favicon: resolve('favicon.ico'),
      title: 'site',
      path: config.dev.assetsPublicPath + config.dev.assetsSubDirectory
    }),*/
  ]
});

module.exports = new Promise((resolve, reject) => {
  portfinder.basePort = process.env.PORT || config.dev.port;
  portfinder.getPort((err, port) => {
    if (err) {
            console.log('error',err);
      reject(err)
    } else {
      // publish the new Port, necessary for e2e tests
      process.env.PORT = port;
      // add port to devServer config
      devWebpackConfig.devServer.port = port;

      // Add FriendlyErrorsPlugin
      devWebpackConfig.plugins.push(new FriendlyErrorsPlugin({
        compilationSuccessInfo: {
          messages: [`Your application is running here: http://${devWebpackConfig.devServer.host}:${port}`],
        },
        onErrors: config.dev.notifyOnErrors
        ? utils.createNotifierCallback()
        : undefined
      }));

      resolve(devWebpackConfig)
    }
  })
});
