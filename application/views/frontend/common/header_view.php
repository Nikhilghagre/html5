<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">

         <div>
            <br>
         </div>
          
            <h6 class="title">ooltahchasmaplay.com</h6>
            <div class="sidebar-header">
                
                <h6><img src="<?php echo base_url()."assets/upload/menu/categories.jpeg"; ?>" alt="" width="25px">&nbsp;&nbsp;Categories</h6>
            </div>

              <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>
        
        <ul>
        <?php
            foreach ($categoriesList as $category) {
         ?>
            <li id="li"><a href="<?php echo base_url()."Web/content_list/?category=$category->category_id&title=$category->category_slug"; ?>"><img src="<?php echo base_url()."assets/upload/category/".$category->category_image; ?>" alt="" style="width:30px;">&nbsp;&nbsp;<?php echo $category->category_title ?></a></li>
          <?php
            }
        ?>
         </ul>
       
       

          
        </nav>

        <!-- Page Content  -->
        <div id="content ">


            <nav class="navbar navbar-expand-lg navbar-light" style="background: #162c66;">
                <div class="container-fluid">

                   
                    <button type="" id="sidebarCollapse" class="btn " style="background:#162c66 ;">
                       <img src="<?php echo base_url()."assets/upload/menu/"; ?>menu.png" alt="" width="35px">
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <img src="<?php echo base_url()."assets/upload/menu/"; ?>menu.png" alt="" width="35px">
                    </button>
                    <h5 class="text-white">ooltahchasmaplay.com</h5>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active mx-3 ">
                                <img class=''data-toggle="modal" data-target="#exampleModal" src="<?php echo base_url()."assets/upload/menu/"; ?>search.jpeg" alt=""  width="60px" height="50px" >
                                <a class="nav text-white " data-toggle="modal" data-target="#exampleModal" href="#">Search</a>
                            </li>
                           
                            <li class="nav-item mx-3">
                                <img src="<?php echo base_url()."assets/upload/menu/"; ?>home.jpeg" alt="" width="60px" height="50px" >
                                <a class="nav pl-2 text-white" href="<?php echo base_url().'/' ?>">Home</a>
                            </li>
                            <li class="nav-item mx-3">
                                <img src="<?php echo base_url()."assets/upload/menu/"; ?>about.jpeg" alt="" width="60px" height="50px">
                                <a class="nav pl-2 text-white" href="#">About Us</a>
                            </li>
                            <li class="nav-item mx-3">
                                <img src="<?php echo base_url()."assets/upload/menu/"; ?>user.jpeg" alt="" width="60px" height="50px" >
                                <a class="nav pl-2 text-white" href="<?php echo base_url().'dashboard/Dashboard' ?>">You</a>
                            </li>
                            <li class="nav-item mx-3">
                               <a href="<?php echo base_url().'dashboard/Auth/user_logout_process' ?>"> <img src="<?php echo base_url()."assets/upload/menu/"; ?>logout.jpeg" alt="" width="60px" height="50px"></a>
                                <a class="nav pl-2 text-white" href="<?php echo base_url().'dashboard/Auth/user_logout_process' ?>">SignOut</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>




<!-- Search Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()."Web/content_list/"; ?>" method="get">
        <input type="text" name="keyword" class="form-control" placeholder="Enter here">
        
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary">Search</button>
        </form>
      </div>
    </div>
  </div>
