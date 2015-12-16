var path = require('path');
var webpack = require('webpack');
var config = {
  context: path.join(__dirname, '/app/src'), // исходная директория
  entry: './index', // файл для сборки, если несколько - указываем hash (entry name => filename)
  output: {
    path: path.join(__dirname, 'public/assets/bundles') // выходная директория
  },
  plugins: [
    new webpack.optimize.UglifyJsPlugin(),
    new webpack.optimize.DedupePlugin(),
    new BowerWebpackPlugin({
      modulesDirectories: ['bower_components'],
      manifestFiles: ['bower.json', '.bower.json'],
      includes: /.*/,
      excludes: /.*\.less$/
    }),
    DefinePlugin({
      'NODE_ENV': JSON.stringify('production'),
      'APP_BASE_URL': JSON.stringify('http://vkcm.ru/'),
      'APP_ASSETS_URL': JSON.stringify('http://assets.vkcm.ru/')
    }),
  ]
};
var compiler = webpack(config);
compiler.run(function (err, stats) {
  console.log(stats.toJson()); // по завершению, выводим всю статистику
});