<?php if ( !defined( 'ABSPATH' ) ) exit;
/*
 * General
	{WPSHOP_CART_LINK}		=> Link for the cart page
	{WPSHOP_CURRENCY}		=> Currency defined for the shop
 *
 */

$tpl_element = array();








/*	Product mini display (grid)									Produits mini grid */
ob_start();
?>
<li itemscope="" itemtype="http://data-vocabulary.org/Product">
	<div>
		<a href="{WPSHOP_PRODUCT_PERMALINK}" title="{WPSHOP_PRODUCT_TITLE}" itemprop="offers" itemscope itemtype="http://data-vocabulary.org/Offers">
			<span class="wps-thumbnail">
				{WPSHOP_PRODUCT_THUMBNAIL_WPSHOP-PRODUCT-GALERY}
				<span class="wps-extras">
					{WPSHOP_PRODUCT_EXTRA_STATE}
				</span>
				<span class="wps-hover">voir</span>
			</span>
			<span class="wps-caption">
				<span class="wps-title" itemprop="name" >{WPSHOP_PRODUCT_TITLE}</span>
				<span itemprop="price" class="wps-price-container">
			    	<span class="wps-price">{WPSHOP_PRODUCT_PRICE}</span>
			    </span>
			</span>
		</a>
		<div class="wps-action-container">
			{WPSHOP_PRODUCT_BUTTONS}
		</div>
	</div>
</li><?php
$tpl_element['product_mini_grid'] = ob_get_contents();
ob_end_clean();


