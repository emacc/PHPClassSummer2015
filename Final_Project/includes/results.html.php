<?php if ( isset($results) && count($results) > 0 ) : ?>
            <ul>
                <?php foreach ($results as $error): ?>
                <li><h2><?php echo $results; ?></h2></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>