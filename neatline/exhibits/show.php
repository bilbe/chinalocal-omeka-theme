<?php

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2014 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

?>

<?php echo head(array(
  'title' => nl_getExhibitField('title'),
  'bodyclass' => 'neatline show'
)); ?>

<!-- Exhibit title: -->
<h1><?php echo nl_getExhibitField('title'); ?></h1>

<!-- "View Fullscreen" link: -->
<?php echo nl_getExhibitLink(
  null, 'fullscreen', __('View Fullscreen'), array('class' => 'nl-fullscreen')
); ?>

<!-- Exhibit and description : -->
<?php echo nl_getExhibitMarkup(); ?>
<?php if (nl_getExhibitField('narrative')): ?>
<!-- Narrative -->
<div id="neatline-narrative" class="narrative">
  <!-- Content. -->
  <h1><?php echo nl_getExhibitField('title'); ?></h1>
  <?php echo nl_getExhibitField('narrative'); ?>
</div>
<?php endif; ?>
<?php if ($neatlineExhibitAttribution = get_theme_option('Neatline Attribution')): ?>
  <div id="neatline-attribution">
    <?php $neatline_exhibit = nl_getExhibit(); ?>
    <?php $owner_name = dh_get_user_by_id($neatline_exhibit->owner_id)['name']; ?>
    <?php $attribution_label = get_theme_option('Neatline Attribution Label'); ?>
    <?php echo "$attribution_label $owner_name"; ?>
  </div>
<?php endif; ?>
<script type="text/javascript">
jQuery(document).ready(function() {
  panZoom = jQuery(".olControlPanZoom")[0];
  panZoom.style.left=null;
});
</script>
<?php echo foot(); ?>
