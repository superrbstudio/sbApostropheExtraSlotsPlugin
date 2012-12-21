<?php if($success): ?>
<p>Thank you for your subscription.</p>
<?php else: ?>
<?php include_partial('sbCampaignMonitorSubscribe/subscribeForm', array('form' => $form)); ?>
<?php endif; ?>