<ul class="navbar-nav mt-2 mt-lg-0 mx-0 mx-lg-2 ">
    <li class="nav-item">
        <a href="<?php echo ADMIN_LINK; ?>" class="nav-link">
            Dashboard
        </a>
    </li>

    <!--Orders section start -->
    <li class="nav-item dropdown">
        <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-cart-plus"></i>&nbsp;&nbsp;Sales Orders
        </a>
        <div class="dropdown-menu mt-2 text-color" role="menu">
            <a href="<?php echo ADMIN_LINK; ?>Orders" class="dropdown-item" data-toggle="tooltip" data-title="Manage Orders" data-placement="right">
                <i class="fa fa-plus-circle"></i>
                Manage Orders
            </a>
            <a href="<?php echo ADMIN_LINK; ?>Orders/recentorders" class="dropdown-item" data-toggle="tooltip" data-title="Manage Orders" data-placement="right">
                <i class="fa fa-plus-circle"></i>
                Manage Recent Orders
            </a>
            <a href="<?php echo ADMIN_LINK; ?>Orders/completedorders" class="dropdown-item" data-toggle="tooltip" data-title="Manage Orders" data-placement="right">
                <i class="fa fa-plus-circle"></i>
                Manage Completed Orders
            </a>
            <a href="<?php echo ADMIN_LINK; ?>Orders/pendingorders" class="dropdown-item" data-toggle="tooltip" data-title="Manage Orders" data-placement="right">
                <i class="fa fa-plus-circle"></i>
                Pending Orders
            </a>
            
        </div>
    </li>
    <!--Orders  section end -->

    <!--Contact Request start -->
    <li class="nav-item dropdown">
        <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-address-book"></i>&nbsp;&nbsp;Contact Requests
        </a>
        <div class="dropdown-menu mt-2 text-color" role="menu">
            <a href="<?php echo ADMIN_LINK; ?>Requests/quickenquiries" class="dropdown-item" data-toggle="tooltip" data-title="Manage Orders" data-placement="right">
                <i class="fa fa-plus-circle"></i>
                Quick Enquiries
            </a>

        </div>
    </li>
    <!--Contact Request  section end -->
    <!--product Settings section start -->
    <li class="nav-item dropdown">
        <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-product-hunt "></i>&nbsp;&nbsp;Product
        </a>
        <div class="dropdown-menu mt-2 text-color" role="menu">
            <a href="<?php echo ADMIN_LINK . 'Product/fantype'; ?>" class="dropdown-item" data-toggle="tooltip" data-title="Manage Food Type" data-placement="right">
                <i class="fa fa-ellipsis-h"></i>
                Manage Fan Type
            </a>
            <a href="<?php echo ADMIN_LINK . 'Product/allfans'; ?>" class="dropdown-item" data-toggle="tooltip" data-title="Manage Items" data-placement="right">
                <i class="fa fa-ellipsis-h"></i>
                Manage Fans
            </a>
        </div>
    </li>
    <!--product Settings section end -->


    <!--Site Settings section start -->
    <li class="nav-item dropdown">
        <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-cog "></i>&nbsp;&nbsp;Site Settings
        </a>
        <div class="dropdown-menu mt-2 text-color" role="menu">


            <a href="<?php echo ADMIN_LINK . 'Settings/slider'; ?>" class="dropdown-item" data-toggle="tooltip" data-title="Manage Venue Type" data-placement="right">
                <i class="fa fa-ellipsis-h"></i>
                Manage Slider
            </a>

            <a href="<?php echo ADMIN_LINK . 'Settings/gallery'; ?>" class="dropdown-item" data-toggle="tooltip" data-title="Manage Gallery" data-placement="right">
                <i class="fa fa-ellipsis-h"></i>
                Manage Gallery
            </a>
        </div>
    </li>
    <!--Site Settings section end -->
</ul>