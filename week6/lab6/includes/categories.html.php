

<p><?php echo getCartCount(); ?>  items in cart</p>

<?php if ( isset($allCategories) ) : ?>
<ul>    
    <?php foreach ($allCategories as $row): ?>
        <li><a href="?category_id=<?php echo $row['category_id']; ?>"><?php echo $row['category']; ?></a></li>    
    <?php endforeach; ?>        
<?php endif; ?>
</ul>
       