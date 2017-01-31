<?php

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2014 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */


 	$snippet = false;

?>

<?php
if(metadata('item','item_type_name')=='Taggregator'):
  # If the item is a Placeholder, display the exhibit listing.
  $primary_tag = metadata('item',array('Item Type Metadata','Primary Tag'));
  error_log( "Primary Tag: " . print_r($primary_tag, 1) );

  $items = get_records('Item', array('tags'=>$primary_tag), 30);
  error_log( "Size Of: " . print_r(sizeof($items), 1) );

  if (count($items) > 0): ?>
    <?php foreach ($items as $item): ?>
      <div class="item-group-item">
      	<h3><?php echo link_to_item(metadata($item,array('Dublin Core', 'Title')),array(),'show',$item); ?></h3>
      	<?php if (metadata($item, 'has thumbnail')): ?>
        	<div class="item-img">
        	    <?php echo link_to_item(item_image('fullsize',array(),0,$item),array(),'show',$item); ?>
        	</div>
      	<?php endif; ?>
      	<div class="item-description">
      		<?php
      			$description = metadata($item,array('Dublin Core','Description'));
      			if ($snippet) {
      				$description = snippet($description,0,$snippet);
      			}
      			echo $description; ?>
      	</div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>


<?php else: ?>
  <?php if (metadata('item', 'has files')): ?>
    <h3><?php echo __('Files'); ?></h3>
    <?php if (get_theme_option('Show Item File Gallery') == 0): ?>
      <?php echo dh_files_for_item(array('imageSize' => 'fullsize', 'linkAttributes'=>array('data-lightbox'=>'file-gallery'))); ?>
    <?php else: ?>
      <?php echo dh_files_for_item(
        array(
          'imageSize' => 'square_thumbnail',
          'linkAttributes'=>array('data-lightbox'=>'file-gallery')
        ),
        array(
          'class'=>'gallery-item item-file'
        )
      ); ?>
    <?php endif; ?>
  <?php endif; ?>


  <hr />

  <!-- Texts. -->
  <?php echo all_element_texts('item'); ?>

  <!-- Link. -->
  <?php echo link_to(
    get_current_record('item'), 'show', 'View the item in Omeka'
  ); ?>

<?php endif; ?>
