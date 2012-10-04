<?php
  // Compatible with sf_escaping_strategy: true
  $constraints = isset($constraints) ? $sf_data->getRaw('constraints') : null;
  $description = isset($description) ? $sf_data->getRaw('description') : null;
  $dimensions = isset($dimensions) ? $sf_data->getRaw('dimensions') : null;
  $editable = isset($editable) ? $sf_data->getRaw('editable') : null;
  $item = isset($item) ? $sf_data->getRaw('item') : null;
  $itemId = isset($itemId) ? $sf_data->getRaw('itemId') : null;
  $name = isset($name) ? $sf_data->getRaw('name') : null;
  $options = isset($options) ? $sf_data->getRaw('options') : null;
  $pageid = isset($pageid) ? $sf_data->getRaw('pageid') : null;
  $permid = isset($permid) ? $sf_data->getRaw('permid') : null;
  $slot = isset($slot) ? $sf_data->getRaw('slot') : null;
  $slug = isset($slug) ? $sf_data->getRaw('slug') : null;
  $title = isset($title) ? $sf_data->getRaw('title') : null;
  $embed = isset($embed) ? $sf_data->getRaw('embed') : null;
  // Defaults true for backwards compatibility
  $stretch16x9 = isset($stretch16x9) ? $sf_data->getRaw('stretch16x9') : true;
  $thumbnailImage = isset($thumbnailImage) ? $sf_data->getRaw('thumbnailImage') : null;
  $thumbnailImageId = isset($thumbnailImageId) ? $sf_data->getRaw('thumbnailImageId') : null;
  
  if($thumbnailImage)
  {
    $thumbTitle = 'Change Thumbnail Image';
  }
  else
  {
    $thumbTitle = 'Choose Thumbnail Image';
  }
  
?>
<?php use_helper('a') ?>
<?php if ($editable): ?>
  <?php // Normally we have an editor inline in the page, but in this ?>
  <?php // case we'd rather use the picker built into the media plugin. ?>
  <?php // So we link to the media picker and specify an 'after' URL that ?>
  <?php // points to our slot's edit action. Setting the ajax parameter ?>
  <?php // to false causes the edit action to redirect to the newly ?>
  <?php // updated page. ?>

  <?php // Wrap controls in a slot to be inserted in a slightly different ?>
  <?php // context by the _area.php template ?>

  <?php // Very short labels so sidebar slots don't have wrap in their controls. ?>
  <?php // That spoils assumptions that are being made elsewhere that they will ?>
  <?php // amount to only one row. TODO: find a less breakage-prone solution to that problem. ?>

  <?php slot("a-slot-controls-$pageid-$name-$permid") ?>
	    <?php include_partial('aImageSlot/choose', array('action' => 'sbVideoWithImageSlot/video', 'buttonLabel' => a_get_option($options, 'chooseLabel', 
        a_(sfConfig::get('app_aMedia_video_and_embed') ? 'Choose Video or Embed Code' : 'Choose Video')), 
        'label' => a_get_option($options, 'browseLabel', 
          a_(sfConfig::get('app_aMedia_video_and_embed') ? 'Select Video or Embed Code' : 'Select a Video')), 'class' => 'a-btn icon a-media', 'type' => 'video', 'constraints' => $constraints, 'itemId' => $itemId, 'name' => $name, 'slug' => $slug, 'permid' => $permid)) ?>
      
      <?php include_partial('aImageSlot/choose', array('action' => 'sbVideoWithImageSlot/image', 'buttonLabel' => $thumbTitle, 
        'label' => $thumbTitle, 'class' => 'a-btn icon a-media', 'type' => 'image', 'constraints' => $constraints, 'itemId' => $thumbnailImageId, 'name' => $name, 'slug' => $slug, 'permid' => $permid)) ?>

  <?php end_slot() ?>

<?php endif ?>

<p>This is the slot</p>

<?php if (!$item): ?>
	<?php include_partial('aImageSlot/placeholder', array('placeholderText' => a_(sfConfig::get('app_aMedia_video_and_embed') ? 'Add Video or Embed Code' : 'Add a Video'), 'options' => $options)) ?>
<?php endif ?>

<?php if ($item): ?>
	<?php include_partial('aVideoSlot/'.$options['itemTemplate'], array('embed' => $embed, 'stretch16x9' => $stretch16x9, 'options' => $options, 'item' => $item)) ?>
<?php endif ?>
