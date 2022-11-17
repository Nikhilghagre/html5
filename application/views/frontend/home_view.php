<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('frontend/common/head_view');
$this->load->view('frontend/common/header_view');
?>

<div >
              <center>
                    <div class="col-sm-11" >
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                            <?php
                        foreach ($slidersList as $slider){
                             ?>
                              <div class="carousel-item active " style="background:rgb(32, 2, 2); border-radius: 20px; ">
                                <img class="d-block w-50" src="<?php echo base_url().'assets/upload/slider/'.$slider->slider_image; ?>" alt="First slide"  style="background:red">
                              </div>
                              <div class="carousel-item" style="background:green; border-radius: 20px;">
                                <img class="d-block w-50" src="<?php echo base_url().'assets/upload/slider/'.$slider->slider_image; ?>" alt="Second slide" >
                              </div>
                              <div class="carousel-item" style="background:blue; border-radius: 20px;">
                                <img class="d-block w-50" src="<?php echo base_url().'assets/upload/slider/'.$slider->slider_image; ?>" alt="Third slide" >
                              </div>
                            <?php
                            }
                            ?>
                            </div>
                          </div>
                    </div>
                </center>
                  
            </div>


            <!-- //main content -->
            <div>
                <br><br>
            </div>
        <?php
		if(!empty($latestContent))
		{
		?>
            <div  class="col-sm-11 mx-auto">  
            <h3 class="text-white mb-4">Latest Games</h3> 
            <div class="row"> 
           
                <div class="col-sm-10 mx-auto" style=" ">
                    
                        <div class="row">
                            <?php
                            foreach ($latestContent as $latest) {
                            ?>

                                <div class="col-sm-2 mr-4 " style=" ">
                                    <div class="card " style="width: 14rem;  background:#3765dd;">
                                    <a href="<?php echo base_url()."Web/content/$latest->content_id/$latest->content_slug" ?>">  <img class="card-img-top" src="<?php echo base_url().'assets/upload/content/thumbnail/'.$latest->content_image; ?>" alt="Card image cap" style=" border-radius: 20px;"></a>
                                            <div class="card-body">
                                                <h5 class="card-text text-center text-white"><?php echo character_limiter($latest->content_title, 11); ?> </h5>
                                            </div>
                                        </div>
                                </div>

                             <?php
                            }
                            ?>   
                       

                     

                            
    
                        </div>
                </div>

                <?php
                }
                ?>
                    <div class="col-sm-2 mx-auto" style=" border-radius: 10px;">
                            <div>
                                <img src="https://m.media-amazon.com/images/M/MV5BNzQwNTU0NjMtY2FhZS00NDI2LTg1MzktODZjYWIzYWRhOTZmXkEyXkFqcGdeQXVyNTIzOTk5ODM@._V1_.jpg" alt="ads" style="width:300px; max-height:500px; background:#fff; border-radius: 10px;">
                            </div> 
                        
                    </div>
                </div>
            </div>    
            
           <div>
            <br>
            <br>
            <br>
           </div>

            <div>
               
                        <?php
                        if(!empty($featuredContent)){
                        ?>
                        <div class="col-sm-11 mx-auto"  >
                            <h3 class="text-white mb-4">Featured Games</h3> 
                                <div class="row">
                                <?php
                            foreach ($featuredContent as $featured) {
                            ?>
                                    
                                    <div class="col-sm-2  " style=" ">
                                        <div class="card " style="width: 15rem;  background:#3765dd;">
                                            <a href="<?php echo base_url()."Web/content/$featured->content_id/$featured->content_slug" ?>"><img class="card-img-top" src="<?php echo base_url().'assets/upload/content/thumbnail/'.$featured->content_image; ?>" alt="Card image cap" style=" border-radius: 20px;"></a>
                                            <div class="card-body">
                                                <h5 class="card-text text-center text-white"><?php echo character_limiter($featured->content_title, 11); ?> </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    }
                                    ?>
                         
                                    
                                </div>
                        </div>
                        <?php
                        }
                        ?>
                
            </div>    






    <!-- <main class="main-content">
        
        <section class="main-slider type_two">
            <div class="main-slider-carousel main_slider_two owl-carousel owl-theme" style="box-shadow: 0px 0px 8px #666666; direction: ltr">
                <?php
                foreach ($slidersList as $slider)
                {
                ?>
                    <div class="slide one" style="background-image:url(<?php echo base_url().'assets/upload/slider/'.$slider->slider_image; ?>)">
                        <div class="container text-left">
                            <div class="content_box">
                                <div class="content outer">
                                    <div class="inner_box">
                                        <h1 class="text-white"><?php echo $slider->slider_title ?></h1>
                                        <div class="text text-white"><?php echo $slider->slider_description ?></div>
                                        <a href="<?php echo base_url().'Web/content/'.$slider->slider_content_id.'/'.$slider->slider_slug; ?>" class="theme_btn tp_four"><?php echo $this->lang->line("Read More"); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </section> -->

        <!-- categories -->
        <!-- <section class="doctor type_category">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12 padding_zero">
                        <div class="item">
                            <ul id="category-slider">
                            <?php
                            foreach ($categoriesList as $category) {
                            ?>
                                <div onclick="location.href='<?php echo base_url()."Web/content_list/?category=$category->category_id&title=$category->category_slug"; ?>';">
                                    <div style="margin-left: 6px; margin-right: 6px; margin-top: 6px; text-align: center">
                                        <img class="" width="25%" height="auto" src="<?php echo base_url()."assets/upload/category/".$category->category_image; ?>" class="img-circle" alt="<?php echo $category->category_title ?>">
                                    </div>
                                    <p class="text-center" style="padding-top: 10px; color: black;"><?php echo $category->category_title ?></p>
                                </div>
                            <?php
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!--<div class="text-center">
            <br><br>
            <img class="banner_ads_728_90" src="<?php echo base_url()."assets/frontend/images/728-90.png"; ?>">
        </div>-->

        <!-----------featured----------------->
		<!-- <?php
		if(!empty($featuredContent))
		{
		?>
        <section class="doctor type_three">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading text-center tp_three">
                            <h6><?php echo $this->lang->line("Featured"); ?></h6>
                            <h1><?php echo $this->lang->line("Featured Content"); ?></h1>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-12 padding_zero">
                        <div class="owl-carousel four_items">
                            <?php
                            foreach ($featuredContent as $featured) {
                            ?>
                            <div class="blog_box type_two <?php if ($this->lang->line("app_direction") == "rtl") echo "rtl"; ?>">
                                <div class="image_box">
                                    <img src="<?php echo base_url().'assets/upload/content/thumbnail/'.$featured->content_image; ?>" class="img-fluid"/>
                                    <div class="overlay">
                                        <a href="<?php echo base_url()."Web/content/$featured->content_id/$featured->content_slug" ?>" class="contact_doctor"><?php echo $featured->content_type_title; ?></a>
                                    </div>
                                </div>
                                <div class="content_box">
									<a href="#" class="category"><?php echo $featured->category_title; ?></a>
                                    <h2><a href="<?php echo base_url()."Web/content/$featured->content_id/$featured->content_slug" ?>"><?php echo character_limiter($featured->content_title, 11); ?></a></h2>
									<div class="post-date">
										<p><span class="fa fa-clock-o"></span> <?php if ($this->lang->line("date-format-ago") == "default") echo timespan($featured->content_publish_date, now(), 2)." ".$this->lang->line("ago").""; elseif($this->lang->line("date-format-ago") == "jdf") echo timespan($featured->content_publish_date, now(), 2)." ".$this->lang->line("ago").""; else echo timespan($featured->content_publish_date, now(), 2)." ".$this->lang->line("ago"); ?></p>
									</div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
		}
		?> -->

        <!-----------latest----------------->
		<!-- <?php
		if(!empty($latestContent))
		{
		?>
        <section class="doctor type_ten">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12 ">
                        <div class="heading text-center tp_three">
                            <h6><?php echo $this->lang->line("Latest"); ?></h6>
                            <h1><?php echo $this->lang->line("Latest Content"); ?></h1>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-12 padding_zero">
                        <div class="owl-carousel four_items">
                            <?php
                            foreach ($latestContent as $latest) {
                            ?>
                            <div class="blog_box type_two <?php if ($this->lang->line("app_direction") == "rtl") echo "rtl"; ?>">
                                <div class="image_box">
                                    <img src="<?php echo base_url().'assets/upload/content/thumbnail/'.$latest->content_image; ?>" class="img-fluid"/>
                                    <div class="overlay ">
                                        <a href="<?php echo base_url()."Web/content/$latest->content_id/$latest->content_slug" ?>" class="contact_doctor"><?php echo $latest->content_type_title; ?></a>
                                    </div>
                                </div>
                                <div class="content_box">
									<a href="#" class="category"><?php echo $latest->category_title; ?></a>
                                    <h2><a href="<?php echo base_url()."Web/content/$latest->content_id/$latest->content_slug" ?>"><?php echo character_limiter($latest->content_title, 11); ?></a></h2>
									<div class="post-date">
										<p><span class="fa fa-clock-o"></span> <?php if ($this->lang->line("date-format-ago") == "default") echo timespan($latest->content_publish_date, now(), 2)." ".$this->lang->line("ago").""; elseif($this->lang->line("date-format-ago") == "jdf") echo timespan($latest->content_publish_date, now(), 2)." ".$this->lang->line("ago").""; else echo timespan($latest->content_publish_date, now(), 2)." ".$this->lang->line("ago"); ?></p>
									</div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
		}
		?> -->

		<!-----------special----------------->
		<!-- <?php
		if(!empty($specialContent))
		{
		?>
		<section class="doctor type_three">
			<div class="container">
				<div class="row ">
					<div class="col-lg-12 ">
						<div class="heading text-center tp_three">
							<h6><?php echo $this->lang->line("Special"); ?></h6>
							<h1><?php echo $this->lang->line("Special Content"); ?></h1>
						</div>
					</div>
				</div>
				<div class="row ">
					<div class="col-lg-12 padding_zero">
						<div class="owl-carousel four_items">
							<?php
							foreach ($specialContent as $special) {
								?>
								<div class="blog_box type_two <?php if ($this->lang->line("app_direction") == "rtl") echo "rtl"; ?>">
									<div class="image_box">
										<img src="<?php echo base_url().'assets/upload/content/thumbnail/'.$special->content_image; ?>" class="img-fluid"/>
										<div class="overlay ">
											<a href="<?php echo base_url()."Web/content/$special->content_id/$special->content_slug" ?>" class="contact_doctor"><?php echo $special->content_type_title; ?></a>
										</div>
									</div>
									<div class="content_box">
										<a href="#" class="category"><?php echo $special->category_title; ?></a>
										<h2><a href="<?php echo base_url()."Web/content/$special->content_id/$special->content_slug" ?>"><?php echo character_limiter($special->content_title, 11); ?></a></h2>
										<div class="post-date">
											<p><span class="fa fa-clock-o"></span> <?php if ($this->lang->line("date-format-ago") == "default") echo timespan($special->content_publish_date, now(), 2)." ".$this->lang->line("ago").""; elseif($this->lang->line("date-format-ago") == "jdf") echo timespan($special->content_publish_date, now(), 2)." ".$this->lang->line("ago").""; else echo timespan($special->content_publish_date, now(), 2)." ".$this->lang->line("ago"); ?></p>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
		}
		?> -->


<?php
$this->load->view('frontend/common/footer_view');
?>
