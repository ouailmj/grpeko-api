let Encore = require('@symfony/webpack-encore');

let websiteJS = [
    './web/website/asset/js/script.js'
];

let websiteCSS = [
    './web/website/asset/css/style.css',
    './web/website/asset/css/bootstrap.min.css',
    './web/website/asset/css/font-awesome.min.css',
    './web/website/asset/css/responsive.css'
];

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .addEntry('website/js/script', websiteJS)
    .addEntry('js/pages/quotation', './front-app/pages/quotation-page.js')
    .addEntry('js/pages/setting-quotation', './front-app/pages/quotation-setting-page.js')
    .addStyleEntry('website/css/style', websiteCSS)
    .enableVersioning(false)
    // .enableSassLoader()
    .enableReactPreset()
    .autoProvidejQuery()
    // .addPlugin(new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/))
    .enableSourceMaps(!Encore.isProduction())
;

module.exports = {
    module: {
        loaders: [
            { test: /\.css$/, loader: "style-loader!css-loader" },
            // ...
        ]
    }
};

let config = Encore.getWebpackConfig();


module.exports = config;