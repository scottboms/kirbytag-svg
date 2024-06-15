<?php

//namespace scottboms\kirbytag-svg;

/**
 * Kirby SVG KirbyTag
 *
 * @author Scott Boms <plugins@scottboms.com>
 * @link https://github.com/scottboms/kirbytag-svg
 * @license MIT
**/

use Kirby\Cms\File;
use Kirby\Toolkit\F;

Kirby::plugin(
  name: 'scottboms/kirbytag-svg', 
  info: [
    'homepage' => 'https://github.com/scottboms/kirbytag-svg'
  ],
  version: '1.1.2',
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