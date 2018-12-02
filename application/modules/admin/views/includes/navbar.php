<div id="aside" class="app-aside fade  nav-expand white" aria-hidden="true" >
    <div class="sidenav modal-dialog dk">
        <!-- sidenav top -->
        <div class="navbar " style="background-color:#000;color:white !important;">
            <!-- brand -->
            <a href="" class="navbar-brand">
                <svg viewBox="0 0 24 24" height="28" width="28" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M19.51 3.08L3.08 19.51c.09.34.27.65.51.9.25.24.56.42.9.51L20.93 4.49c-.19-.69-.73-1.23-1.42-1.41zM11.88 3L3 11.88v2.83L14.71 3h-2.83zM5 3c-1.1 0-2 .9-2 2v2l4-4H5zm14 18c.55 0 1.05-.22 1.41-.59.37-.36.59-.86.59-1.41v-2l-4 4h2zm-9.71 0h2.83L21 12.12V9.29L9.29 21z" fill="#fff" class="fill-theme"/>
                </svg>
                <img src="<?php echo ADMIN_LOGO; ?>" alt="." class="hide">
                    <span class="hidden-folded d-inline"><?php echo PROJECT_NAME; ?></span>
            </a>
            <!-- / brand -->
        </div>

        <!-- Flex nav content -->
        <div class="flex hide-scroll" style="background-color:#000;color:white !important;">
            <div class="scroll">
                <div class="nav-active-theme" data-nav>
                    <ul class="nav bg">

                        <li class="nav-header">
                            <span class="text-xs hidden-folded" style="opacity:1">Main</span>
                        </li>
                        <li>
                            <a href="<?php echo ADMIN_LINK; ?>">
                                <span class="nav-icon">
                                    <i class="fa fa-dashboard"></i>
                                </span>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li>
		                <a>
		                  <span class="nav-caret">
		                    <i class="fa fa-caret-down"></i>
		                  </span>
		                  <span class="nav-icon">
		                    <i class="fa fa-user-circle-o"></i>
		                  </span>
		                  <span class="nav-text">Clients</span>
		                </a>
		                <ul class="nav-sub">
		                  <li>
		                    <a href="<?php echo ADMIN_LINK.'add/client';?>">
		                      <span class="nav-text">Add Client</span>
		                    </a>
		                  </li>
		                  <li>
		                    <a href="<?php echo ADMIN_LINK.'client';?>">
		                      <span class="nav-text">Manage Client</span>
		                    </a>
		                  </li>
		                  
		                </ul>
		              </li>
                        <li>
                            <a>
                                <span class="nav-caret">
                                    <i class="fa fa-caret-down"></i>
                                </span>
                                <span class="nav-icon">
                                    <i class="fa fa-building-o"></i>
                                </span>
                                <span class="nav-text">Projects</span>
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="<?php echo ADMIN_LINK . 'add/project'; ?>">
                                        <span class="nav-text">Add Project</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo ADMIN_LINK . 'projects'; ?>">
                                        <span class="nav-text">Manage Projects</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        
                        <li>
                            <a>
                                <span class="nav-caret">
                                    <i class="fa fa-caret-down"></i>
                                </span>
                                <span class="nav-icon">
                                    <i class="fa fa-won"></i>
                                </span>
                                <span class="nav-text">Work Orders</span>
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="<?php echo ADMIN_LINK . 'add/workorder'; ?>">
                                        <span class="nav-text">Add Work order</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo ADMIN_LINK . 'workrorders'; ?>">
                                        <span class="nav-text">Manage Work orders</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a>
                                <span class="nav-caret">
                                    <i class="fa fa-caret-down"></i>
                                </span>
                                <span class="nav-icon">
                                    <i class="fa fa-file-pdf-o"></i>
                                </span>
                                <span class="nav-text">Invoice</span>
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="<?php echo ADMIN_LINK . 'add/invoice'; ?>">
                                        <span class="nav-text">Add Invoice</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo ADMIN_LINK . 'invoices'; ?>">
                                        <span class="nav-text">Manage Invoice</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <!-- <li>
                            <a>
                                <span class="nav-caret">
                                    <i class="fa fa-caret-down"></i>
                                </span>
                                <span class="nav-icon">
                                    <i class="fa fa-user-times"></i>
                                </span>
                                <span class="nav-text">Vendors</span>
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="<?php echo ADMIN_LINK . 'add/client'; ?>">
                                        <span class="nav-text">Add Vendor</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="layout.sidenav.html">
                                        <span class="nav-text">Manage Vendors</span>
                                    </a>
                                </li>

                            </ul>
                        </li> -->
                        <li class="pb-2 hidden-folded"></li>
                    </ul>
                    <ul class="nav ">

                        <!-- <li class="nav-header hidden-folded mt-2">
                            <span class="text-xs" style="color:white !important; opacity:1">Settings</span>
                        </li> -->
                        <li>
                            <!-- <a>
                                <span class="nav-caret">
                                    <i class="fa fa-caret-down"></i>
                                </span>
                                <span class="nav-icon no-fade">
                                    <i class="badge badge-xs badge-o md b-warning"></i>
                                </span>
                                <span class="nav-text">Logout</span>
                            </a>
 -->                            <!-- <ul class="nav-sub nav-mega nav-mega-3">
                                <li>
                                    <a href="ui.arrow.html" >
                                        <span class="nav-text">My profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="ui.badge.html" >
                                        <span class="nav-text">Change Password</span>
                                    </a>
                                </li> -->
                                <li>
                                    <a href="<?php echo ADMIN_LINK . 'logout'; ?>" >
                                        <span class="nav-text">Sign Out</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- sidenav bottom -->
        <!-- <div class="no-shrink lt">
            <div class="nav-fold">
                <a class="d-flex p-2-3" data-toggle="dropdown">
                    <span class="avatar w-28 grey hide">J</span>
                    <img src="<?php echo ADMIN_IMAGES_PATH; ?>a0.jpg" alt="..." class="w-28 circle">
                </a>
                <div class="dropdown-menu  w pt-0 mt-2 animate fadeIn">
                    <div class="row no-gutters b-b mb-2">
                        <div class="col-4 b-r">
                            <a href="app.user.html" class="py-2 pt-3 d-block text-center">
                                <i class="fa text-md fa-phone-square text-muted"></i>
                                <small class="d-block">Call</small>
                            </a>
                        </div>
                        <div class="col-4 b-r">
                            <a href="app.message.html" class="py-2 pt-3 d-block text-center">
                                <i class="fa text-md fa-comment text-muted"></i>
                                <small class="d-block">Chat</small>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="app.inbox.html" class="py-2 pt-3 d-block text-center">
                                <i class="fa text-md fa-envelope text-muted"></i>
                                <small class="d-block">Email</small>
                            </a>
                        </div>
                    </div>
                    <a class="dropdown-item" href="profile.html">
                        <span>Profile</span>
                    </a>
                    <a class="dropdown-item" href="setting.html">
                        <span>Settings</span>
                    </a>
                    <a class="dropdown-item" href="app.inbox.html">
                        <span class="float-right"><span class="badge info">6</span></span>
                        <span>Inbox</span>
                    </a>
                    <a class="dropdown-item" href="app.message.html">
                        <span>Message</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="docs.html">
                        Need help?
                    </a>
                    <a class="dropdown-item" href="<?php echo ADMIN_LINK . 'logout'; ?>">Sign out</a>
                </div>
                <div class="hidden-folded flex p-2-3 bg">
                    <div class="d-flex p-1">
                        <a href="app.inbox.html" class="flex text-nowrap">
                            <i class="fa fa-bell text-muted mr-1"></i>
                            <span class="badge badge-pill theme">20</span>
                        </a>
                        <a href="<?php echo ADMIN_LINK . 'logout'; ?>" class="px-2" data-toggle="tooltip" title="Logout">
                            <i class="fa fa-power-off text-muted"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>