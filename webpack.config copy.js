//const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const FixStyleOnlyEntriesPlugin = require('webpack-fix-style-only-entries');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = {
    // node_modules を監視（watch）対象から除外
    watchOptions: {
        ignored: /node_modules/  //正規表現で指定
    },
    // ソースマップ出力
    //devtool: 'inline-source-map',
    // コンパイルモード
    mode: 'none',
    // エントリーポイントの設定
    entry: {
        'common': path.resolve(__dirname, "./src/js/common.js"),
        'index': path.resolve(__dirname, "./src/js/index.js"),
        'base.css': path.resolve(__dirname, './src/sass/base.scss'),
        'index.css': path.resolve(__dirname, './src/sass/index.scss'),
        'price.css': path.resolve(__dirname, './src/sass/price.scss'),
        'about.css': path.resolve(__dirname, './src/sass/about.scss'),
        'works.css': path.resolve(__dirname, './src/sass/works.scss'),
        'contact.css': path.resolve(__dirname, './src/sass/contact.scss'),
    },
    // 出力先の設定
    output: {
        path: path.resolve(__dirname, './dist/'),
        filename: 'js/[name].js'
    },
    module: {
        rules: [
            // sassの読み込み
            {
                test: /\.(sa|sc|c)ss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'postcss-loader', // オプションはpostcss.config.jsで指定
                    'sass-loader',
                ]
            }
        ]
    },
    plugins: [
        // 書き出し先のフォルダを一旦空に
        new CleanWebpackPlugin({
            cleanOnceBeforeBuildPatterns: [
                '**/*',
                //path.resolve(__dirname, './dist/css/'), // 絶対パス指定
            ],
        }),
        new FixStyleOnlyEntriesPlugin(), // CSS別書き出し時の空のJSファイルを削除
        new MiniCssExtractPlugin({
            filename: 'css/[name]'// 相対パス指定
        }),
    ],
};