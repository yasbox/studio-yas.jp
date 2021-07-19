const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const FixStyleOnlyEntriesPlugin = require('webpack-fix-style-only-entries');
webpack = require('webpack');

module.exports = {
    // コンパイルモード
    mode: 'production',
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
        path: path.resolve(__dirname, './dist/js/'),
        filename: '[name].js'
    },
    // スタイルシートの読み込み
    module: {
        rules: [
            {
                test: /\.(sa|sc|c)ss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            url: false,
                        }
                    },
                    "sass-loader",
                    {
                        loader: 'postcss-loader',
                        options: {
                            sourceMap: true,
                            postcssOptions: {
                                plugins: [
                                    require('autoprefixer')({
                                        "overrideBrowserslist": [
                                            "last 2 versions",
                                            "ie >= 11",
                                            "Android >= 4"
                                        ]
                                    }),
                                    require('cssnano')({
                                        preset: 'default',
                                    }),
                                ]
                            }
                        }
                    },
                ]
            }
        ]
    },
    plugins: [
        new FixStyleOnlyEntriesPlugin(), // CSS別書き出し時の空のJSファイルを削除
        new MiniCssExtractPlugin({
            filename: '../css/[name]'
        }),
    ],
    // node_modules を監視（watch）対象から除外
    watchOptions: {
        ignored: /node_modules/  //正規表現で指定
    },
};