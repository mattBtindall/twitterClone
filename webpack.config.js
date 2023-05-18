const path = require('path');

module.exports = {
    entry: [
        __dirname + '/assets/styles/global.scss'
    ],
    output: {
        path: path.resolve(__dirname, 'public'),
    },
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
