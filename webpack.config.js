const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const FixStyleOnlyEntriesPlugin = require('webpack-fix-style-only-entries');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const glob = require("glob");

///////////////////////////////////////////////// エントリーポイントリストの自動生成
const srcDir = "./src"; // 対象にするディレクトリ

const entries = glob
    .sync('**/*.*', {
        ignore: "**/modules/*", // 除外するファイル
        cwd: srcDir, // 対象にするディレクトリ
    })
    .map(function (key) {
        // [ '**/*.js' , './src/**/*.js' ]という形式の配列にする
        return [key.replace(path.parse(key).ext, '').replace('sass/', 'css/'), path.resolve(__dirname, srcDir, key)]; // path.parse(key).ext で拡張子抽出
    });

// 配列→{key:value}の連想配列へ変換
const entryObj = Object.fromEntries(entries);
/////////////////////////////////////////////////

module.exports = {
    // コンパイルモード
    mode: 'none',
    // エントリーポイントの設定
    entry: entryObj,
    // 出力先の設定
    output: {
        path: path.resolve(__dirname, './dist/'),
        filename: '[name].js'
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
            filename: '[name].css'// 相対パス指定
        }),
    ],
    // node_modules を監視（watch）対象から除外
    watchOptions: {
        ignored: /node_modules/  //正規表現で指定
    },
    // ソースマップ出力
    //devtool: 'inline-source-map',
};