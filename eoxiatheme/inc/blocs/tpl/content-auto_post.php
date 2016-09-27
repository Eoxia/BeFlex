<?php if( get_field('donnee') == 'dynamique'): ?>
	<?php include( locate_template('inc/blocs/tpl/content-dynamic-autopost.php') ); ?>
<?php else: ?>
	<?php include( locate_template('inc/blocs/tpl/content-static-autopost.php') ); ?>
<?php endif; ?>







