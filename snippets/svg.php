<?php if (isset($wrapper)): ?>
<?= '<' . $wrapper . ' class="' . $class . '"' . ' role="' . $role . '">' ?>
<?php endif ?>
  <?php if($svg): ?>
    <?= svg($svg) ?>
  <?php endif ?>
<?php if($wrapper !== ''): ?>
<?= '</' . $wrapper . '>'?>
<?php endif ?>
