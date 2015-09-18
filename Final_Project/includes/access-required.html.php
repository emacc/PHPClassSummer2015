

<?php if ( !isset($_SESSION['user_id']) || intval($_SESSION['user_id']) <= 0 ) : ?>
<p><a href="../site/index.php">Login</a></p>
<h1><?php die('Access Denied '); endif;  ?></h1>
