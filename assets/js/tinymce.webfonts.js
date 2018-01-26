/*global window */
(function (window) {
    'use strict';

    window.tinymce.create('tinymce.plugins.WebfontsPlugin', {
        init: function (editor) {
            const type = "application/javascript";
            editor.on('PreInit', function(args) {
                let doc = editor.getDoc(),
                    library = doc.createElement("script");
                library.type = type;
                library.src = "$Library";
                doc.getElementsByTagName('head')[0].appendChild(library);
            }).on('Init', function(args) {
                let doc = editor.getDoc(),
                    script = doc.createElement("script");
                script.type = type;
                script.appendChild(doc.createTextNode("//<![CDATA[\nWebFont.load($Config);\n//]]>"));
                doc.getElementsByTagName('head')[0].appendChild(script);
            });
        }
    });
    // Register plugins
    window.tinymce.PluginManager.add('webfonts', window.tinymce.plugins.WebfontsPlugin);
}(window));
