<?php

use SilverStripe\Forms\HTMLEditor\HTMLEditorConfig;
// Enable the Webfont TinyMCE plugin by default.
HtmlEditorConfig::get('cms')->enablePlugins(['webfont' => null]);
