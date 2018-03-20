<?php

namespace gorriecoe\Webfonts\View;

use SilverStripe\Core\Config\Config;
use SilverStripe\Core\Convert;
use SilverStripe\View\TemplateGlobalProvider;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;

/**
 * Provide $TypeKit global template variable for inserting TypeKit javascript.
 */
class Webfonts implements TemplateGlobalProvider
{
    private static $WebfontLoaderVersion = '1.6.26';

    public static function get_template_global_variables()
    {
        return array(
            'WebFontLoader' => array(
                'method'  => 'WebFontLoader',
                'casting' => 'HTMLFragment'
            ),
            'TypeKitID' => array(
                'method'  => 'TypeKitID',
                'casting' => 'Text'
            ),
            'TypeKitScript' => 'TypeKitScript',
            'TypeKitStyle' => array(
                'method'  => 'TypeKitStyle',
                'casting' => 'HTMLFragment'
            ),
            'FontsComID' => array(
                'method'  => 'FontsComID',
                'casting' => 'Text'
            ),
            'FontsCom' => 'FontsCom',
            'GoogleFonts' => 'GoogleFonts'
        );
    }

    public static function WebFontLoader()
    {
        $config = SELF::WebFontLoaderConfig();
        Requirements::javascript(SELF::WebFontLoaderLibrary());
        Requirements::customScript("WebFont.load({$config});");
    }

    public static function WebFontLoaderLibrary()
    {
        $webfontLoaderVersion = Config::inst()->get(__CLASS__, 'WebfontLoaderVersion') ?: '1';
        return "https://ajax.googleapis.com/ajax/libs/webfont/{$webfontLoaderVersion}/webfont.js";
    }

    public static function WebFontLoaderConfig()
    {
        extract(Config::inst()->get(__CLASS__));
        $config = [];
        if (isset($TypeKitID) && $TypeKitID) {
            $config['typekit']['id'] = $TypeKitID;
        }
        if (isset($FontsComID) && $FontsComID) {
            $config['monotype']['projectId'] = $FontsComID;
        }
        if (isset($GoogleFonts) && Count($GoogleFonts)) {
            $config['google']['families'] = $GoogleFonts;
        }
        if (isset($CustomFonts) && Count($CustomFonts)) {
            $config['custom'] = [
                'families' => array_keys($CustomFonts),
                'urls' => array_values($CustomFonts)
            ];
        }
        $webFontLoaderVersion = isset($WebfontLoaderVersion) ? $WebfontLoaderVersion: '1';
        return Convert::array2json($config);
    }

    public static function TypeKitID()
    {
        return Config::inst()->get(__CLASS__, 'TypeKitID');
    }

    public static function TypeKitScript()
    {
        if ($typekitID = Config::inst()->get(__CLASS__, 'TypeKitID')) {
            Requirements::customScript(
                ArrayData::create([
                    'TypeKitID' => $typekitID
                ])->renderWith([
                    'type' => 'Includes',
                    'TypeKitScript'
                ])
            );
        }
    }

    public static function TypeKitStyle()
    {
        if ($typekitID = Config::inst()->get(__CLASS__, 'TypeKitID')) {
            Requirements::css("https://use.typekit.net/{$typekitID}.css");
        }
    }

    public static function FontsComID()
    {
        return Config::inst()->get(__CLASS__, 'FontsComID');
    }

    public static function FontsCom()
    {
        if ($fontscomID = Config::inst()->get(__CLASS__, 'FontsComID')) {
            Requirements::script("https://fast.fonts.net/jsapi/{$fontscomID}.js");
        }
    }

    public static function GoogleFonts()
    {
        $googleFonts = Config::inst()->get(__CLASS__, 'GoogleFonts');
        if ($googleFonts && Count($googleFonts)) {
            $googleFonts = implode('|', $googleFonts);
            Requirements::css("https://fonts.googleapis.com/css?family={$googleFonts}");
        }
    }
}
