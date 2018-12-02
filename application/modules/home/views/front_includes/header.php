<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    @font-face {
  font-family: Montserrat-Regular;
  src: url('<?php echo FRONT_FONTS_PATH;?>montserrat/Montserrat-Regular.ttf'); 
}

@font-face {
  font-family: Montserrat-Medium;
  src: url('<?php echo FRONT_FONTS_PATH;?>montserrat/Montserrat-Medium.ttf'); 
}

@font-face {
  font-family: Montserrat-Bold;
  src: url('<?php echo FRONT_FONTS_PATH;?>montserrat/Montserrat-Bold.ttf'); 
}

@font-face {
  font-family: Montserrat-Italic;
  src: url('<?php echo FRONT_FONTS_PATH;?>montserrat/Montserrat-Italic.ttf'); 
}

@font-face {
  font-family: Montserrat-Black;
  src: url('<?php echo FRONT_FONTS_PATH;?>montserrat/Montserrat-Black.ttf'); 
}

@font-face {
  font-family: Linearicons;
  src: url('<?php echo FRONT_FONTS_PATH;?>Linearicons-Free-v1.0.0/WebFont/Linearicons-Free.ttf'); 
}

@font-face {
  font-family: Poppins-Bold;
  src: url('<?php echo FRONT_FONTS_PATH;?>poppins/Poppins-Bold.ttf'); 
}

@font-face {
  font-family: Poppins-Black;
  src: url('<?php echo FRONT_FONTS_PATH;?>poppins/Poppins-Black.ttf'); 
}
</style>
<!-- Header -->
<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
        <div class="topbar" style="background-image: url(http://localhost/sudharsanfans/front_assests/images//header.png);">
           <img src="<?php echo FRONT_IMAGES_PATH;?>header.png" width="1423px" height="45px">
            <div class="topbar-social" style="display:none;">
                <a href="#" class="topbar-social-item fa fa-facebook"></a>
                <a href="#" class="topbar-social-item fa fa-instagram"></a>
                <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
            </div>

<!--				<span class="topbar-child1">
                                        Free shipping for standard order over $100
                                </span>-->

            <div class="topbar-child2">
                <span class="topbar-email" style="margin-top: 21px;margin-right: 59px;">
                    info@sudharshanfans.com
                </span>

                <div class="topbar-language rs1-select2">
<!--						<select class="selection-1" name="time">
                                <option>USD</option>
                                <option>EUR</option>
                        </select>-->
                </div>
            </div>
        </div>

        <div class="wrap_header">
            <!-- Logo -->
            <a href="<?php echo FRONT_LINK; ?>" class="logo">
                <img src="<?php echo FRONT_IMAGES_PATH; ?>icons/logo.png" alt="IMG-LOGO" style="margin-left: -40px;
    /* height: 79px; */
    width: 335px;
    margin-top: 7px;">
            </a>
            <!-- Menu -->
            <div class="wrap_menu" style="margin-left: 647px;">
              
                <nav class="menu">
                    
                    <ul class="main_menu">
                                     <li class="cart-msg"></li>

                        <li>
                            <a href="<?php echo FRONT_LINK; ?>">Home</a>


                        <li>
                            <a href="<?php echo FRONT_LINK . "products/"; ?>">Products</a>
                            <ul class="sub_menu">
                                <?php
                                $menu_req = json_decode($product_menu_details);
                                //echo $product_menu_details;
                                if ($menu_req->code == SUCCESS_CODE):
                                    foreach ($menu_req->fantype_result as $menu_res):
                                    $menulink=($menu_res->enable_status==1)?FRONT_LINK . "products/" . url_title($menu_res->fantype_title) . "/" . $menu_res->fantype_id:'javascript:void(0)';
                                        ?>
                                        <li><a href="<?php echo $menulink; ?>"><?php echo ucfirst($menu_res->fantype_title) ?> <?php if($menu_res->enable_status==0){ ?>(Coming Soon..)<?php } ?></a></li>
                                        <?php
                                    endforeach;
                                endif;
                                ?>

                            </ul>
                        </li>



<!--                        <li>
                            <a href="<?php echo base_url().'blog';?>">blog</a>
                        </li>-->

                        <li>
                            <a href="<?php echo base_url().'aboutus';?>">About Us</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url().'contactus';?>">Contact Us</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">
                <!--					<a href="#" class="header-wrapicon1 dis-block">
                                                                <img src="<?php echo FRONT_IMAGES_PATH; ?>icons/icon-header-01.png" class="header-icon1" alt="ICON">
                                                        </a>-->

                <span class="linedivide1"></span>
                <?php
                $header_cartsession = $this->session->userdata('cartsession');
                $item_count = 0;
                $url = base_url() . 'home/Cart/checkoutStatustics/' . $header_cartsession;
                $ch = curl_init();
                $timeout = 5;
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                $statistics_req = curl_exec($ch);
                curl_close($ch);
                $checkout_statistics_res = json_decode($statistics_req);
                $item_count = $checkout_statistics_res->order_item_count;
                
                /*for geting fan cateofory code start*/
                $fantype_req= json_decode($product_menu_details);
                $cat_res=$fantype_req->fantype_result;
                
                ?>

                <div class="header-wrapicon2">
                    <img src="<?php echo FRONT_IMAGES_PATH; ?>icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti" id="header_chekout_count"><?php echo $item_count; ?></span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <?php
                            $dat_req = json_decode($cartList);
                            if ($dat_req->code == SUCCESS_CODE){
                                foreach ($dat_req->cart_result as $cart_res):
                                    ?>
                                    <li class="header-cart-item">
                                        <div class="">
                                            <img src="<?php echo $cart_res->image_path; ?>" width="80" alt="IMG">
                                        </div>

                                        <div class="header-cart-item-txt">
                                            <a href="<?php echo FRONT_LINK . "products/" . 1 . "/" . url_title($cart_res->item_name) . "/" . $cart_res->item_id; ?>" class="header-cart-item-name">
                                                <?php echo $cart_res->item_name; ?>
                                            </a>

                                            <span class="header-cart-item-info">
                                                <?php echo $cart_res->item_qty; ?> x Rs.<?php echo $cart_res->item_price; ?>.00
                                            </span>
                                        </div>
                                    </li>
                                    <?php
                                endforeach;
                            
                            ?></ul>

                        <div class="header-cart-total">
                            Total: Rs.<?php $cartstat = json_decode($cartStatistics);
                            echo $cartstat->order_total;
                            ?>.00
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="<?php echo base_url() . "cart"; ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="<?php echo base_url().'checkout';?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                            </div><?php }
                            else{
                                ?><div class="alert alert-heading">No items in cart</div><?php
                            }
                            ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


</header>

