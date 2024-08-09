<?php

include 'header.php';

count($product->getData('cart')) ? include 'Template/_cart-template.php' :  include 'Template/notFound/_cart-notFound.php';

count($product->getData('wishlist')) ? include 'Template/_wishlist-template.php' :  include 'Template/notFound/_wishlist-notFound.php';


include 'Template/_new-phones.php';


include 'footer.php';
