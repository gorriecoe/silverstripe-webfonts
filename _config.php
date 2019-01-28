<?php

use SilverStripe\Forms\HTMLEditor\HTMLEditorConfig;
use SilverStripe\Core\Manifest\ModuleLoader;

// Parse out the composer package name, and load the module using SilverStripe.
$package = json_decode(file_get_contents(__DIR__.'/composer.json'));
$module = ModuleLoader::getModule($package->name);

// Enable the Webfont TinyMCE plugin by default.
HtmlEditorConfig::get('cms')->enablePlugins([
    'webfonts' => $module->getResource('assets/js/tinymce.webfontsdummy.js')
]);
