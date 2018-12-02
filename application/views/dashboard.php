<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo PROJECT_NAME;?></title>
  <meta name="description" content="Responsive, Bootstrap, BS4" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="<?php echo ADMIN_IMAGES_PATH;?>logo.svg">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="<?php echo ADMIN_IMAGES_PATH;?>logo.svg">
  
  <!-- style -->

  <link rel="stylesheet" href="<?php echo LIBS_PATH;?>font-awesome/css/font-awesome.min.css" type="text/css" />

  <!-- build:css <?php echo ADMIN_CSS_PATH;?>app.min.css -->
  <link rel="stylesheet" href="<?php echo LIBS_PATH;?>bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ADMIN_CSS_PATH;?>app.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ADMIN_CSS_PATH;?>style.css" type="text/css" />
  <!-- endbuild -->
</head>
<body>


<div class="app" id="app">

<!-- ############ LAYOUT START-->

	<!-- ############ Aside START-->
	<?php $this->load->view(ADMIN_SIDEBAR_PATH);?>
	<!-- ############ Aside END-->

	<!-- ############ Content START-->
		<?php $this->load->view(ADMIN_HEADER_PATH);?>


<!-- ############ Main START-->


<div>
	<div class="p-3 light lt box-shadow-0 d-flex">
		<div class="flex">
			<h1 class="text-md mb-1 _400">Welcome back, John.</h1>
			<small class="text-muted">Last logged in: 03:00 21, July</small>
		</div>
		<div>
			<small class="text-muted d-block">Status</small>
			<div class="mb-1 peity" data-plugin="peity" data-title="Status" data-option="
	          'bar',
	          {
	            height: 20,
	            width: 60,
	            fill: [app.color.primary]
	          }">56,32,21,16,25,23,42,24,6,10,44,27,34,52,54,59,61,68,78
	      	</div>
	      </div>
	</div>
	<div class="padding">
		<div class="row">
	      <div class="col-sm-6 col-lg-3">
	        <div class="box list-item">
	          <span class="avatar w-40 text-center rounded primary">
	            <span class="fa fa-dollar"></span>
	          </span>
	          <div class="list-body">
	            <h4 class="m-0 text-md"><a href="#">75 <span class="text-sm">Sales</span></a></h4>
	            <small class="text-muted">6 waiting payment.</small>
	          </div>
	        </div>
	      </div>

	      <div class="col-sm-6 col-lg-3">
	        <div class="box list-item">
	          <span class="avatar w-40 text-center rounded info theme">
	            <span class="fa fa-female"></span>
	          </span>
	          <div class="list-body">
	            <h4 class="m-0 text-md"><a href="#">40 <span class="text-sm">Orders</span></a></h4>
	            <small class="text-muted">38 Shipped.</small>
	          </div>
	        </div>
	      </div>

	      <div class="col-sm-6 col-lg-3">
	        <div class="box list-item">
	          <span class="avatar w-40 text-center rounded success">
	            <span class="fa fa-bookmark"></span>
	          </span>
	          <div class="list-body">
	            <h4 class="m-0 text-md"><a href="#">6k <span class="text-sm">Members</span></a></h4>
	            <small class="text-muted">632 VIP.</small>
	          </div>
	        </div>
	      </div>

	      <div class="col-sm-6 col-lg-3">
	        <div class="box list-item">
	          <span class="avatar w-40 text-center rounded warning">
	            <span class="fa fa-comment"></span>
	          </span>
	          <div class="list-body">
	            <h4 class="m-0 text-md"><a href="#">69 <span class="text-sm">Comments</span></a></h4>
	            <small class="text-muted">5 approved.</small>
	          </div>
	        </div>
	      </div>
		</div>

		<div class="row no-gutters box">
			<div class="col-sm-4">
				<div class="padding">

					<h6>Sales Statistical Overview</h6>
					<p class="text-muted my-3">Sale information on advertising, exhibitions, market research, online media, customer desires, PR and much more</p>
					<p><i class="fa fa-arrow-circle-o-up text-success mr-1"></i><span class="text-success">15%</span> more than last week</p>
					<a href="#" class="btn btn-sm btn-rounded success theme">Update</a>
					<a href="#" class="btn btn-sm btn-rounded white">See detail</a>

				</div>
	        </div>
	        <div class="col-sm-8">
		        <div class="padding light lt">
		            <canvas id="chart-line-line" data-plugin="chart" height="120"></canvas>
		        </div>
	        </div>
	    </div>

		<div class="row">
			<div class="col-sm-6">
				<div class="box">
					<div class="box-header">
						<h3>Messages</h3>
					</div>
					<div class="list inset">
						    <div class="list-item " data-id="item-8">
						      <span class="w-40 avatar circle teal">
						          <img src="<?php echo ADMIN_IMAGES_PATH;?>a8.jpg" alt=".">
						      </span>
						      <div class="list-body">
						            <a href="" class="item-title _500">RYD</a>
						        
						          <div class="item-except text-sm text-muted h-1x">
						            Added you to repo
						          </div>
						
						        <div class="item-tag tag hide">
						        </div>
						      </div>
						      <div>
						          <span class="item-date text-xs text-muted">14:00</span>
						      </div>
						    </div>
						    <div class="list-item " data-id="item-7">
						      <span class="w-40 avatar circle indigo">
						          <img src="<?php echo ADMIN_IMAGES_PATH;?>a7.jpg" alt=".">
						      </span>
						      <div class="list-body">
						            <a href="" class="item-title _500">Fifth Harmony</a>
						        
						          <div class="item-except text-sm text-muted h-1x">
						            Send you a invitation to SWO
						          </div>
						
						        <div class="item-tag tag hide">
						        </div>
						      </div>
						      <div>
						          <span class="item-date text-xs text-muted">05:35</span>
						      </div>
						    </div>
						    <div class="list-item " data-id="item-10">
						      <span class="w-40 avatar circle blue">
						          <img src="<?php echo ADMIN_IMAGES_PATH;?>a10.jpg" alt=".">
						      </span>
						      <div class="list-body">
						            <a href="" class="item-title _500">Postiljonen</a>
						        
						          <div class="item-except text-sm text-muted h-1x">
						            Looking for some client-work
						          </div>
						
						        <div class="item-tag tag hide">
						        </div>
						      </div>
						      <div>
						          <span class="item-date text-xs text-muted">08:00</span>
						      </div>
						    </div>
						    <div class="list-item " data-id="item-4">
						      <span class="w-40 avatar circle pink">
						          <img src="<?php echo ADMIN_IMAGES_PATH;?>a4.jpg" alt=".">
						      </span>
						      <div class="list-body">
						            <a href="" class="item-title _500">Judith Garcia</a>
						        
						          <div class="item-except text-sm text-muted h-1x">
						            Eddel upload a media
						          </div>
						
						        <div class="item-tag tag hide">
						        </div>
						      </div>
						      <div>
						          <span class="item-date text-xs text-muted">12:05</span>
						      </div>
						    </div>
						    <div class="list-item " data-id="item-2">
						      <span class="w-40 avatar circle light-blue">
						          <img src="<?php echo ADMIN_IMAGES_PATH;?>a2.jpg" alt=".">
						      </span>
						      <div class="list-body">
						            <a href="" class="item-title _500">Kygo</a>
						        
						          <div class="item-except text-sm text-muted h-1x">
						            What&#x27;s the project progress now
						          </div>
						
						        <div class="item-tag tag hide">
						        </div>
						      </div>
						      <div>
						          <span class="item-date text-xs text-muted">08:05</span>
						      </div>
						    </div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="box">
		            <div class="box-header">
		              <h3>Members</h3>
		            </div>
		            <div class="list inset">
		                  <div class="list-item " data-id="item-3">
		                    <span class="w-40 avatar circle green">
		                      <i class="away b-white avatar-right"></i>
		                        JS
		                    </span>
		                    <div class="list-body">
		                          <a href="" class="item-title _500">Jeremy Scott</a>
		                      
		              
		                          <div class="item-except text-sm text-muted h-1x">
		                          jeremy-scott@gmail.com
		                          </div>
		                      <div class="item-tag tag hide">
		                      </div>
		                    </div>
		                    <div>
		                        <div class="item-action dropdown">
		                          <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
		                          <div class="dropdown-menu dropdown-menu-right text-color" role="menu">
		                            <a class="dropdown-item">
		                            	<i class="fa fa-tag"></i>
		                            	Action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-pencil"></i>
		                            	Another action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-reply"></i>
		                            	Something else here
		                            </a>
		                            <div class="dropdown-divider"></div>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-ellipsis-h"></i>
		                            	Separated link
		                            </a>
		                          </div>
		                        </div>
		                    </div>
		                  </div>
		                  <div class="list-item " data-id="item-8">
		                    <span class="w-40 avatar circle teal">
		                      <i class="on b-white avatar-right"></i>
		                        R
		                    </span>
		                    <div class="list-body">
		                          <a href="" class="item-title _500">RYD</a>
		                      
		              
		                          <div class="item-except text-sm text-muted h-1x">
		                          ryd@gmail.com
		                          </div>
		                      <div class="item-tag tag hide">
		                      </div>
		                    </div>
		                    <div>
		                        <div class="item-action dropdown">
		                          <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
		                          <div class="dropdown-menu dropdown-menu-right text-color" role="menu">
		                            <a class="dropdown-item">
		                            	<i class="fa fa-tag"></i>
		                            	Action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-pencil"></i>
		                            	Another action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-reply"></i>
		                            	Something else here
		                            </a>
		                            <div class="dropdown-divider"></div>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-ellipsis-h"></i>
		                            	Separated link
		                            </a>
		                          </div>
		                        </div>
		                    </div>
		                  </div>
		                  <div class="list-item " data-id="item-2">
		                    <span class="w-40 avatar circle light-blue">
		                      <i class="off b-white avatar-right"></i>
		                        K
		                    </span>
		                    <div class="list-body">
		                          <a href="" class="item-title _500">Kygo</a>
		                      
		              
		                          <div class="item-except text-sm text-muted h-1x">
		                          kygo@gmail.com
		                          </div>
		                      <div class="item-tag tag hide">
		                      </div>
		                    </div>
		                    <div>
		                        <div class="item-action dropdown">
		                          <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
		                          <div class="dropdown-menu dropdown-menu-right text-color" role="menu">
		                            <a class="dropdown-item">
		                            	<i class="fa fa-tag"></i>
		                            	Action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-pencil"></i>
		                            	Another action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-reply"></i>
		                            	Something else here
		                            </a>
		                            <div class="dropdown-divider"></div>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-ellipsis-h"></i>
		                            	Separated link
		                            </a>
		                          </div>
		                        </div>
		                    </div>
		                  </div>
		                  <div class="list-item " data-id="item-14">
		                    <span class="w-40 avatar circle brown">
		                      <i class="off b-white avatar-right"></i>
		                        BW
		                    </span>
		                    <div class="list-body">
		                          <a href="" class="item-title _500">Brielle Williamson</a>
		                      
		              
		                          <div class="item-except text-sm text-muted h-1x">
		                          brielle-williamson@gmail.com
		                          </div>
		                      <div class="item-tag tag hide">
		                      </div>
		                    </div>
		                    <div>
		                        <div class="item-action dropdown">
		                          <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
		                          <div class="dropdown-menu dropdown-menu-right text-color" role="menu">
		                            <a class="dropdown-item">
		                            	<i class="fa fa-tag"></i>
		                            	Action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-pencil"></i>
		                            	Another action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-reply"></i>
		                            	Something else here
		                            </a>
		                            <div class="dropdown-divider"></div>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-ellipsis-h"></i>
		                            	Separated link
		                            </a>
		                          </div>
		                        </div>
		                    </div>
		                  </div>
		                  <div class="list-item " data-id="item-5">
		                    <span class="w-40 avatar circle blue-grey">
		                      <i class="on b-white avatar-right"></i>
		                        R
		                    </span>
		                    <div class="list-body">
		                          <a href="" class="item-title _500">Radionomy</a>
		                      
		              
		                          <div class="item-except text-sm text-muted h-1x">
		                          radionomy@gmail.com
		                          </div>
		                      <div class="item-tag tag hide">
		                      </div>
		                    </div>
		                    <div>
		                        <div class="item-action dropdown">
		                          <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
		                          <div class="dropdown-menu dropdown-menu-right text-color" role="menu">
		                            <a class="dropdown-item">
		                            	<i class="fa fa-tag"></i>
		                            	Action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-pencil"></i>
		                            	Another action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-reply"></i>
		                            	Something else here
		                            </a>
		                            <div class="dropdown-divider"></div>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-ellipsis-h"></i>
		                            	Separated link
		                            </a>
		                          </div>
		                        </div>
		                    </div>
		                  </div>
		            </div>
	            </div>
			</div>
		</div>

		<div class="row no-gutters box">
			<div class="col-md-6 light lt p-3">
				<div id="jqvmap-world" data-plugin="vectorMap" style="height:280px"></div>
			</div>
			<div class="col-md-6">
				<div class="padding">
					<h6 class="mb-2">Global sales</h6>
					<p class="text-sm">
						<i class="fa fa-caret-down text-warn"></i> <span class="text-muted">Min:</span> $39,050 
						<i class="fa fa-caret-up text-success ml-2"></i> <span class="text-muted">Max:</span> $78,560 
					</p>
					<div>
						<div class="p-1">
							<small>
								<span class="float-right text-muted">45%</span>
								USA
							</small>
							<div class="progress my-1" style="height:6px;">
						        <div class="progress-bar primary" style="width: 45%"></div>
						    </div>
						</div>
						<div class="p-1">
							<small>
								<span class="float-right text-muted">25%</span>
								Germany
							</small>
							<div class="progress my-1" style="height:6px;">
						        <div class="progress-bar primary" style="width: 25%"></div>
						    </div>
						</div>
						<div class="p-1">
							<small>
								<span class="float-right text-muted">15%</span>
								France
							</small>
							<div class="progress my-1" style="height:6px;">
						        <div class="progress-bar primary" style="width: 15%"></div>
						    </div>
						</div>
						<div class="p-1">
							<small>
								<span class="float-right text-muted">5%</span>
								Other
							</small>
							<div class="progress my-1" style="height:6px;">
						        <div class="progress-bar grey lt" style="width: 5%"></div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="padding box">
					    <span class="badge success float-right">5</span>
					  <h6 class="mb-3">Activity</h6>
					  <div class="streamline ">
					    <div class="sl-item  b- ">
					          <div class="sl-left">
					            <img src="<?php echo ADMIN_IMAGES_PATH;?>a3.jpg" class="circle" alt=".">
					          </div>
					      <div class="sl-content">
					        <span class="sl-date text-muted">09:05</span>
					        <div>
					          <a href="#" class="text-primary">Jeremy Scott</a>
					          Assign you a task
					        </div>
					      </div>
					    </div>
					    <div class="sl-item  b- ">
					          <div class="sl-left">
					            <img src="<?php echo ADMIN_IMAGES_PATH;?>a8.jpg" class="circle" alt=".">
					          </div>
					      <div class="sl-content">
					        <span class="sl-date text-muted">14:00</span>
					        <div>
					          <a href="#" class="text-primary">RYD</a>
					          Add inline SVG icon
					        </div>
					      </div>
					    </div>
					    <div class="sl-item  b- ">
					          <div class="sl-left">
					            <img src="<?php echo ADMIN_IMAGES_PATH;?>a5.jpg" class="circle" alt=".">
					          </div>
					      <div class="sl-content">
					        <span class="sl-date text-muted">09:50</span>
					        <div>
					          <a href="#" class="text-primary">Radionomy</a>
					          Was added to Repo
					        </div>
					      </div>
					    </div>
					    <div class="sl-item  b- ">
					      <div class="sl-content">
					        <span class="sl-date text-muted">13:00</span>
					        <div>
					          <a href="#" class="text-primary">Garrett Winters</a>
					          Followed by Jessic
					        </div>
					      </div>
					    </div>
					    <div class="sl-item  b- ">
					          <div class="sl-left">
					            <img src="<?php echo ADMIN_IMAGES_PATH;?>a6.jpg" class="circle" alt=".">
					          </div>
					      <div class="sl-content">
					        <span class="sl-date text-muted">13:23</span>
					        <div>
					          <a href="#" class="text-primary">Rita Ora</a>
					          Sent you an email
					        </div>
					      </div>
					    </div>
					  </div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="padding box">
					  <h6 class="mb-3">Tasks</h6>
					  <div class="streamline streamline-xs">
					    <div class="sl-item  b- ">
					      <div class="sl-content">
					        <span class="sl-date text-muted">09:05</span>
					        <div>
					          <a href="#" class="text-primary">Jeremy Scott</a>
					          Assign you a task
					        </div>
					      </div>
					    </div>
					    <div class="sl-item  b-info ">
					      <div class="sl-content">
					        <span class="sl-date text-muted">12:05</span>
					        <div>
					          <a href="#" class="text-primary">Judith Garcia</a>
					          Follow up to close deal
					        </div>
					      </div>
					    </div>
					    <div class="sl-item  b-info ">
					      <div class="sl-content">
					        <span class="sl-date text-muted">11:30</span>
					        <div>
					          <a href="#" class="text-primary">Ashton Cox</a>
					          New feedback from John
					        </div>
					      </div>
					    </div>
					    <div class="sl-item  b- ">
					      <div class="sl-content">
					        <span class="sl-date text-muted">08:00</span>
					        <div>
					          <a href="#" class="text-primary">Brielle Williamson</a>
					          User experience improvements
					        </div>
					      </div>
					    </div>
					    <div class="sl-item  b-success ">
					      <div class="sl-content">
					        <span class="sl-date text-muted">13:23</span>
					        <div>
					          <a href="#" class="text-primary">Rita Ora</a>
					          Sent you an email
					        </div>
					      </div>
					    </div>
					  </div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="padding box">
		            <h6>Friends</h6>
		            <div class="list inset">
		                  <div class="list-item " data-id="item-14">
		                    <span class="w-24 avatar circle brown">
		                        BW
		                    </span>
		                    <div class="list-body">
		                          <a href="" class="item-title _500">Brielle Williamson</a>
		                      
		              
		                      <div class="item-tag tag hide">
		                      </div>
		                    </div>
		                    <div>
		                        <div class="item-action dropdown">
		                          <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
		                          <div class="dropdown-menu dropdown-menu-right text-color" role="menu">
		                            <a class="dropdown-item">
		                            	<i class="fa fa-tag"></i>
		                            	Action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-pencil"></i>
		                            	Another action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-reply"></i>
		                            	Something else here
		                            </a>
		                            <div class="dropdown-divider"></div>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-ellipsis-h"></i>
		                            	Separated link
		                            </a>
		                          </div>
		                        </div>
		                    </div>
		                  </div>
		                  <div class="list-item " data-id="item-4">
		                    <span class="w-24 avatar circle pink">
		                        JG
		                    </span>
		                    <div class="list-body">
		                          <a href="" class="item-title _500">Judith Garcia</a>
		                      
		              
		                      <div class="item-tag tag hide">
		                      </div>
		                    </div>
		                    <div>
		                        <div class="item-action dropdown">
		                          <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
		                          <div class="dropdown-menu dropdown-menu-right text-color" role="menu">
		                            <a class="dropdown-item">
		                            	<i class="fa fa-tag"></i>
		                            	Action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-pencil"></i>
		                            	Another action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-reply"></i>
		                            	Something else here
		                            </a>
		                            <div class="dropdown-divider"></div>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-ellipsis-h"></i>
		                            	Separated link
		                            </a>
		                          </div>
		                        </div>
		                    </div>
		                  </div>
		                  <div class="list-item " data-id="item-9">
		                    <span class="w-24 avatar circle cyan">
		                        PN
		                    </span>
		                    <div class="list-body">
		                          <a href="" class="item-title _500">Pablo Nouvelle</a>
		                      
		              
		                      <div class="item-tag tag hide">
		                      </div>
		                    </div>
		                    <div>
		                        <div class="item-action dropdown">
		                          <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
		                          <div class="dropdown-menu dropdown-menu-right text-color" role="menu">
		                            <a class="dropdown-item">
		                            	<i class="fa fa-tag"></i>
		                            	Action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-pencil"></i>
		                            	Another action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-reply"></i>
		                            	Something else here
		                            </a>
		                            <div class="dropdown-divider"></div>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-ellipsis-h"></i>
		                            	Separated link
		                            </a>
		                          </div>
		                        </div>
		                    </div>
		                  </div>
		                  <div class="list-item " data-id="item-1">
		                    <span class="w-24 avatar circle grey">
		                        S
		                    </span>
		                    <div class="list-body">
		                          <a href="" class="item-title _500">Summerella</a>
		                      
		              
		                      <div class="item-tag tag hide">
		                      </div>
		                    </div>
		                    <div>
		                        <div class="item-action dropdown">
		                          <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
		                          <div class="dropdown-menu dropdown-menu-right text-color" role="menu">
		                            <a class="dropdown-item">
		                            	<i class="fa fa-tag"></i>
		                            	Action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-pencil"></i>
		                            	Another action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-reply"></i>
		                            	Something else here
		                            </a>
		                            <div class="dropdown-divider"></div>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-ellipsis-h"></i>
		                            	Separated link
		                            </a>
		                          </div>
		                        </div>
		                    </div>
		                  </div>
		                  <div class="list-item " data-id="item-10">
		                    <span class="w-24 avatar circle blue">
		                        P
		                    </span>
		                    <div class="list-body">
		                          <a href="" class="item-title _500">Postiljonen</a>
		                      
		              
		                      <div class="item-tag tag hide">
		                      </div>
		                    </div>
		                    <div>
		                        <div class="item-action dropdown">
		                          <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
		                          <div class="dropdown-menu dropdown-menu-right text-color" role="menu">
		                            <a class="dropdown-item">
		                            	<i class="fa fa-tag"></i>
		                            	Action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-pencil"></i>
		                            	Another action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-reply"></i>
		                            	Something else here
		                            </a>
		                            <div class="dropdown-divider"></div>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-ellipsis-h"></i>
		                            	Separated link
		                            </a>
		                          </div>
		                        </div>
		                    </div>
		                  </div>
		                  <div class="list-item " data-id="item-2">
		                    <span class="w-24 avatar circle light-blue">
		                        K
		                    </span>
		                    <div class="list-body">
		                          <a href="" class="item-title _500">Kygo</a>
		                      
		              
		                      <div class="item-tag tag hide">
		                      </div>
		                    </div>
		                    <div>
		                        <div class="item-action dropdown">
		                          <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
		                          <div class="dropdown-menu dropdown-menu-right text-color" role="menu">
		                            <a class="dropdown-item">
		                            	<i class="fa fa-tag"></i>
		                            	Action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-pencil"></i>
		                            	Another action
		                            </a>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-reply"></i>
		                            	Something else here
		                            </a>
		                            <div class="dropdown-divider"></div>
		                            <a class="dropdown-item">
		                            	<i class="fa fa-ellipsis-h"></i>
		                            	Separated link
		                            </a>
		                          </div>
		                        </div>
		                    </div>
		                  </div>
		            </div>
		        </div>
			</div>
		</div>
	</div>
