<?php if ( isset($errors) && count($errors) > 0 ) : ?>
        <?php foreach ($errors as $error): ?>
            <h4>** <?php echo $error; ?></h4></li>
            <?php endforeach; ?>
        <?php endif; ?>