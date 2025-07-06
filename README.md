# SVG Kirbytag

![Plugin Preview](src/assets/svg-tag-plugin.jpg)

A kirbytag for outputting SVG images inline with a number of customizable attributes.

## Requirements

- [**Kirby**](https://getkirby.com/)

## Installation

### [Kirby CLI](https://github.com/getkirby/cli)

```
kirby plugin:install scottboms/kirbytag-svg
```

### Git Submodule

```
$ git submodule add https://github.com/scottboms/kirbytag-svg.git site/plugins/kirbytag-svg
```

### Copy and Paste

1. [Download](https://github.com/scottboms/kirbytag-svg/archive/master.zip) the contents of this repository as a Zip file.
2. Rename the extracted folder to `kirbytag-svg` and copy it into the `site/plugins/` directory in your Kirby project.

## Usage

`(svg: yourfile.svg)`

Optionally, you can specify a custom `wrapper` element to wrap the SVG along with class and role attributes that will be applied to that element. If `class` or `role` attributes are included but no `wrapper` element, a 'figure' element will be used.

### Optional Tag Attributes

* `wrapper`: A wrapper element to surround the SVG when output in your template [optional]
* `class`: A CSS class/classes to append to the wrapper element [optional]
* `role`: A role attribute appended to the wrapper element [optional]

#### Example usage: 

```
(svg: /img/deke.svg)
(svg: lerxst.svg wrapper: figure class: svg role: img)
(svg: /assets/icons/pratt.svg wrapper: div class: icon)
```

## Configuration Options

You can add a default wrapper element to SVGs using the provided config option that can be added to your `config.php` file as shown.

```php
<?php
	return [
		'scottboms.kirbytag-svg.wrapper' => 'div',
	]
```

## Compatibility

* Kirby 3.5+
* Kirby 4.x
* Kirby 5.x

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please create [a new issue](issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

You are prohibited from using this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.
