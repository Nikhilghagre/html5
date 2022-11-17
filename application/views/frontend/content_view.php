<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('frontend/common/head_view');
$this->load->view('frontend/common/header_view');

if ($ratingAverage == 0.5) $ratingAverage = "<span class='fa fa-star-half-empty' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
if ($ratingAverage == 1) $ratingAverage = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
if ($ratingAverage == 1.5) $ratingAverage = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-half-empty' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
if ($ratingAverage == 2) $ratingAverage = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
if ($ratingAverage == 2.5) $ratingAverage = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-half-empty' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
if ($ratingAverage == 3) $ratingAverage = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
if ($ratingAverage == 3.5) $ratingAverage = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-half-empty' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
if ($ratingAverage == 4) $ratingAverage = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
if ($ratingAverage == 4.5) $ratingAverage = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-half-empty' style='color: #ff8800'></span>";
if ($ratingAverage == 5) $ratingAverage = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span>";

//Check bookmark status
$isBookmarked = 0;
if(isset($_SESSION['user_id']))
	{
		$user_id = $_SESSION['user_id'];
		$q = $this->db->query("Select *
					   FROM bookmark_table
					   WHERE (bookmark_user_id = $user_id AND bookmark_content_id = $contentDetail->content_id);");
		if ($q->num_rows() > 0)
			$isBookmarked = 1;
	}

$user_id = 0;
if(isset($_SESSION['user_id']))
	$user_id = $_SESSION['user_id'];
?>

   <!------main-content------>
   
            <!-- //main content -->
            <div>
                <br><br>
            </div>
            
            <div  class="col-sm-11 mx-auto" style="">  
           
                <div class="row"> 
           
                    <div class="col-sm-8 mx-auto" style=" "> 
                        <div class="row">
                            <div class="col-sm-12" >
                            
                            <center>
                               
                               <a href="<?php echo $contentDetail->content_url; ?>"><img class="py-4" src="<?php echo base_url() . 'assets/upload/content/' . $contentDetail->content_image; ?>" alt="" height="600px" width="90%" style=" border-radius: 50px;"></a>
                              
                            </center>
                            
                            </div>
                            <div class="col-sm-11 mx-auto">
                                <h6 class="text-white"><span class='fa fa-star' style='color: #ff8800'></span>&nbsp;&nbsp; 4.5/5 &nbsp;&nbsp; (<?php echo $contentDetail->content_viewed; ?>  Views)</h6>
                               <h6 class="mt-4 text-white"> Categories: <?php echo $contentDetail->category_title; ?></h6>

                                <br>

                                <p ><?php echo $contentDetail->content_description; ?></p>
                                    <div class="mt-5 mb-2">
                                        <img src="" alt="" width="900px" height="150px" style="background:#fff; border-radius: 20px">
                                    </div>

                                    <br>
                                    <h6 class="text-white mb-2">Reviews</h6>
                                    <div class="col-sm-12 mx-auto mb-5" style="background:rgb(131, 158, 229,0.7); border-radius:20px; min-height:100px">
                                     
                                      <?php
                                    foreach ($reviews as $review)
                                    {
                                        if ($review->comment_rate == 0.5) $comment_rate = "<span class='fa fa-star-half-empty' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
                                        if ($review->comment_rate == 1) $comment_rate = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
                                        if ($review->comment_rate == 1.5) $comment_rate = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-half-empty' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
                                        if ($review->comment_rate == 2) $comment_rate = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
                                        if ($review->comment_rate == 2.5) $comment_rate = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-half-empty' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
                                        if ($review->comment_rate == 3) $comment_rate = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
                                        if ($review->comment_rate == 3.5) $comment_rate = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-half-empty' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
                                        if ($review->comment_rate == 4) $comment_rate = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-o' style='color: #ff8800'></span>";
                                        if ($review->comment_rate == 4.5) $comment_rate = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star-half-empty' style='color: #ff8800'></span>";
                                        if ($review->comment_rate == 5) $comment_rate = "<span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span><span class='fa fa-star' style='color: #ff8800'></span>";
                                     ?>
                                        <div>
                                            <div class="row  mt-3  pt-3 px-3" >
                                                    <img class="rounded-circle mr-3" src="<?php echo base_url()."assets/upload/menu/user.jpeg"; ?> " alt="" width="45px">
                                                    <p class="p-1 text-dark"><?php echo $review->user_username; ?></p>
                                                    <div class="row m-2 pt1 "> <?php echo $comment_rate; ?></div>
                                                    <p class=" text-dark ml-2 pt-1"><small><?php echo timespan($review->comment_time, now(), 2)." ".$this->lang->line("ago"); ?></small></p>
                                                </div>
                                                <div class="col mt-1">
                                                    <h7><?php echo $review->comment_text; ?></h7>
                                                </div>
                                         </div>
                                        
     
                                        
                                        
                                        
                                        <?php
                                    }
                                    if(empty($reviews)){
                                        ?>
                                            <p class="pt-4"><?php echo $this->lang->line("Nothing Found...")."<br><br>";?></p>
                                        
                                    <?php
                                    } 
                                    ?>
                                    
                                    </div>


                                    <div class="col-sm-12 mx-auto mb-5" style="background:rgb(131, 158, 229,0.7); border-radius:20px; min-height:100px">
                                    <?php
                                        $attributes = array('class' => 'form-horizontal', 'method' => 'post');
                                        echo form_open(base_url()."Web/add_comment/", $attributes);
                                        //form_open_multipart//For Upload
                                        ?>    
                                    <p class="p-1">Leave Review</p>
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="form-group texta mt-3">
                                                <textarea name="comment_text" id="comment_text" rows="4" style="width:100%;background:rgb(255, 255, 255,0.5)"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group  mt-3">
                                                <select class="form-control" name="comment_rate" id="comment_rate" required>
                                                            <option disabled selected><?php echo $this->lang->line("Rating"); ?></option>
                                                            <option value="1">1 <?php echo $this->lang->line("star"); ?></option>
                                                            <option value="2">2 <?php echo $this->lang->line("star"); ?></option>
                                                            <option value="3">3 <?php echo $this->lang->line("star"); ?></option>
                                                            <option value="4">4 <?php echo $this->lang->line("star"); ?></option>
                                                            <option value="5">5 <?php echo $this->lang->line("star"); ?></option>
                                                        </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                          <?php
                                                if(isset($_SESSION['user_id'])) {
                                                    ?>
                                                    <input type="hidden" name="comment_user_id"
                                                           value="<?php echo $_SESSION['user_id']; ?>">
                                                    <input type="hidden" name="comment_content_id"
                                                           value="<?php echo $contentDetail->content_id; ?>">
                                                    <input type="hidden" name="comment_device_type_id" value="1">
                                                    <button type="submit"
                                                            class="theme_btn tp_one mb-3"><?php echo $this->lang->line("Submit Review"); ?></button>
                                                <?php
                                                }else{
                                                    echo $this->lang->line("To leave a review, please login to your account.");
                                                    $login_url = base_url()."dashboard";
                                                    echo " <a href='$login_url'>".$this->lang->line("Login")."</a>";
                                                }
                                                ?>
                                    </div>

                                    <div class="col-sm-12 mx-auto" >
                                        <h5 class="text-white  mb-4">Featured Games</h5>
                                    <div class="row">
                                    <?php
                                        foreach ($featuredContent as $featured) {
                                    ?>
                                            <div class="col-sm-3  " style=" ">
                                                <div class="card " style="width: 12rem;  background:#3765dd;">
                                                    <img class="card-img-top" src="<?php echo base_url().'assets/upload/content/thumbnail/'.$featured->content_image; ?>" alt="Card image cap" style=" border-radius: 20px;">
                                                    <div class="card-body">
                                                        <h5 class="card-text text-center text-white"><?php echo character_limiter($featured->content_title, 11); ?></h5>
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
                    </div>
                
                    <div class="col-sm-4 mx-auto" style="  border-radius: 10px;"> 
                    <div class="row">
                            <div class="col-sm-12" style="background:#3765dd; ">
                            <center>
                               <img class="py-4" src="https://cdn.cloudflare.steamstatic.com/steam/apps/921060/capsule_616x353.jpg?t=1667311420" alt="" width="100%" style=" border-radius: 30px;">
                            </center>

                            <div class="row">
                                <div class="col text-center"><a href="http://localhost/TMKOC/trial/Web/content/8/moto-x3m/?key=Similiar">
                                    <?php if($_GET['key']=='Similiar'){ echo "<p> Similiar <hr class='hr-style'></p>"; }else{echo "<p> Similiar </p>";}?></a></div>
                                <div class="col text-center"><a href="http://localhost/TMKOC/trial/Web/content/8/moto-x3m/?key=Popular">
                                <?php if($_GET['key']=='Popular'){ echo "<p> Popular <hr class='hr-style'></p>"; }else{echo "<p> Popular </p>";}?></a></div>
                                <div class="col text-center"><a href="http://localhost/TMKOC/trial/Web/content/8/moto-x3m/?key=Recommended">
                                <?php if($_GET['key']=='Recommended'){ echo "<p> Recommended <hr class='hr-style'></p>"; }else{echo "<p> Recommended </p>";}?></a></div>
                            </div>

                            <?php
                            if($_GET['key']=='Similiar'){
							foreach ($specialContent as $special) {
							?>
                            <div class="row my-4 ml-3">
                                <div class="col"><a href=""><img src="<?php echo base_url().'assets/upload/content/thumbnail/'.$special->content_image; ?>" alt="" width="200px" height="120px" style="border-radius:10px;"></a></div>
                                <div class="col "><a href=""><p><?php echo character_limiter($special->content_title, 11); ?></p></a>
                               <p>Categories: &nbsp;<?php echo $special->category_title; ?></p>
                               <p><span class='fa fa-star' style='color: #ff8800'></span>&nbsp;&nbsp;4.5/5</p>
                                </div>   
                            </div>
                            <?php
							}}elseif($_GET['key']=='Popular'){
                                foreach ($featuredContent as $featured) {
                            ?>
                                    <div class="row my-4 ml-3">
                                        <div class="col"><a href=""><img src="<?php echo base_url().'assets/upload/content/thumbnail/'.$featured->content_image; ?>" alt="" width="200px" height="120px" style="border-radius:10px;"></a></div>
                                        <div class="col "><a href=""><p><?php echo character_limiter($featured->content_title, 11); ?></p></a>
                                       <p>Categories: &nbsp;<?php echo $featured->category_title; ?></p>
                                       <p><span class='fa fa-star' style='color: #ff8800'></span>&nbsp;&nbsp;4.5/5</p>
                                        </div>   
                                    </div>
                            <?php  
                            }}else{ foreach ($latestContent as $latest) {
                                ?>
                                <div class="row my-4 ml-3">
                                        <div class="col"><a href=""><img src="<?php echo base_url().'assets/upload/content/thumbnail/'.$latest->content_image; ?>" alt="" width="200px" height="120px" style="border-radius:10px;"></a></div>
                                        <div class="col "><a href=""><p><?php echo character_limiter($latest->content_title, 11); ?></p></a>
                                       <p>Categories: &nbsp;<?php echo $latest->category_title; ?></p>
                                       <p><span class='fa fa-star' style='color: #ff8800'></span>&nbsp;&nbsp;4.5/5</p>
                                        </div>   
                                    </div>
                            <?php  
                            }}
							?>

                           
                            
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>    
            
           <div>
            <br>
            <br>
            <br>
           </div>

           <?php
$this->load->view('frontend/common/footer_view');
?>
