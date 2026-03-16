<?php if (!empty($wrapper)): ?>
<?= '<' . $wrapper . ' class="' . $class . '"' . ' role="' . $role . '">' ?>
<?php endif ?>
  <?php if($svg): ?>
    <?= svg($svg) ?>
  <?php endif ?>
<?php if (!empty($wrapper)): ?>
<?= '</' . $wrapper . '>'?>
<?php endif ?>
