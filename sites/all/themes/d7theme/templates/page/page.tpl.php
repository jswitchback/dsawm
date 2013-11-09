<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region, below the main menu (if any).
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>

<div id="page">

  <?php
   // Render the regions to see if there's anything in them.
   $highlighted    = render($page['highlighted']);
   $sidebar_first  = render($page['sidebar_first']);
   $sidebar_second = render($page['sidebar_second']);
   $content_top  = render($page['content_top']);
   $content_bottom  = render($page['content_bottom']);
   $mobile_sidebar = render($page['mobile_sidebar']);
   $theming_sidebar= render($page['theming_sidebar']);
  ?>

 <div id= "header-wrapper">
    <header id="header" role="banner">
    <div id="logo-wrapper">
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">Home</a>
    </div>
      <?php print render($page['header']); ?>
      
      <?php if ($site_name || $site_slogan): ?>
      <div class="header__name-and-slogan" id="name-and-slogan">
        <?php if ($site_name): ?>
          <h1 class="header__site-name" id="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div class="header__site-slogan" id="site-slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>
      </div>
      <?php endif; ?>

      <?php if ($secondary_menu): ?>
      <nav class="header__secondary-menu" id="secondary-menu" role="navigation">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => $secondary_menu_heading,
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </nav>
      <?php endif; ?>

      <div id="mobile-nav-toggle">
          <a href="#navigation" id="menu-toggle" class="nav-button">
            <span class="toggle-bar"></span>
            <span class="toggle-bar"></span>
            <span class="toggle-bar"></span>
          </a>
      </div>
      <div id="navigation">

      <?php print render($page['navigation']); ?>

      <?php if ($main_menu): ?>
        <nav id="main-menu" role="navigation" tabindex="-1">
          <?php
          // This code snippet is hard to modify. We recommend turning off the
          // "Main menu" on your sub-theme's settings form, deleting this PHP
          // code block, and, instead, using the "Menu block" module.
          // @see https://drupal.org/project/menu_block
          print theme('links__system_main_menu', array(
            'links' => $main_menu,
            'attributes' => array(
              'class' => array('links', 'inline', 'clearfix'),
            ),
            'heading' => array(
              'text' => t('Main menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
        </nav>
      <?php endif; ?>

      </div><!-- /#navigation -->

    </header>
  </div><!-- /#header-wrapper -->

  <?php if ($highlighted): ?>
    <?php print $highlighted; ?>
  <?php endif; ?>
  <div id="main-wrapper">
    <div id="main">

      <div id="content" class="column" role="main">
        <?php print render($page['highlighted']); ?>
        <?php print $breadcrumb; ?>
        <?php if ($sidebar_first): ?>
        <div id="nav-inner">
          <a id="sidebar-toggle" href="#sidebar-first"> MORE</a>
        </div>
        <?php endif; ?>
        <a id="main-content"></a>
        <?php if (!$is_front): ?>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
          <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php endif; ?>
        <?php print $messages; ?>
        <?php print render($tabs); ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content_top']); ?>
        <?php print render($page['content']); ?>
        <?php if ($sidebar_second): ?>
          <aside id="sidebar-second" class="sidebar-second" role="complementary">
           <?php print $sidebar_second; ?>
          </aside><!-- /.sidebar-second -->
        <?php endif; ?>
        <?php print render($page['front_content']); ?>
        <?php if (!$is_front): ?>
        <?php print $feed_icons; ?>
        <?php endif; ?>
      </div><!-- /#content -->

      <?php if ($sidebar_first): ?>
        <aside id="sidebar-first" class="sidebar-first" role="complementary">
          <?php print $sidebar_first; ?>
        </aside><!-- /.sidebar-first -->
      <?php endif; ?>

    </div><!-- /#main -->
  </div><!-- /#main-wrapper -->


  <?php print render($page['footer']); ?>

  <?php if ($add_to_top == 1): ?>
    <a id="toTop" href="#">TO TOP</a>
  <?php endif; ?>

</div><!-- /#page -->

<?php if ($mobile_sidebar): ?>
  <section id="mobile-sidebar">
    <a href="#page" id="menu-close" class="nav-button">X</a>
    <?php print $mobile_sidebar; ?>
  </section>
<?php endif; ?>

<?php if ($theming_sidebar && $is_admin): ?>
  <div id="theming-sidebar" class="off-canvas">
    <span id="theming-tab"></span>
    <?php print $theming_sidebar ; ?>
  </div>
<?php endif; ?>

<?php print render($page['bottom']); ?>
