<?php

//namespace scottboms\kirbytag-svg;

/**
 * Kirby SVG KirbyTag
 *
 * @version 1.0.2
 * @author Scott Boms <plugins@scottboms.com>
 * @copyright Scott Boms <plugins@scottboms.com>
 * @link https://github.com/scottboms/kirbytag-svg
 * @license MIT
**/

Kirby::plugin('scottboms/kirbytag-svg', [
  'tags' => [
    'svg' => [
      'attr' => [
        'wrapper',
        'class',
        'role'
      ],
      'html' => function($tag) {
        $html = '';
        // Variables to hold tag options
        $svg_url = $tag->svg;
        $wrapper = $tag->wrapper;
        $class = $tag->class;
        $role = $tag->role;

        if($wrapper == '') {
          // If no wrapper attribute is found, output the SVG without a
          // wrapper element and ignore associated options if present
          $html .= svg($svg_url);
        } else {
          // If a wrapper option has been specified, prepend the svg element
          // with that element and its associated class and role options
          $html .= '<' . $wrapper . ' class="' . $class . '" role="' . $role . '">';
          $html .= svg($svg_url);
          $html .= '</' . $wrapper . '>';
        }

        return $html;
      }
    ]
  ]
]);