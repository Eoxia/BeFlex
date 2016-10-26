<style>

<?php $couleur_dominante = get_field( 'couleur_de_dominante', 'options' ); ?>

<?php $font_weight = get_field( 'titre_gras', 'options' ); ?>

<?php $font_style = get_field( 'titre_italic', 'options' ); ?>

<?php $font_transform = get_field( 'titre_majuscule', 'options' ); ?>

h1, h2, h3, h4, h5, h6, .wps-title, .site-title, .wps-categorie-item-title, .eoxia-mega-menu .menu-item-depth-1 > a, .bloc-banner strong, .author-name, .chapo, .touch-navigation li, .widget.widget_recent_entries li a, .widget.widget_rss li .rsswidget {
	font-family: <?php eox_get_font_family(); ?>;
	font-weight: <?php eox_get_font_weight(); ?>;
	font-style: <?php eox_get_font_style(); ?>;
	text-transform: <?php eox_get_font_transform(); ?>;
}

a, .entry-content ul li:before, .wps-link {
	color: <?php echo $couleur_dominante; ?>;
}

a.button, input[type="submit"] {
	background: <?php echo $couleur_dominante; ?>;
}
a.button:hover {
	background: <?php echo $couleur_dominante; ?>;
}
.wps-catalog .wps-hover {
	background: <?php echo $couleur_dominante; ?>;
}

[class*="wps"][class*="bton"][class*="first"], [class*="wps"][class*="bton"][class*="first"]:hover, .wps-action-mini-cart-opener .wps-numeration-cart {
	background: <?php echo $couleur_dominante; ?>;
}
[class*="wps"][class*="bton"][class*="second"], [class*="wps"][class*="bton"][class*="second"]:hover {
	color: <?php echo $couleur_dominante; ?>;
	-webkit-box-shadow: inset 0 0 0 2px <?php echo $couleur_dominante; ?>;
	-moz-box-shadow: inset 0 0 0 2px <?php echo $couleur_dominante; ?>;
	box-shadow: inset 0 0 0 2px <?php echo $couleur_dominante; ?>;
	background: none;
}
.owl-pagination .owl-page {
	-webkit-box-shadow: inset 0 0 0 1px <?php echo $couleur_dominante; ?>;
	box-shadow: inset 0 0 0 1px <?php echo $couleur_dominante; ?>;
}
.owl-pagination .owl-page.active {
	-webkit-box-shadow: inset 0 0 0 1em <?php echo $couleur_dominante; ?>;
	box-shadow: inset 0 0 0 1em <?php echo $couleur_dominante; ?>;
}

input[type="text"]:focus, input[type="email"]:focus, input[type="tel"]:focus, input[type="password"]:focus, input[type="url"]:focus, input[type="search"]:focus {
	outline: solid <?php echo $couleur_dominante; ?> 2px;
}

.wps-modal-overlay, .wps-cart-overlay, .touch-overlay {
	background-color: <?php echo $couleur_dominante; ?>;
}
.entry-content blockquote {
	border-left-color: <?php echo $couleur_dominante; ?>;
}
.wps-section-taskbar ul li a {
	color:#aaa;
}
.wps-section-taskbar ul li.wps-activ a, .wps-section-taskbar ul li a:hover {
	color: <?php echo $couleur_dominante; ?>;
	border-left-color: <?php echo $couleur_dominante; ?>;
}

.widget .cat-item {
	color: <?php echo $couleur_dominante; ?>;
}
.widget_recent_entries li a:hover, .widget.widget_rss li .rsswidget:hover {
	color: <?php echo $couleur_dominante; ?>;
}
.widget.widget_calendar #prev a, .widget.widget_calendar #next a, .widget.widget_calendar table td a:after {
	background: <?php echo $couleur_dominante; ?>;
}

::-moz-selection { color:#fff; background: <?php echo $couleur_dominante; ?>;}
::selection { color:#fff; background: <?php echo $couleur_dominante; ?>; }


</style>