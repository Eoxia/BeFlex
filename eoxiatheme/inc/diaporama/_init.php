<?php

/* Register diaporama post type */
require get_template_directory() . '/inc/diaporama/register-post-types.php';

/* Add info box to diaporama post type*/
require get_template_directory() . '/inc/diaporama/add_info_box.php';

/* Set Diaporama functions */
require get_template_directory() . '/inc/diaporama/functions.php';

/* Enqueue Diaporama scripts (OWL) */
require get_template_directory() . '/inc/diaporama/scripts.php';

/* Get and register widget */
require get_template_directory() . '/inc/diaporama/widget.php';

?>