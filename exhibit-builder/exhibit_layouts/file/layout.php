<?php
$position = isset($options['file-position'])
    ? html_escape($options['file-position'])
    : 'left';
$size = isset($options['file-size'])
    ? html_escape($options['file-size'])
    : 'fullsize';
$captionPosition = isset($options['captions-position'])
    ? html_escape($options['captions-position'])
    : 'center';
?>
<div class="exhibit-items <?php echo $position; ?> <?php echo $size; ?> captions-<?php echo $captionPosition; ?>">
    <?php foreach ($attachments as $attachment): ?>
        <?php
          $filename = $attachment->getFile()['filename'];
          echo $this->exhibitAttachment($attachment, array('imageSize' => $size,'imgAttributes' => array('filename' => $filename)));
        ?>
    <?php endforeach; ?>
</div>
<?php echo $text; ?>
