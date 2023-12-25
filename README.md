# SVG Kirbytag

A kirbytag for processing SVGs within kirbytags and outputting inline SVG code.

## Installation

## Download

Download and copy this repository to `/site/plugins/kirbytag-svg`.

## Usage

`(svg: yourfile.svg)`

Optionally, you can specify an element to wrap the SVG along with class and role attributes that will be applied to that element. If `class` or `role` attributes are included but no `wrapper` element, these will be ignored.

### Optional Tag Attributes

* `wrapper`: A wrapper element to surround the SVG when output in your template [optional]
* `class`: A CSS class/classes to append to the wrapper element [optional]
* `role`: A role attribute appended to the wrapper element [optional]

Example usage: `(svg: yourfile.svg wrapper: figure class: svg role: img)` 

## Compatibility

* Kirby 3.5+
* Kirby 4+

## License

GNU GPLv3
