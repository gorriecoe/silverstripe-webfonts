<?php

namespace gorriecoe\Webfonts\Extensions;

use gorriecoe\Webfonts\View\Webfonts;
use SilverStripe\Core\Config\Config;
use SilverStripe\View\Requirements;
use SilverStripe\Admin\LeftAndMainExtension;
use SilverStripe\Core\Manifest\ModuleResourceLoader;

/**
 * Include the TinyMCE TypeKit plugin with the CMS configured TypeKit ID.
 */
class LeftAndMainTinymcePlugin extends LeftAndMainExtension
{
    public function init()
    {
        // Temporary fix until ModuleResourceLoader is added to Requirements::javascriptTemplate
        $file = ModuleResourceLoader::singleton()->resolvePath('gorriecoe/silverstripe-webfonts: assets/js/tinymce.webfonts.js');
        Requirements::javascriptTemplate(
            $file,
            [
                'Library' => Webfonts::WebFontLoaderLibrary(),
                'Config' => Webfonts::WebFontLoaderConfig()
            ]
        );
    }
}
