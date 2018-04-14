<?php

use SilverStripe\Forms\HTMLEditor\HTMLEditorConfig;
use SilverStripe\Core\Manifest\ModuleResourceLoader;

// Enable the Webfont TinyMCE plugin by default.
HtmlEditorConfig::get('cms')->enablePlugins([
    'webfonts' => ModuleResourceLoader::singleton()->resolvePath(
        'gorriecoe/silverstripe-webfonts: assets/js/tinymce.webfontsdummy.js'
    )
]);
