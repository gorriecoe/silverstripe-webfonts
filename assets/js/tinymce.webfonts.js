/*global window */
(function (window) {
    'use strict';

    window.tinymce.create('tinymce.plugins.WebfontsPlugin', {
        init: function (editor, url) {
            editor.on('init', function(args) {
                let doc = editor.getDoc(),
                    head = doc.getElementsByTagName('head')[0],
                    js = "//<![CDATA[WebFont.load($Config);//]]>",
                    library = doc.createElement("script"),
                    script = doc.createElement("script"),
                    type = "application/javascript";

                library.type = type;
                library.src = "$Library";
                head.appendChild(library);

                script.type = type;
                script.appendChild(doc.createTextNode(js));
                head.appendChild(script);
            });
        }
    });

    // Register plugins
    window.tinymce.PluginManager.add('webfonts', window.tinymce.plugins.WebfontsPlugin);
}(window));
