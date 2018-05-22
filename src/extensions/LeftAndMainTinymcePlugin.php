<?php

namespace gorriecoe\Webfonts\Extensions;

use gorriecoe\Webfonts\View\Webfonts;
use SilverStripe\View\Requirements;
use SilverStripe\Admin\LeftAndMainExtension;

/**
 * Include the TinyMCE TypeKit plugin with the CMS configured TypeKit ID.
 */
class LeftAndMainTinymcePlugin extends LeftAndMainExtension
{
    public function init()
    {
        if ($config = Webfonts::WebFontLoaderConfig()) {
            Requirements::javascriptTemplate(
                'gorriecoe/silverstripe-webfonts: assets/js/tinymce.webfonts.js',
                [
                    'Library' => Webfonts::WebFontLoaderLibrary(),
                    'Config' => $config
                ]
            );
        }
    }
}
