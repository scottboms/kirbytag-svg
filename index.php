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

// kirby version compatibility check
$version = App::version() ?? '0.0.0';

if (version_compare($version, '6.0.0-alpha.1', '<') || version_compare($version, '8.0.0', '>=')) {
  throw new Exception('SVG Tag requires Kirby v6');
}

Kirby::plugin('scottboms/kirbytag-svg', [
  'info' => [
    'homepage' => 'https://github.com/scottboms/kirbytag-svg',
    'version' => '6.0.0',
  ],
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
]);
