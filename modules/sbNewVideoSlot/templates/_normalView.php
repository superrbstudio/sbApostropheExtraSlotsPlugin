<?php use_helper('a') ?>

<?php include_partial('a/simpleEditWithVariants', array('pageid' => $pageid, 'name' => $name, 'permid' => $permid, 'slot' => $slot)) ?>

<?php if (isset($values['videoType'])): ?>
    <div style="position: relative;padding-bottom: 56.25%;height: 0;display: block;margin-bottom:20px;">
      <?php if($values['videoType'] == 'youtube'): ?>
        <iframe style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;" width="853" height="480" src="https://www.youtube.com/embed/<?php echo $values['videoId'] ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
      <?php elseif($values['videoType'] == 'vimeo'): ?>
        <iframe style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;" src="https://player.vimeo.com/video/<?php echo $values['videoId'] ?>?title=0&byline=0&portrait=0" width="500" height="213" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      <?php endif; ?>
    </div>
<?php endif; ?>
