<?php if (isset($wrapper)): ?><<?= $wrapper ?> class="<?= $class ?>" role="<?= $role ?>"><?php endif ?>
  <?= svg($svg) ?>
<?php if($wrapper !== ''): ?></<?= $wrapper ?>><?php endif ?>