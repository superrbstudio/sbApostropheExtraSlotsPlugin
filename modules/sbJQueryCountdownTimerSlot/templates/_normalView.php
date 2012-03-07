<?php use_helper('a') ?>

<?php include_partial('a/simpleEditWithVariants', array('label' => 'Set timer', 'pageid' => $pageid, 'name' => $name, 'permid' => $permid, 'slot' => $slot)) ?>


<?php if(isset($date) and $date != null): ?>
<div class="countdown clearfix">
  <div class="layer"></div>
  <ul class="time clearfix">
    <li id="d1">
      <div class="current card">
        <span class="value"></span>
        <div class="break"></div>
      </div>
    </li>
    <li id="m2">
      <div class="current card">
        <span class="value"></span>
        <div class="break"></div>
      </div>
    </li>
    <li id="s1">
      <div class="current card">
        <span class="value"></span>
        <div class="break"></div>
      </div>
    </li>
    <li id="s2">
      <div class="current card">
        <span class="value"></span>
        <div class="break"></div>
      </div>
    </li>
  </ul>
  <ul class="countdown-labels">
    <li>Days</li>
    <li>Hours</li>
    <li>Minutes</li>
    <li>Seconds</li>
  </ul>
</div>

<?php // Remember javascript months start from 0!!! ?>
<?php a_js_call('sbJQueryCountdownTimerSetup(?,?,?,?,?)', date('Y', $date), date('m', $date) - 1, date('d', $date), date('H', $date), date('m', $date)); ?>
<?php endif; ?>