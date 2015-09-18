<?php if ( isset($errors) && count($errors) > 0 ) : ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                <li><h2><?php echo $error; ?></h2></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>