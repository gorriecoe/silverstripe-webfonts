<?php

namespace gorriecoe\Webfonts\Extensions;

use SilverStripe\Core\Config\Config;
use SilverStripe\View\Requirements;
use SilverStripe\Admin\LeftAndMainExtension;

/**
 * Include the TinyMCE TypeKit plugin with the CMS configured TypeKit ID.
 */
class LeftAndMainTinymcePlugin extends LeftAndMainExtension
{
    public function init()
    {
        $typekitID = Config::inst()->get('Webfonts', 'TypeKitID');
        if (isset($typekitID)) {
            Requirements::javascriptTemplate(
                'gorriecoe/silverstripe-webfonts: /assets/js/tinymce.webfonts.js',
                array(
                    'TypeKitID' => $typekitID
                )
            );
        }
    }
}
