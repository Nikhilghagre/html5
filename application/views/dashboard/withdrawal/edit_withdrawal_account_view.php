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
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
                            <?php echo $this->lang->line("Edit Withdrawal Account"); ?>
                        </h2>
                    </div>
                    <div class="body">

                        <?php
                        $attributes = array('class' => 'form-horizontal', 'method' => 'post');
                        echo form_open_multipart(base_url()."dashboard/withdrawal/edit_withdrawal_account/", $attributes);
                        ?>
                        <div class="form-group">
                            <label for="withdrawal_account_type_title" class="col-sm-3 control-label"><?php echo $this->lang->line("Title"); ?> *</label>
                            <div class="col-sm-9">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="withdrawal_account_type_title" placeholder="<?php echo $this->lang->line("Title"); ?>" value="<?php echo $withdrawalContent->withdrawal_account_type_title; ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="withdrawal_account_type_status" class="col-sm-3 control-label"><?php echo $this->lang->line("Status"); ?></label>
                            <div class="col-sm-9">
                                <div class="form-line">
                                    <?php
                                    $withdrawal_account_type_status_checked = "";
                                    if($withdrawalContent->withdrawal_account_type_status == 1)
                                        $withdrawal_account_type_status_checked = "checked";
                                    ?>
                                    <input type="checkbox" class="filled-in <?php echo $this->lang->line("chk-col-x"); ?>" id="withdrawal_account_type_status" name="withdrawal_account_type_status" <?php echo $withdrawal_account_type_status_checked; ?>>
                                    <label for="withdrawal_account_type_status"><?php echo $this->lang->line("Enable this account."); ?></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="hidden" readonly="readonly" name="withdrawal_account_type_id" value="<?php echo $withdrawalContent->withdrawal_account_type_id; ?>" required>
                                <button <?php if($_SESSION['user_role_id'] == 4) echo "disabled='disabled'"; ?> type="submit" class="btn <?php echo $this->lang->line("bg-x"); ?> m-t-15 waves-effect"><?php echo $this->lang->line("Update"); ?></button>
                            </div>
                        </div>
                        <?php
                        //Demo alert
                        if($_SESSION['user_role_id'] == 4 OR $_SESSION['user_role_id'] == 7) { ?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo $this->lang->line("Add / Edit / Remove are disable on demo."); ?>
                            </div>
                        <?php } ?>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>

<?php
$this->load->view('dashboard/common/footer_view');
?>
<!-- Pass user_role_id into the deleteModal -->
<script type="text/javascript">
    $(function () {
        $(".identifyingClass").click(function () {
            var my_id_value = $(this).data('id');
            $(".modal-footer #user_role_id").val(my_id_value);
        })
    });
</script>
