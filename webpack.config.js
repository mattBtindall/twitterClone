const path = require('path');

module.exports = {
    entry: [
        __dirname + '/assets/styles/index.scss'
    ],
    output: {
        path: path.resolve(__dirname, 'public'),
    },
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
