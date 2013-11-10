<?php
/**
 * @file
 * contexts_feature.context.inc
 */

/**
 * Implements hook_context_default_contexts().
 */
function contexts_feature_context_default_contexts() {
  $export = array();

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'category_landing';
  $context->description = 'This is the category landing page for each of the terms';
  $context->tag = '';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'resources/*' => 'resources/*',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'views-resrource_types-block_1' => array(
          'module' => 'views',
          'delta' => 'resrource_types-block_1',
          'region' => 'content_top',
          'weight' => '-10',
        ),
        'views-resources-block_1' => array(
          'module' => 'views',
          'delta' => 'resources-block_1',
          'region' => 'content',
          'weight' => '-10',
        ),
        'views-promotions-block_1' => array(
          'module' => 'views',
          'delta' => 'promotions-block_1',
          'region' => 'content',
          'weight' => '-9',
        ),
        'views-promotions-block' => array(
          'module' => 'views',
          'delta' => 'promotions-block',
          'region' => 'sidebar_first',
          'weight' => '-10',
        ),
        'views-resrource_types-block_2' => array(
          'module' => 'views',
          'delta' => 'resrource_types-block_2',
          'region' => 'sidebar_first',
          'weight' => '-9',
        ),
      ),
    ),
    'theme' => array(
      'title' => '<none>',
      'subtitle' => '',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('This is the category landing page for each of the terms');
  $export['category_landing'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'resources_landing';
  $context->description = 'Resources Landing Page';
  $context->tag = '';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        '<front>' => '<front>',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'dsawm_custom-landing_header' => array(
          'module' => 'dsawm_custom',
          'delta' => 'landing_header',
          'region' => 'content',
          'weight' => '-10',
        ),
        'views-resrource_types-block' => array(
          'module' => 'views',
          'delta' => 'resrource_types-block',
          'region' => 'content',
          'weight' => '-9',
        ),
      ),
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('Resources Landing Page');
  $export['resources_landing'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'sitewide';
  $context->description = '';
  $context->tag = '';
  $context->conditions = array(
    'sitewide' => array(
      'values' => array(
        1 => 1,
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'menu_block-1' => array(
          'module' => 'menu_block',
          'delta' => '1',
          'region' => 'navigation',
          'weight' => '-10',
        ),
        'dsawm_custom-footer_old' => array(
          'module' => 'dsawm_custom',
          'delta' => 'footer_old',
          'region' => 'footer',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;
  $export['sitewide'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'sitewide_except_front';
  $context->description = '';
  $context->tag = '';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        '~<front>' => '~<front>',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'system-main' => array(
          'module' => 'system',
          'delta' => 'main',
          'region' => 'content',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;
  $export['sitewide_except_front'] = $context;

  return $export;
}
