<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- <div class="text-center">
	<a data-toggle="modal" data-target="#modalAds" href="#"><img class="banner_ads_728_90" src="<?php echo base_url()."assets/frontend/images/728-90.png"; ?>"></a>
    <br><br>
</div> -->

<div class="overlay"></div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>



<!-----------footer----------------->
<section class="footer type_four <?php if ($this->lang->line("app_direction") == "rtl") echo "rtl"; ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
                <div class="footer_widgets type_three">
                    <h3 class="widgets_title">
					ooltahchasmaplay.com
                    </h3>
                    <div class="inner_widgets">
                        <p>ooltahchasmaplay.com is a content management system that you can publish any HTML5 Games. Users can play games from their smart phone or website and earn coin.</p>
                        <div class="social_media_icon">
                            <ul class="clearfix">
								<?php
								if (!empty($setting->setting_facebook))
								{
								?>
                                <li>
                                    <a target="_blank" href="https://www.facebook.com/<?php echo $setting->setting_facebook; ?>" class="has-tooltip">
                                        <span class="fa fa-facebook "></span>
                                        <div class="c-tooltip ">
                                            <div class="tooltip-inner ">Facebook</div>
                                        </div>
                                    </a>
                                </li>
								<?php
								}
								?>

								<?php
								if (!empty($setting->setting_twiiter))
								{
								?>
                                <li>
                                    <a target="_blank" href="https://www.twitter.com/<?php echo $setting->setting_twiiter; ?>" class="has-tooltip">
                                        <span class="fa fa-twitter "></span>
                                        <div class="c-tooltip ">
                                            <div class="tooltip-inner ">Twitter</div>
                                        </div>
                                    </a>
                                </li>
								<?php
								}
								?>

								<?php
								if (!empty($setting->setting_skype))
								{
								?>
                                <li>
                                    <a target="_blank" href="https://www.skype.com/en/<?php echo $setting->setting_skype; ?>" class="has-tooltip">
                                        <span class="fa fa-skype"></span>
                                        <div class="c-tooltip ">
                                            <div class="tooltip-inner ">Skype</div>
                                        </div>
                                    </a>
                                </li>
								<?php
								}
								?>

								<?php
								if (!empty($setting->setting_telegram))
								{
									?>
									<li>
										<a target="_blank" href="<?php echo "https://t.me/".$setting->setting_telegram; ?>" class="has-tooltip">
											T
											<div class="c-tooltip ">
												<div class="tooltip-inner">Telegram</div>
											</div>
										</a>
									</li>
									<?php
								}
								?>

								<?php
								if (!empty($setting->setting_whatsapp))
								{
									?>
									<li>
										<a target="_blank" href="<?php echo "https://wa.me/$setting->setting_whatsapp/?text="; ?>" class="has-tooltip">
											W
											<div class="c-tooltip ">
												<div class="tooltip-inner">WhatsApp</div>
											</div>
										</a>
									</li>
									<?php
								}
								?>

								<?php
								if (!empty($setting->setting_instagram))
								{
									?>
									<li>
										<a target="_blank" href="<?php echo "https://www.instagram.com/".$setting->setting_instagram; ?>" class="has-tooltip">
											<span class="fa fa-instagram"></span>
											<div class="c-tooltip ">
												<div class="tooltip-inner">Instagram</div>
											</div>
										</a>
									</li>
									<?php
								}
								?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-12 ">
                <div class="footer_widgets type_three ">
                    <h3 class="widgets_title "><?php echo $this->lang->line("Main Menu"); ?></h3>
                    <div class="inner_widgets ">
                        <ul class="links">
                            <li><a href="<?php echo base_url(); ?>"><?php echo $this->lang->line("Home"); ?></a></li>
                            <li><a data-toggle="modal" data-target="#modalAbout" href="#"><?php echo $this->lang->line("About Us"); ?></a></li>
                            <li><a data-toggle="modal" data-target="#modalAds" href="#"><?php echo $this->lang->line("Advertising"); ?></a></li>
                            <li><a data-toggle="modal" data-target="#modalTerms" href="#"><?php echo $this->lang->line("Terms Of Service"); ?></a></li>
                            <li><a data-toggle="modal" data-target="#modalPrivacy" href="#"><?php echo $this->lang->line("Privacy Policy"); ?></a></li>
                            <li><a data-toggle="modal" data-target="#modalGDPR" href="#"><?php echo $this->lang->line("GDPR Law"); ?></a></li>
                            <li><a data-toggle="modal" data-target="#modalContact" href="#"><?php echo $this->lang->line("Contact Us"); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
                <div class="footer_widgets type_three ">
                    <h3 class="widgets_title "><?php echo $this->lang->line("Categories"); ?></h3>
                    <div class="inner_widgets ">
                        <ul class="links">
							<?php
							foreach ($categoriesLimit as $categoryLimit)
							{
							?>
                            <li><a href="<?php echo base_url()."Web/content_list/?category=$categoryLimit->category_id&title=$categoryLimit->category_slug"; ?>"><?php echo $categoryLimit->category_title ?></a></li>
							<?php
							}
							?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 ">
                <div class="footer_widgets tp_two ">
                    <h3 class="widgets_title "><?php echo $this->lang->line("Mobile App"); ?></h3>
                    <div class="inner_widgets">
                        <p class="sub_description "><?php echo $this->lang->line("Download and install our app for free. Choose your device:"); ?></p>
                    </div>
                    <a class="btn btn-block btn-success text-white" href="<?php echo base_url()."dl/app.apk" ?>"><i class="fa fa-android fa-lg"></i> &nbsp;&nbsp;Android Version</a>
                    <br>
                    <a class="btn btn-block btn-info text-white" onclick="alert('<?php echo $this->lang->line("Coming Soon..."); ?>');"><i class="fa fa-apple fa-lg"></i> &nbsp;&nbsp;iOS Version</a>
                </div>
            </div>
        </div>
        <div class="footer_last type_three ">
            <div class="row ">
                <div class="col-lg-12 text-center ">
                    <p>Copyright © <?php echo date('Y')." ".$setting->setting_app_name; ?>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-------------main-centent-end--------------->
