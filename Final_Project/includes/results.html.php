<?php if ( isset($results) && count($results) > 0 ) : ?>
    
    <?php foreach ($results as $row): ?>
            <h2><?php echo $row; ?></h2></li>
    <?php endforeach; ?>

<?php endif; ?>