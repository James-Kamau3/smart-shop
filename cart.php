<?php

include 'header.php';

count($product->getData('cart')) ? include 'Template/_cart-template.php' :  include 'Template/_cart-not-found.php';

count($product->getData('wishlist')) ? include 'Template/_wishlist-template.php' :  include 'Template/_wishlist-not-found.php';


include 'Template/_new-phones.php';


include 'footer.php';