</div>


<!-- ############ Main END-->

	</div>
	    <!-- Footer -->
	    <?php $this->load->view(ADMIN_FOOTER_PATH);?>
	</div>
	<!-- ############ Content END-->

<!-- ############ LAYOUT END-->
</div>


<!-- ############ SWITHCHER START-->
<?php $this->load->view(ADMIN_SIDESWITCH_PATH);?>
<!-- ############ SWITHCHER END-->

<!-- build:js <?php echo ADMIN_SCRIPTS_PATH;?>app.min.js -->
<!-- jQuery -->
  <script src="<?php echo LIBS_PATH;?>jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
  <script src="<?php echo LIBS_PATH;?>popper.js/dist/umd/popper.min.js"></script>
  <script src="<?php echo LIBS_PATH;?>bootstrap/dist/js/bootstrap.min.js"></script>
<!-- core -->
  <script src="<?php echo LIBS_PATH;?>pace-progress/pace.min.js"></script>
  <script src="<?php echo LIBS_PATH;?>pjax/pjax.js"></script>

  <script src="<?php echo ADMIN_SCRIPTS_PATH;?>lazyload.config.js"></script>
  <script src="<?php echo ADMIN_SCRIPTS_PATH;?>lazyload.js"></script>
  <script src="<?php echo ADMIN_SCRIPTS_PATH;?>plugin.js"></script>
  <script src="<?php echo ADMIN_SCRIPTS_PATH;?>nav.js"></script>
  <script src="<?php echo ADMIN_SCRIPTS_PATH;?>scrollto.js"></script>
  <script src="<?php echo ADMIN_SCRIPTS_PATH;?>toggleclass.js"></script>
  <script src="<?php echo ADMIN_SCRIPTS_PATH;?>theme.js"></script>
  <script src="<?php echo ADMIN_SCRIPTS_PATH;?>ajax.js"></script>
  <script src="<?php echo ADMIN_SCRIPTS_PATH;?>app.js"></script>
<!-- endbuild -->
</body>
</html>