</div>

            
<!-- <div class="page_wapper"> -->
    <!--Start Preloader-->
  
    <!--End Preloader-->
    <!--Header-->

    <!-- <header class="header_v4 <?php if ($this->lang->line("app_direction") == "rtl") echo "rtl"; ?>">
        <section class="header_top" <?php if ($this->lang->line("app_direction") == "rtl") echo "style='direction: rtl'";?>>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 my_top_left_bar">
                        <div class="text_left">
                            <ul>
                                <li><span class="fa fa-map-marker"></span> <?php echo $setting->setting_address ?></li>
                                <li><span class="fa fa-phone"></span> <?php echo $setting->setting_phone1 ?></li> -->
                                <!--<li><span class="fa fa-envelope"></span> <?php echo $setting->setting_email ?></li>-->
                            <!-- </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text_right" <?php if ($this->lang->line("app_direction") == "rtl") echo "style='text-align: left;'";?>>

                            <ul class="social-media">
                                <?php
                                if(isset($_SESSION['user_id']))
                                {
                                ?>
									<li>
										<div class="dropdown">
											<a type="button" class="dropdown-toggle" data-toggle="dropdown">
												<?php echo $this->lang->line("Hello"); ?>, <?php echo $_SESSION['user_username'] ?>
											</a>
											<div class="dropdown-menu dropdown-menu-right" <?php if ($this->lang->line("app_direction") == "rtl") echo "style='text-align: right; direction: rtl;'";?>>
												<a class="dropdown-item" style="color: #363636; font-size: 13px;" href="<?php echo base_url().'dashboard/Dashboard' ?>"><?php echo $this->lang->line("Dashboard"); ?></a>
												<a class="dropdown-item" style="color: #363636; font-size: 13px;" href="<?php echo base_url().'dashboard/User/profile/' ?>"><?php echo $this->lang->line("My Profile"); ?></a>
												<a class="dropdown-item" style="color: #363636; font-size: 13px;" href="<?php echo base_url().'Web/content_list/?bookmarks=yes' ?>"><?php echo $this->lang->line("Bookmarks"); ?></a>
												<a class="dropdown-item" style="color: #363636; font-size: 13px;" href="<?php echo base_url().'dashboard/Auth/user_logout_process' ?>"><?php echo $this->lang->line("Logout"); ?></a>
											</div>
										</div>
									</li>
                                <?php
                                }else{
                                ?>
                                    <li><a href="<?php echo base_url().'dashboard/Auth' ?>"><i class="fa fa-lock"></i> <?php echo $this->lang->line("Login"); ?></a></li>
                                    <li><a href="<?php echo base_url().'dashboard/Auth/register' ?>"><i class="fa fa-user-plus"></i> <?php echo $this->lang->line("Register"); ?></a></li>
                                <?php } ?>
								<li>
									<div class="dropdown">&nbsp;
										<a type="button" class="dropdown-toggle" data-toggle="dropdown">
											<i  class="fa fa-language"></i>
										</a>
										<div <?php if ($this->lang->line("app_direction") == "rtl") echo "class='dropdown-menu dropdown-menu-left'"; else echo "class='dropdown-menu dropdown-menu-right'";?> <?php if ($this->lang->line("app_direction") == "rtl") echo "style='text-align: right; direction: rtl;'";?>>
											<a class="dropdown-item" style="color: #363636; font-size: 13px;" href="<?php echo base_url()."LangSwitch/switchDashboardLanguage/english"; ?>"><?php echo $this->lang->line("language_english"); ?></a>
											<a class="dropdown-item" style="color: #363636; font-size: 13px;" href="<?php echo base_url()."LangSwitch/switchDashboardLanguage/arabic"; ?>"><?php echo $this->lang->line("language_arabic"); ?></a>
											<a class="dropdown-item" style="color: #363636; font-size: 13px;" href="<?php echo base_url()."LangSwitch/switchDashboardLanguage/hindi"; ?>"><?php echo $this->lang->line("language_india"); ?></a>
										</div>
									</div>
								</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->


        <!-- <section class="navbar_outer">
            <div class="navbar navbar-expand-lg  bsnav bsnav-sticky bsnav-sticky-slide">
                <div class="container" <?php if ($this->lang->line("app_direction") == "rtl") echo "style='direction: rtl;'";?>>
                    <a class="navbar-brand" href="<?php echo base_url() ?>">
                        <img title="<?php echo $setting->setting_app_name ?>" src="<?php echo base_url().'assets/upload/'.$setting->setting_logo; ?>" width="" class="img-fluid" alt="img">
                    </a>
                    <button class="navbar-toggler toggler-spring"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse scroll-nav">
                        <ul class="navbar-nav navbar-mobile navbar_left ml-auto" id="nav">
                            <li class="nav-item nav_item"><a class="nav-link link_hd" href="<?php echo base_url(); ?>"><?php echo $this->lang->line("Home"); ?></a></li>

                            <li class="nav-item nav_item dropdown">
                                <a class="nav-link link_hd" href="#"><?php echo $this->lang->line("Categories"); ?></a>
                                <ul class="navbar-nav submenu">
                                    <?php
                                    foreach ($categoriesList as $category)
                                    {
                                    ?>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url().'Web/content_list/?category='.$category->category_id.'&title='.$category->category_slug; ?>"><?php echo $category->category_title; ?></a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>

                            <li class="nav-item nav_item"><a class="nav-link link_hd" href="<?php echo base_url().'Web/content_list?title=all-content' ?>"><?php echo $this->lang->line("Content"); ?></a></li>

                            <li class="nav-item nav_item"><a class="nav-link link_hd" data-toggle="modal" data-target="#modalAbout" href="#"><?php echo $this->lang->line("About Us"); ?></a></li>

                            <li class="nav-item nav_item"><a class="nav-link link_hd" data-toggle="modal" data-target="#modalTerms" href="#"><?php echo $this->lang->line("Terms"); ?></a></li>

                            <li class="nav-item nav_item"><a class="nav-link link_hd" data-toggle="modal" data-target="#modalPrivacy" href="#"><?php echo $this->lang->line("Privacy Policy"); ?></a></li>

                            <li class="nav-item nav_item"><a class="nav-link link_hd" data-toggle="modal" data-target="#modalContact" href="#"><?php echo $this->lang->line("Contact Us"); ?></a></li>
                        </ul>

                        <ul class="navbar-nav navbar-mobile navbar_right">
                            <li class="nav-item dropdown">
                                <a href="# " class="topbar-one__search search-popup__toggler"><i class="flaticon-search icon"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </header> -->
    <!--Header-->

    <!-- Contact Modal -->
    <div class="modal fade" id="modalContact">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo $this->lang->line("Contact Us"); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body <?php if ($this->lang->line("app_direction") == "rtl") echo "rtl"; ?>">
                    <?php
                    $json_content = file_get_contents(base_url()."dashboard/Api/get_one_page/5/?api_key=".$apiKey);
                    $content = json_decode($json_content);
                    foreach($content as $mydata)
                    {
                        echo html_entity_decode($mydata->page_content);
                    }
                    ?>
                    <br>
                </div>

            </div>
        </div>
    </div>

    <!-- About Modal -->
    <div class="modal fade" id="modalAbout">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo $this->lang->line("About Us"); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body <?php if ($this->lang->line("app_direction") == "rtl") echo "rtl"; ?>">
                    <?php
                    $json_content = file_get_contents(base_url()."dashboard/Api/get_one_page/4/?api_key=".$apiKey);
                    $content = json_decode($json_content);
                    foreach($content as $mydata)
                    {
                        echo html_entity_decode($mydata->page_content);
                    }
                    ?>
                    <br>
                </div>

            </div>
        </div>
    </div>

    <!-- Terms Modal -->
    <div class="modal fade" id="modalTerms">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo $this->lang->line("Terms Of Service"); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body <?php if ($this->lang->line("app_direction") == "rtl") echo "rtl"; ?>">
                    <?php
                    $json_content = file_get_contents(base_url()."dashboard/Api/get_one_page/1/?api_key=".$apiKey);
                    $content = json_decode($json_content);
                    foreach($content as $mydata)
                    {
                        echo html_entity_decode($mydata->page_content);
                    }
                    ?>
                    <br>
                </div>

            </div>
        </div>
    </div>

    <!-- Privacy Modal -->
    <!-- <div class="modal fade" id="modalPrivacy">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

               
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo $this->lang->line("Privacy Policy"); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div> -->

                <!-- Modal body -->
                <!-- <div class="modal-body <?php if ($this->lang->line("app_direction") == "rtl") echo "rtl"; ?>">
                    <?php
                    $json_content = file_get_contents(base_url()."dashboard/Api/get_one_page/2/?api_key=".$apiKey);
                    $content = json_decode($json_content);
                    foreach($content as $mydata)
                    {
                        echo html_entity_decode($mydata->page_content);
                    }
                    ?>
                    <br>
                </div>

            </div>
        </div>
    </div> -->

    <!-- GDPR Modal -->
    <!-- <div class="modal fade" id="modalGDPR">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"> -->

                <!-- Modal Header -->
                <!-- <div class="modal-header">
                    <h4 class="modal-title"><?php echo $this->lang->line("GDPR Law"); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div> -->

                <!-- Modal body -->
                <!-- <div class="modal-body <?php if ($this->lang->line("app_direction") == "rtl") echo "rtl"; ?>">
                    <?php
                    $json_content = file_get_contents(base_url()."dashboard/Api/get_one_page/3/?api_key=".$apiKey);
                    $content = json_decode($json_content);
                    foreach($content as $mydata)
                    {
                        echo html_entity_decode($mydata->page_content);
                    }
                    ?>
                    <br>
                </div>

            </div>
        </div>
    </div> -->


	<!-- Ads Modal -->
	<!-- <div class="modal fade" id="modalAds">
		<div class="modal-dialog modal-lg">
			<div class="modal-content"> -->

				<!-- Modal Header -->
				<!-- <div class="modal-header">
					<h4 class="modal-title"><?php echo $this->lang->line("Advertising"); ?></h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div> -->

				<!-- Modal body -->
				<!-- <div class="modal-body <?php if ($this->lang->line("app_direction") == "rtl") echo "rtl"; ?>">
					<?php
					$json_content = file_get_contents(base_url()."dashboard/Api/get_one_page/7/?api_key=".$apiKey);
					$content = json_decode($json_content);
					foreach($content as $mydata)
					{
						echo html_entity_decode($mydata->page_content);
					}
					?>
					<br>
				</div>

			</div>
		</div>
	</div> -->
	
	<!--Start Cookie Notification-->
	<!-- <div class="modal fade cookieModal" id="cookieModal" tabindex="-1" role="dialog" aria-labelledby="cookieModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 id="cookieModalLabel"><?= $this->lang->line("Cookie Policy"); ?></h3>
				</div>
				<div class="modal-body <?php if ($this->lang->line("app_direction") == "rtl") echo "rtl"; ?>">
					<p><?= $this->lang->line("Cookies help us run this website. By using our website, you agree to our use of cookies."); ?></p>
				</div>
				<div class="modal-footer">
					<button id="cookieModalConsent" type="button" class="btn btn-success btn-lg btn-block" data-dismiss="modal"><?= $this->lang->line("Accept & Close"); ?></button>
				</div>
			</div>
		</div>
	</div> -->
	<!--End Cookie Notification-->
