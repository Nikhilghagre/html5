<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dashboard/common/head_view');
$this->load->view('dashboard/common/header_view');
//Show relevant sidebar
if ($_SESSION['user_type'] == 1)
    $this->load->view('dashboard/common/sidebar_view');
elseif ($_SESSION['user_type'] == 2)
    $this->load->view('dashboard/common/sidebar_user_view');
?>

<section class="content">
    <div class="container-fluid">
        <!--<div class="block-header">
                <h2>
                    <?php echo $this->lang->line("Add Content"); ?>
                </h2>
            </div>-->
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <!-- Alert after process start -->
                <?php
                $msg = $this->session->flashdata('msg');
                $msgType = $this->session->flashdata('msgType');
                if (isset($msg))
                {
                    ?>
                    <div class="alert alert-<?php echo $msgType; ?> alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $msg; ?>
                    </div>
                    <?php
                }
                ?>
                <!-- ./Alert after process end -->
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php echo $this->lang->line("Add Content"); ?>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="<?php echo base_url()."dashboard/Dashboard"; ?>"><?php echo $this->lang->line("Dashboard"); ?></a></li>
                                    <li><a href="<?php echo base_url()."dashboard/Content/content_list"; ?>"><?php echo $this->lang->line("Content List"); ?></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?php
                        $attributes = array('class' => 'form-horizontal', 'method' => 'post');
                        echo form_open_multipart(base_url()."dashboard/Content/add_content/", $attributes);
                        //form_open_multipart//For Upload
                        ?>

                        <div class="form-group">
                            <label for="content_title" class="col-sm-2 control-label"><?php echo $this->lang->line("Title"); ?> *</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="content_title" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="content_description" class="col-sm-2 control-label"><?php echo $this->lang->line("Description"); ?> *</label>
                            <div class="col-sm-10">
                                <div class="">
                                    <textarea class="form-control" name="content_description" id="content_description" required><?php echo $this->lang->line("Write Something..."); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="content_category_id" class="col-sm-2 control-label"><?php echo $this->lang->line("Category"); ?> *</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <select class="form-control show-tick" id="content_category_id" name="content_category_id" required <!--data-live-search="true"--> data-show-subtext="true">
                                        <option selected="selected" disabled><?php echo $this->lang->line("--- Please Select ---"); ?></option>
                                        <?php
                                        foreach ($fetchCategories as $key) {
                                            ?>
                                            <option data-divider="true"></option>
                                            <option value="<?php echo $key->category_id ?>">◼ <?php echo $key->category_title; ?></option>
                                            <?php
                                            //To get sub category
                                            $subCategory = $this->db->get_where('category_table', array('category_parent_id' => $key->category_id))->result();
                                            foreach($subCategory as $sKey)
                                            {
                                                echo "<option data-subtext='($key->category_title)' value='$sKey->category_id'>&nbsp;&nbsp;&nbsp;&nbsp;◾&nbsp;$sKey->category_title</option>";
                                                //To get sub sub category
                                                $subSubCategory = $this->db->get_where('category_table', array('category_parent_id' => $sKey->category_id))->result();
                                                foreach($subSubCategory as $ssKey)
                                                {
													echo "<option data-subtext='($sKey->category_title)' class='subSubCategoryDropDown' value='$ssKey->category_id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;◽&nbsp;$ssKey->category_title</option>";
													//To get sub sub sub category
													$subSubSubCategory = $this->db->get_where('category_table', array('category_parent_id' => $ssKey->category_id))->result();
													foreach($subSubSubCategory as $sssKey)
													{
														echo "<option data-subtext='($ssKey->category_title)' class='subSubCategoryDropDown' value='$sssKey->category_id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;◽&nbsp;$sssKey->category_title</option>";
													}                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id='url'>
                            <div class="form-group">
                                <label for="content_url" class="col-sm-2 control-label"><?php echo $this->lang->line("URL"); ?> *</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" style="direction: ltr" class="form-control" name="content_url" placeholder="http://www.YourDomain.com">
                                    </div>
									<small class="col-pink"><?php echo $this->lang->line("Direct HTML5 Games URL"); ?></small>
                                </div>
                            </div>
                        </div>

                        <div id='orientation'>
                            <div class="form-group">
                                <label for="content_orientation" class="col-sm-2 control-label"><?php echo $this->lang->line("Orientation"); ?> *</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="content_orientation" name="content_orientation" required>
                                            <option selected="selected" value="1"><?php echo $this->lang->line("It does not matter"); ?></option>
                                            <option data-subtext="(Portrait)" value="2"><?php echo $this->lang->line("Portrait"); ?></option>
                                            <option data-subtext="(Landscape)" value="3"><?php echo $this->lang->line("Landscape"); ?></option>
                                        </select>
                                    </div>
                                    <small class="col-pink"><?php echo $this->lang->line("Suitable for display on a mobile phone vertically or horizontally."); ?></small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="content_user_role_id" class="col-sm-2 control-label"><?php echo $this->lang->line("User Role"); ?> *</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <select class="form-control show-tick" id="content_user_role_id" name="content_user_role_id" data-show-subtext="true" required>
                                        <?php
                                        foreach ($userRole as $key) {
                                            ?>
                                            <option value="<?php echo $key->user_role_id; ?>"><?php echo $key->user_role_title ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <small class="col-pink"><?php echo $this->lang->line("Which user role can access to this content?"); ?></small>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="content_image" class="col-sm-2 control-label"><?php echo $this->lang->line("Cover Image"); ?></label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="file" name="content_image" multiple>
                                </div>
                                <small class="col-pink"><?php echo $this->lang->line("Best image ratio for content."); ?></small>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="content_cached" class="col-sm-2 control-label"><?php echo $this->lang->line("Cached Content"); ?></label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="checkbox" checked class="filled-in <?php echo $this->lang->line("chk-col-x"); ?>" id="content_cached" name="content_cached">
                                    <label class="" for="content_cached"><?php echo $this->lang->line("Enable cache for webview player to loading faster."); ?></label>
                                </div>
                            </div>
                        </div>


                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="hidden" class="form-control" name="send_push_notification" value="" readonly>
                                        <input type="hidden" class="form-control" name="content_featured" value="" readonly>
                                        <input type="hidden" class="form-control" name="content_special" value="" readonly>
                                        <input type="hidden" class="form-control" name="content_status" value="" readonly>
                                        <input type="hidden" class="form-control" name="content_user_id" value="<?php echo $_SESSION['user_id'] ?>" readonly>
										<input type="hidden" class="form-control" name="content_type_id" value="13" readonly>
										<input type="hidden" class="form-control" name="content_order" value="1" readonly>
                                        <input type="hidden" class="form-control" name="content_access" value="1" readonly>
										<input type="hidden" class="form-control" name="content_player_type_id" value="1" readonly>
										<input type="hidden" class="form-control" name="content_open_url_inside_app" value="on" readonly>
                                        <button <?php if($_SESSION['user_role_id'] == 4) echo "disabled='disabled'"; ?> type="submit" class="btn <?php echo $this->lang->line("bg-x"); ?> m-t-15 waves-effect"><?php echo $this->lang->line("Add Content"); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

<!-- TinyMCE -->
<script src="<?php echo base_url()."assets/dashboard/plugins/tinymce/tinymce.js"; ?>"></script>
<?php
$this->load->view('dashboard/common/footer_view');
?>
<script>
    tinymce.init({
        selector: '#content_description',
        height: 250,
        theme: 'modern',
		relative_urls : false,
		remove_script_host : false,
		document_base_url : "/",
		convert_urls : true,
        directionality: "<?php echo $this->lang->line('app_direction'); ?>",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste wordcount"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image",
        setup : function(ed)
        {
            ed.on('init', function()
            {
                this.getDoc().body.style.fontSize = '13px';
                this.getDoc().body.style.fontFamily = 'Tahoma';
            });
        },

    });
</script>
