<?php use_helper('a') ?>

<?php if ($editable): ?>
<?php include_partial('a/simpleEditWithVariants', array('pageid' => $pageid, 'name' => $name, 'permid' => $permid, 'slot' => $slot)) ?>
<?php endif; ?>

<section class="sb-apostrophe-faq-slot">
<?php if (isset($values['question'])): ?>
  <h2 class="sb-apostrophe-faq-slot-question open"><?php echo htmlspecialchars($values['question']); ?></h2>
<?php endif ?>
<?php if (isset($values['answer'])): ?>
  <div class="sb-apostrophe-faq-slot-answer open"><?php echo html_entity_decode($values['answer']); ?></div>
<?php endif ?>
	<hr />
</section>
<?php a_js_call('sbApostropheFAQSlotStart()'); ?>