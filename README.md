# Webfonts Module

Provide webfonts integration for SilverStripe CMS allowing fonts inside HTMLEditorField and frontend.

## Requirements

- silverstripe/framework ^4.0

## Installation
Composer is the recommended way of installing SilverStripe modules.
```
$ composer require gorriecoe/silverstripe-webfonts
```

## Documentation

### TypeKit
Define the TypeKitID in config.yaml
```
gorriecoe\Webfonts\View\Webfonts:
  TypeKitID: '######'
```

One of the following can be used in page template:
- `$TypeKitScript`: Returns javascript embed code.
- `$TypeKitStyle`: Returns style link code.
- `$TypeKitID`: Returns the Typekit kit ID.
- `$WebFontLoader`: Returns [web font loader](https://github.com/typekit/webfontloader) embed code.

#### Example
```html
<head>
    <title>Example.com</title>
    {$TypeKitScript}
</head>
```

### Google Fonts
Define the GoogleFonts in config.yaml
```
gorriecoe\Webfonts\View\Webfonts:
  GoogleFonts:
    - 'Droid Sans'
    - 'Droid Serif:bold'
```

One of the following can be used in page template:
- `$GoogleFonts`: Returns style link code.
- `$WebFontLoader`: Returns [web font loader](https://github.com/typekit/webfontloader) embed code.

#### Example
```html
<head>
    <title>Example.com</title>
    {$GoogleFonts}
</head>
```

### Fonts.com
Define the FontsComID in config.yaml
```
gorriecoe\Webfonts\View\Webfonts:
  FontsComID: '######'
```

One of the following can be used in page template:
- `$FontsCom`: Returns javascript link code.
- `$FontsComID`: Returns the Font.com project ID.
- `$WebFontLoader`: Returns [web font loader](https://github.com/typekit/webfontloader) embed code.

#### Example
```html
<head>
    <title>Example.com</title>
    {$FontsCom}
</head>
```

### Multiple font providers
Define the options as listed above in config.yaml
```
gorriecoe\Webfonts\View\Webfonts:
  TypeKitID: '######'
  GoogleFonts:
    - 'Droid Sans'
    - 'Droid Serif:bold'
```

`$WebFontLoader` returns [web font loader](https://github.com/typekit/webfontloader) embed code is the recommended variable used in page template for handling multiple font providers.

#### Example
```html
<head>
    <title>Example.com</title>
    {$WebFontLoader}
</head>
```

### Custom Fonts
Define the CustomFonts in config.yaml
```
gorriecoe\Webfonts\View\Webfonts:
  CustomFonts:
    'MyFont:Bold,Italic': '/fonts.css'
    'FontAwesome': '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css'
```

`$WebFontLoader` can be used in page template to return [web font loader](https://github.com/typekit/webfontloader) embed code.
