const path = require('path');

module.exports = {
    entry: [
        __dirname + '/assets/styles/index.scss',
        __dirname + '/assets/js/index.js'
    ],
    output: {
        path: path.resolve(__dirname, 'public'),
    },
    devtool: 'inline-source-map',
    watch: true,
    module: {
        rules: [
            {
                test: /\.scss$/,
                exclude: /node_modules/,
                use: [
                    {
                        loader: 'file-loader',
                        options: { outputPath: path.resolve(__dirname, '/styles/'), name: 'bundled.min.css'}
                    },
                    'sass-loader'
                ]
            }
        ]
    }
};
