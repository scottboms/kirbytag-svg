<?php

//namespace scottboms\kirbytag-svg;

/**
 * Kirby SVG KirbyTag
 *
 * @author Scott Boms <plugins@scottboms.com>
 * @link https://github.com/scottboms/kirbytag-svg
 * @license MIT
**/

use Kirby\Cms\App;
use Kirby\Cms\File;
use Kirby\Toolkit\F;

// shamelessly borrowed from distantnative/retour-for-kirby
if (
	version_compare(App::version() ?? '0.0.0', '4.0.1', '<') === true ||
	version_compare(App::version() ?? '0.0.0', '6.0.0', '>=') === true
) {
	throw new Exception('SVG Kirbytag requires Kirby v4 or v5');
}

Kirby::plugin(
  name: 'scottboms/kirbytag-svg', 
  info: [
    'homepage' => 'https://github.com/scottboms/kirbytag-svg'
  ],
  version: '1.1.4',
  extends: [
    'snippets' => [
      'svgtag' => __DIR__ . '/snippets/svg.php'
    ],
    'options' => [
      'wrapper' => 'figure'
    ],
    'tags' => [
      'svg' => [
        'attr' => [
          'wrapper',
          'class',
          'role'
        ],
        'html' => function($tag) {
          $pattern = '/\//'; // identify path strings

          $string = $tag->value;

          if (preg_match($pattern, $string)) {
            $file = $tag->svg;
          } else {
            $file = $tag->parent()->file($tag->value);          
          }

          $svgurl = $file;
          $wrapper = $tag->wrapper ?? option('scottboms.kirbytag-svg.wrapper');
          $class = $tag->class;
          $role = $tag->role;

          $args = array(
            'svg' => $svgurl,
            'wrapper' => $wrapper,
            'class' => $class,
            'role' => $role,
            'string' => $string
          );

          $snippet = 'svgtag';
          $svg = snippet($snippet, $args, true);

          return $svg;
        }
      ]
    ]
  ]
);