</main>
<!-------------pagewapper-end--------------->
</div>
<!--Scroll to top-->
<a href="# " id="scroll" class="default-bg green" style="display: inline;"><span class="fa fa-angle-up "></span></a>

<!---------mobile-navbar----->
<div class="bsnav-mobile ">
    <div class="bsnav-mobile-overlay"></div>
    <div class="navbar ">
        <button class="navbar-toggler toggler-spring mobile-toggler"><span class="fa fa-close "></span></button>
    </div>
</div>
<!---------mobile-navbar----->
<!-- /.side-menu__block -->
<div class="side-menu__block">
    <div class="side-menu__block-overlay custom-cursor__overlay">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div>
    <!-- /.side-menu__block-overlay -->
</div>
<!-- /.side-menu__block -->

<!-- /.search-popup -->
<div class="search-popup">
    <div class="search-popup__overlay custom-cursor__overlay">
        <div class="cursor "></div>
        <div class="cursor-follower "></div>
    </div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__inner ">
        <form action="<?php echo base_url()."Web/content_list/?" ?>" method="get" class="search-popup__form">
            <input type="text" name="keyword" placeholder="<?php echo $this->lang->line("Search for..."); ?>">
            <button type="submit"><i class="flaticon-magnifying-glass"></i></button>
        </form>
    </div>
    <!-- /.search-popup__inner -->
</div>
<!-- /.search-popup -->

