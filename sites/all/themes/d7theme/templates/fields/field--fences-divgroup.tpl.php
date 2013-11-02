<?php
/**
 * @file field--fences-divgroup.tpl.php
 * Wrap each field value in the <divgroup> element.
 *
 * @see http://developers.whatwg.org/grouping-content.html#the-div-element
 */
?>

<div class="<?php print $classes; ?>-wrapper">
<?php if ($element['#label_display'] == 'inline'): ?>
  <span class="field-label"<?php print $title_attributes; ?>>
    <?php print $label; ?>:
  </span>
<?php elseif ($element['#label_display'] == 'above'): ?>
  <h3 class="field-label"<?php print $title_attributes; ?>>
    <?php print $label; ?>
  </h3>
<?php endif; ?>

<?php foreach ($items as $delta => $item): ?>
  <div class="<?php print $classes; ?>"<?php print $attributes; ?>>
    <?php print render($item); ?>
  </div>  
<?php endforeach; ?>
</div>