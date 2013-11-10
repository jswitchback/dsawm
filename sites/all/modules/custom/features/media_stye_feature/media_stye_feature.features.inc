<?php
/**
 * @file
 * media_stye_feature.features.inc
 */

/**
 * Implements hook_image_default_styles().
 */
function media_stye_feature_image_default_styles() {
  $styles = array();

  // Exported image style: category_large.
  $styles['category_large'] = array(
    'name' => 'category_large',
    'label' => 'category_large',
    'effects' => array(
      2 => array(
        'label' => 'Scale and crop',
        'help' => 'Scale and crop will maintain the aspect-ratio of the original image, then crop the larger dimension. This is most useful for creating perfectly square thumbnails without stretching the image.',
        'effect callback' => 'image_scale_and_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_resize_form',
        'summary theme' => 'image_resize_summary',
        'module' => 'image',
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 250,
          'height' => 205,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: category_small.
  $styles['category_small'] = array(
    'name' => 'category_small',
    'label' => 'category_small',
    'effects' => array(
      1 => array(
        'label' => 'Scale and crop',
        'help' => 'Scale and crop will maintain the aspect-ratio of the original image, then crop the larger dimension. This is most useful for creating perfectly square thumbnails without stretching the image.',
        'effect callback' => 'image_scale_and_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_resize_form',
        'summary theme' => 'image_resize_summary',
        'module' => 'image',
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 200,
          'height' => 130,
        ),
        'weight' => 1,
      ),
    ),
  );

  return $styles;
}
