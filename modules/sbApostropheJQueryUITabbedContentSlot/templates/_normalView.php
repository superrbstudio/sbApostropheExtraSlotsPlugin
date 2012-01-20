<?php use_helper('a') ?>

<?php if ($editable): ?>
<?php include_partial('a/simpleEditWithVariants', array('pageid' => $pageid, 'name' => $name, 'permid' => $permid, 'slot' => $slot)) ?>
<?php endif; ?>
<div id="sb-apostrophe-tabs-<?php echo $permid; ?>" class="sb-apostrophe-tabs">
	<ul>
	<?php for($i = 1; $i <= sfConfig::get('app_sbApostropheJQueryUITabbedContent_max_tabs', 5); $i++): ?>
		<?php if(isset($values['title_' . $i]) and !empty($values['title_' . $i])): ?>
			<?php $tabId = 'tabs_' . $permid . '_' . $i; ?>
		<li><a href="#<?php echo $tabId; ?>"><?php echo $values['title_' . $i]; ?></a></li>
		<?php endif; ?>
	<?php endfor; ?>
	</ul>
	<?php for($i = 1; $i <= sfConfig::get('app_sbApostropheJQueryUITabbedContent_max_tabs', 5); $i++): ?>
		<?php if(isset($values['title_' . $i]) and !empty($values['title_' . $i])): ?>
			<?php $tabId = 'tabs_' . $permid . '_' . $i; ?>
	<div id="<?php echo $tabId; ?>">
		<?php a_slot('tab_content_' . $i, 'aRichText', array('slug' => '/sb-apostrophe-tabs-' . $permid)); ?>
	</div>
		<?php endif; ?>
	<?php endfor; ?>
</div>
<?php a_js_call('sbApostropheJQueryUITabbedContentSlotStart(?)', 'sb-apostrophe-tabs-' . $permid); ?>