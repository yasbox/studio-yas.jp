//const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const FixStyleOnlyEntriesPlugin = require('webpack-fix-style-only-entries');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const glob = require("glob");


const basePath = path.resolve(__dirname, './');
const targetDir = ['src'];

const targets = glob.sync(`${basePath}/+(${targetDir.join('|')})/*.js`);
const entries = {};

targets.forEach((value) => {
    const re = new RegExp(`${basePath}/`);
    const key = value.replace(re, '');
    entries[key] = value;
});



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
    entry: entries,
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