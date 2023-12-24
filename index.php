<?php

//namespace scottboms\kirbytag-svg;

/**
 * Kirby SVG KirbyTag
 *
 * @version 1.0.0
 * @author Scott Boms <plugins@scottboms.com>
 * @copyright Scott Boms <plugins@scottboms.com>
 * @link https://github.com/scottboms/kirbytag-svg
 * @license GNU GPLv3
**/

Kirby::plugin('scottboms/kirbytag-svg', [
  'tags' => [
    'svg' => [
      'html' => function($tag) {
        $icon_url = $tag->value();
        return svg($icon_url);
      }
    ]
  ]
]);