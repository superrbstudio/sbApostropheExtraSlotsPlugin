<?php use_helper('a') ?>

<?php include_partial('a/simpleEditWithVariants', array('pageid' => $pageid, 'name' => $name, 'permid' => $permid, 'slot' => $slot)) ?>
<?php if ($listId): ?>
  <div id="sbCampaignMonitorSubscribeForm-<?php echo $permid; ?>" class='sb-loading'></div>
  <?php a_js_call('sbCampaignMonitorSubscribe(?,?,?)', $listId, '#sbCampaignMonitorSubscribeForm-' . $permid, url_for('@sb_campaign_monitor_subscribe_display_form')); ?>
<?php endif ?>
