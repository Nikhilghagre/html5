<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $pageTitle; ?></title>

    <!-- Meta Tags -->
    <meta name="description" content="<?php if(isset($contentDetail->content_title)) echo $contentDetail->content_title.". "; echo $seo->seo_description; ?>">
    <meta name="keywords" content="<?php echo $seo->seo_keywords; ?>">
    <meta name="author" content="<?php echo $seo->seo_author; ?>">

    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url().'assets/dashboard/images/' ?>favicon.ico" type="image/x-icon">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>game site</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/frontend/css/bootstrap.min.css"; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/frontend/css/style.css"; ?>">
	<?php
	if ($this->lang->line("app_direction") == "ltr") { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/frontend/css/style.css"; ?>">
        
	<?php
	}else{
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/frontend/css/style-rtl.css"; ?>">
	
	<?php
	}
	?>

    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/frontend/fonts/font/flaticon.css"; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/frontend/css/lightslider.css"; ?>"> -->
    <script src="<?php echo base_url()."assets/frontend/js/jquery.js"; ?>"></script>
    <script src="<?php echo base_url()."assets/frontend/js/lightslider.js"; ?>"></script>

    <!-- ****************** Custom header*************************** -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/frontend/css/style1.css"; ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

     <!-- Font Awesome JS -->
     <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
    <!-- <script>
        $(document).ready(function() {
            $('#category-slider').lightSlider({
                item:8,
                loop:false,
                slideMove:2,
                easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                speed:600,
				rtl:<?php if ($this->lang->line("app_direction") == "rtl") echo "true"; else echo "false"; ?>,
                responsive : [
                    {
                        breakpoint:800,
                        settings: {
                            item:4,
                            slideMove:1,
                            slideMargin:6,
                        }
                    },
                    {
                        breakpoint:480,
                        settings: {
                            item:2,
                            slideMove:1
                        }
                    }
                ]
            });
        });
    </script> -->
	
	<!-- For HLS Player -->
	<link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
    <script src="https://unpkg.com/video.js/dist/video.js"></script>
    <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>
	
</head>
<?php
if($setting->setting_site_maintenance == 1)
{
	echo "<br><br><h3 style='text-align: center'>$setting->setting_text_maintenance</h3>";
	die();
}
?>
