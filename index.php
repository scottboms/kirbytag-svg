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

// shamelessly borrowed from distantnative/retour-for-kirby
if (
	version_compare(App::version() ?? '0.0.0', '6.0.0', '<') === true ||
	version_compare(App::version() ?? '0.0.0', '7.0.0', '>=') === true
) {
	throw new Exception('SVG Kirbytag requires Kirby v6');
}

Kirby::plugin(
  name: 'scottboms/kirbytag-svg',
  info: [
    'homepage' => 'https://github.com/scottboms/kirbytag-svg'
  ],
  version: '6.0.0',
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
          $string = $tag->value;
          $svg = $tag->file($string) ?? $string;
          $wrapper = $tag->wrapper ?? option('scottboms.kirbytag-svg.wrapper');
          $class = $tag->class;
          $role = $tag->role;

          $args = array(
            'svg' => $svg,
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
