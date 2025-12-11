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
	version_compare(App::version() ?? '0.0.0', '5.0.0', '<') === true ||
	version_compare(App::version() ?? '6.0.0', '7.0.0', '>=') === true
) {
	throw new Exception('SVG Kirbytag requires Kirby v6 or v7');
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
