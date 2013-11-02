<?php
/**
 * Implements hook_form_system_theme_settings_alter().
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function d7theme_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL)  {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }

  // Create the form using Forms API: http://api.drupal.org/api/7

  /* -- Delete this line if you want to use this setting
  $form['STARTERKIT_example'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('STARTERKIT sample setting'),
    '#default_value' => theme_get_setting('STARTERKIT_example'),
    '#description'   => t("This option doesn't do anything; it's just an example."),
  );
  // */

  // Remove some of the base theme's settings.
  /* -- Delete this line if you want to turn off this setting.
  unset($form['themedev']['zen_wireframes']); // We don't need to toggle wireframes on this site.
  // */

 // We are editing the $form in place, so we don't need to return anything.

   $form['d7theme_responsive_settings'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Responsive app settings'),
  );

  $form['d7theme_responsive_settings']['d7theme_responsive_js_framework'] = array(
    '#type'          => 'radios',
    '#title'         => t('Choose a responsive javascript framework.'),
    '#default_value' => theme_get_setting('d7theme_responsive_js_framework'),
    '#options'       => array(
                          '1' => t('Simple State Manager (viewport width only)'),
                          '0' => t('Enquire.js (any media query type) w/ mediaMatch polyfill '),
                        ),
  );

 $form['d7theme_settings'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Additionally custom theme settings'),
  );

  $form['d7theme_settings']['d7theme_ms_tile_color'] = array(
    '#type'          => 'textfield',
    '#field_prefix'  => '#',
    '#title' => t('Meta tag color used for Windows background tile'),
    '#default_value' => theme_get_setting('d7theme_ms_tile_color'),
    '#size'          => 6,
    '#maxlength'     => 6,
  );
  $form['d7theme_settings']['d7theme_easing'] = array(
    '#type'          => 'radios',
    '#title'         => t('Add jQuery Easing plugin.'),
    '#default_value' => theme_get_setting('d7theme_easing'),
    '#options'       => array(
                          '1' => t('Add jQuery Easing.'),
                          '0' => t('Do not add.'),
                        ),
  );
  $form['d7theme_settings']['d7theme_scroll'] = array(
    '#type'          => 'radios',
    '#title'         => t('Add Smooth Scroll plugin.'),
    '#default_value' => theme_get_setting('d7theme_scroll'),
    '#options'       => array(
                          '1' => t('Add Smooth Scrolling'),
                          '0' => t('Do not add.'),
                        ),
  );
  $form['d7theme_settings']['d7theme_to_top'] = array(
    '#type'          => 'radios',
    '#title'         => t('Add Scroll to top button.'),
    '#default_value' => theme_get_setting('d7theme_to_top'),
    '#options'       => array(
                          '1' => t('Add To Top Button'),
                          '0' => t('Do not add.'),
                        ),
  );

  // Custom option for toggling the main content blog on the front page.
  $form['d7theme_settings']['d7theme_toggle_front_page_content'] = array(
    '#type' => 'checkbox',
    '#title' => t('Front page content'),
    '#description' => t('Allow the main content block to be rendered on the front page.'),
    '#default_value' => theme_get_setting('d7theme_toggle_front_page_content'),
  );

  $form['d7theme_settings']['d7theme_browser_width_indicator'] = array(
    '#type' => 'checkbox',
    '#title' => t('Browser width indicator'),
    '#description' => t('Adds a small box at the bottom of the browser window that displays the current width of the browser window. This can be very useful when writing media queries for a responsive website.'),
    '#default_value' => theme_get_setting('d7theme_browser_width_indicator'),
  );
  $form['d7theme_settings']['d7theme_conditional_classes_html'] = array(
    '#type' => 'checkbox',
    '#title' => t('Add conditional classes for Internet Explorer'),
    '#description' => t('Adds conditional classes (for Internet Explorer) to the &lt;html&gt;.'),
    '#default_value' => theme_get_setting('d7theme_conditional_classes_html'),
  );

}
