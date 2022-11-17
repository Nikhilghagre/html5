<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('frontend/common/head_view');
$this->load->view('frontend/common/header_view');

if (isset($_GET['category']))
{
	$category = $_GET['category'];
}
?>

        <div class="col-11 mx-auto" >
           
            <div class="row">
            <?php
						if (empty($contentList) & empty($subCategoriesList))
							echo "<p style='margin-bottom: 150px;'>".$this->lang->line("Nothing Found...")."</p>";

						if (empty($contentList) & !empty($subCategoriesList))
							echo "<p style='margin-bottom: 150px;'>".$this->lang->line("Please select above sub categories.")."</p>";

						foreach ($contentList as $content)
						{
						?>
                         <div class="col-sm-2 " style=" "> 
                            <div class="card " style="width: 14rem;  background:#3765dd;">
                            <a href="<?php echo base_url()."Web/content/$content->content_id/$content->content_slug" ?>">  <img class="card-img-top" src="<?php echo base_url().'assets/upload/content/thumbnail/'.$content->content_image; ?>" alt="Card image cap" style=" border-radius: 20px;"></a>
                                            <div class="card-body">
                                                <h5 class="card-text text-center text-white"><?php echo character_limiter($content->content_title, 28); ?> </h5>
                                            </div>

                            </div>
                        
                        </div>






                    <?php
                        }
                    ?>
            </div>
        </div>

<?php
$this->load->view('frontend/common/footer_view');
?>
