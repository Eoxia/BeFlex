<?php if ( !defined( 'ABSPATH' ) ) exit;
/*
 * General
	{WPSHOP_CART_LINK}		=> Link for the cart page
	{WPSHOP_CURRENCY}		=> Currency defined for the shop
 *
 */

$tpl_element = array();






/*	Product mini display (List)										Produits mini liste */
ob_start();
?>
<li class="{WPSHOP_PRODUCT_CLASS}" itemscope itemtype="http://data-vocabulary.org/Product" >
	<div class="bloc-item-padder">
		<div class="wps-extras">
				{WPSHOP_PRODUCT_EXTRA_STATE}
			</div>
		<a href="{WPSHOP_PRODUCT_PERMALINK}" class="bloc-item-thumbnail" title="{WPSHOP_PRODUCT_TITLE}">
			{WPSHOP_PRODUCT_THUMBNAIL}
		</a>
		<span class="product_information-mini-list bloc-item-content" itemprop="offers" itemscope itemtype="http://data-vocabulary.org/Offers">			
				<span class="wps-title" itemprop="name" >{WPSHOP_PRODUCT_TITLE}</span>
				<span class="crossed_out_price">{WPSHOP_CROSSED_OUT_PRICE}</span> {WPSHOP_PRODUCT_PRICE}
				{WPSHOP_LOW_STOCK_ALERT_MESSAGE}
				<p class="bloc-excerpt" itemprop="description">{WPSHOP_PRODUCT_EXCERPT}</p>
				<a href="{WPSHOP_PRODUCT_PERMALINK}" title="{WPSHOP_PRODUCT_TITLE}" class="wpshop_clearfix"></a>
			{WPSHOP_PRODUCT_BUTTONS}			
		</span>
	</div>
</li><?php
$tpl_element['product_mini_list'] = ob_get_contents();
ob_end_clean();

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
			    	<span class="wps-price"><span class="crossed_out_price">{WPSHOP_CROSSED_OUT_PRICE}</span>{WPSHOP_PRODUCT_PRICE}</span>
			    </span>
			    <p>{WPSHOP_PRODUCT_EXCERPT}</p>
			</span>
		</a>
		<div class="wps-action-container">
			{WPSHOP_PRODUCT_BUTTONS}
		</div>
	</div>
</li><?php
$tpl_element['product_mini_grid'] = ob_get_contents();
ob_end_clean();