<script>
	/*!
	* JavaScript Cookie v2.0.3
	* https://github.com/js-cookie/js-cookie
	*
	* Copyright 2006, 2015 Klaus Hartl & Fagner Brack
	* Released under the MIT license
	*/
	!function(e){if("function"==typeof define&&define.amd)define(e);else if("object"==typeof exports)module.exports=e();else{var n=window.Cookies,o=window.Cookies=e(window.jQuery);o.noConflict=function(){return window.Cookies=n,o}}}(function(){function e(){for(var e=0,n={};e<arguments.length;e++){var o=arguments[e];for(var t in o)n[t]=o[t]}return n}function n(o){function t(n,r,i){var c;if(arguments.length>1){if(i=e({path:"/"},t.defaults,i),"number"==typeof i.expires){var s=new Date;s.setMilliseconds(s.getMilliseconds()+864e5*i.expires),i.expires=s}try{c=JSON.stringify(r),/^[\{\[]/.test(c)&&(r=c)}catch(a){}return r=encodeURIComponent(String(r)),r=r.replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g,decodeURIComponent),n=encodeURIComponent(String(n)),n=n.replace(/%(23|24|26|2B|5E|60|7C)/g,decodeURIComponent),n=n.replace(/[\(\)]/g,escape),document.cookie=[n,"=",r,i.expires&&"; expires="+i.expires.toUTCString(),i.path&&"; path="+i.path,i.domain&&"; domain="+i.domain,i.secure?"; secure":""].join("")}n||(c={});for(var p=document.cookie?document.cookie.split("; "):[],u=/(%[0-9A-Z]{2})+/g,d=0;d<p.length;d++){var f=p[d].split("="),l=f[0].replace(u,decodeURIComponent),m=f.slice(1).join("=");'"'===m.charAt(0)&&(m=m.slice(1,-1));try{if(m=o&&o(m,l)||m.replace(u,decodeURIComponent),this.json)try{m=JSON.parse(m)}catch(a){}if(n===l){c=m;break}n||(c[l]=m)}catch(a){}}return c}return t.get=t.set=t,t.getJSON=function(){return t.apply({json:!0},[].slice.call(arguments))},t.defaults={},t.remove=function(n,o){t(n,"",e(o,{expires:-1}))},t.withConverter=n,t}return n()});
</script>
<!-----------------------------------script-------------------------------------->
<!--<script src="<?php echo base_url()."assets/frontend/js/jquery.js"; ?>"></script>-->
<script src="<?php echo base_url()."assets/frontend/js/popper.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/bootstrap.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/bsnav.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/jquery-ui.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/isotope.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/wow.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/owl.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/swiper.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/jquery.fancybox.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/odometer.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/TweenMax.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/validator.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/appear.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/moment.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/jquery.flexslider-min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/pagenav.js"; ?>"></script>
<script src="<?php echo base_url()."assets/frontend/js/custom.js"; ?>"></script>
</body>

<script>
	(function () {
		"use strict";

		var cookieName = 'tplCookieConsent'; // The cookie name
		var cookieLifetime = 30; // Cookie expiry in days

		/**
		 * Set a cookie
		 * @param cname - cookie name
		 * @param cvalue - cookie value
		 * @param exdays - expiry in days
		 */
		var _setCookie = function (cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
			var expires = "expires=" + d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		};

		/**
		 * Get a cookie
		 * @param cname - cookie name
		 * @returns string
		 */
		var _getCookie = function (cname) {
			var name = cname + "=";
			var ca = document.cookie.split(';');
			for (var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return "";
		};

		/**
		 * Should the cookie popup be shown?
		 */
		var _shouldShowPopup = function () {
			if (_getCookie(cookieName)) {
				return false;
			} else {
				return true;
			}
		};

		// Show the cookie popup on load if not previously accepted
		if (_shouldShowPopup()) {
			$('#cookieModal').modal('show');
		}

		// Modal dismiss btn - consent
		$('#cookieModalConsent').on('click', function () {
			_setCookie(cookieName, 1, cookieLifetime);
		});

	})();

	
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function () {
            $('#sidebar').removeClass('active');
            // $('.overlay').removeClass('active');
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').addClass('active');
            // $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>

</html>
