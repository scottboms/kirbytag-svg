<?php

//namespace scottboms\kirbytag-svg;

/**
 * Kirby SVG KirbyTag
 *
 * @version 1.1.0
 * @author Scott Boms <plugins@scottboms.com>
 * @copyright Scott Boms <plugins@scottboms.com>
 * @link https://github.com/scottboms/kirbytag-svg
 * @license MIT
**/

use Kirby\Cms\File;
use Kirby\Toolkit\F;

Kirby::plugin('scottboms/kirbytag-svg', [
  'snippets' => [
    'svgtag' => __DIR__ . '/snippets/svg.php'
  ],
  'tags' => [
    'svg' => [
      'attr' => [
        'wrapper',
        'class',
        'role'
      ],
      'html' => function($tag) {

        $file = $tag->parent()->file($tag->value);
        $fileurl = $file ? $file->url() : '';
        $wrapper = $tag->wrapper;
        $class = $tag->class;
        $role = $tag->role;

        $args = array(
          'svg' => $file,
          'svgurl' => $fileurl,
          'wrapper' => $wrapper,
          'class' => $class,
          'role' => $role
        );

        $snippet = 'svgtag';
        $svg = snippet($snippet, $args, true);

        return $svg;
      }
    ]
  ]
]);