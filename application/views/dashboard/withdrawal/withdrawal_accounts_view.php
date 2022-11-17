<?php defined('BASEPATH') OR exit('No direct script access allowed');
//Data Table Server Side: https://shareurcodes.com/blog/dataTables%20server-side%20processing%20in%20codeigniter
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
                    <?php echo $this->lang->line("Withdrawal Accounts"); ?>
                </h2>
            </div>-->
            <!-- Basic Examples -->
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
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $this->lang->line("Withdrawal Accounts"); ?>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?php echo base_url()."dashboard/Dashboard"; ?>"><?php echo $this->lang->line("Dashboard"); ?></a></li>
                                        <li><a href="<?php echo base_url()."dashboard/Withdrawal/withdrawal_coins"; ?>"><?php echo $this->lang->line("Withdrawal Coin"); ?></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="table-responsive">
                                    <table id="pagesList" class="table table-striped dataTable">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo $this->lang->line("Title"); ?></th>
                                            <th><?php echo $this->lang->line("Status"); ?></th>
                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        foreach ($withdrawalAccounts as $key) {
                                        if ($key->withdrawal_account_type_status == 0) $withdrawal_account_type_status = "<span class='label bg-grey'>".$this->lang->line("Inactive")."</span>";
                                        if ($key->withdrawal_account_type_status == 1) $withdrawal_account_type_status = "<span class='label bg-green'>".$this->lang->line("Active")."</span>";
                                        ?>
                                        <tr>
                                            <td><?php echo $key->withdrawal_account_type_id; ?></td>
                                            <td><?php echo $key->withdrawal_account_type_title; ?></td>
                                            <td><?php echo $withdrawal_account_type_status; ?></td>
                                            <td style="min-width: 110px; width: 110px;">
                                                <div class="demo-button-toolbar clearfix">
                                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                        <div class="btn-group" role="group" aria-label="First group">
                                                            <a href="<?php echo base_url()."dashboard/Withdrawal/edit_withdrawal_account/$key->withdrawal_account_type_id"; ?>" type="button" class="btn btn-xs btn-primary waves-effect">&nbsp;<i class="material-icons" style="font-size: 18px">mode_edit</i>&nbsp;</a>
                                                            <a href="#" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $key->withdrawal_account_type_id; ?>" type="button" class="identifyingClass btn btn-xs btn-danger waves-effect">&nbsp;<i class="material-icons" style="font-size: 18px">cancel</i>&nbsp;</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<div class="card">
						<div class="header">
							<h2>
								<?php echo $this->lang->line("Add Account"); ?>
							</h2>
						</div>
						<div class="body">
							<?php
							$attributes = array('method' => 'post');
							echo form_open(base_url()."dashboard/Withdrawal/add_withdrawal_account/", $attributes);
							?>
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" name="withdrawal_account_type_title" class="form-control" required>
									<label class="form-label"><?php echo $this->lang->line("Title"); ?></label>
								</div>
							</div>

							<div class="form-group">
								<div class="form-line">
									<input type="checkbox" class="filled-in <?php echo $this->lang->line("chk-col-x"); ?>" id="withdrawal_account_type_status" name="withdrawal_account_type_status" checked>
									<label for="withdrawal_account_type_status"><?php echo $this->lang->line("Enable this account."); ?></label>
								</div>
							</div>

							<div class="form-group">
								<div class="">
									<button <?php if($_SESSION['user_role_id'] == 4) echo "disabled='disabled'"; ?> type="submit" class="btn <?php echo $this->lang->line("bg-x"); ?> m-t-15 waves-effect"><?php echo $this->lang->line("Add Account"); ?></button>
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

        <!-- Small deleteModal Size -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel"><?php echo $this->lang->line("Delete confirmation!"); ?></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $this->lang->line("Are you sure to delete this item?"); ?>
                    </div>
                    <div class="modal-footer" style="text-align: center">
                        <?php
                        $attributes = array('class' => 'form-horizontal', 'method' => 'post');
                        echo form_open(base_url()."dashboard/Withdrawal/delete_withdrawal_account/", $attributes);
                        ?>
                        <input type="hidden" readonly="readonly" name="withdrawal_account_type_id" id="withdrawal_account_type_id" value="" required/>
                        <button <?php if($_SESSION['user_role_id'] == 4) echo "disabled='disabled'"; ?> type="submit" class="btn btn-danger waves-effect"><?php echo $this->lang->line("Yes"); ?></button>&nbsp;&nbsp;
                        <button type="button" class="btn bg-grey waves-effect col-white" data-dismiss="modal"><?php echo $this->lang->line("Cancel"); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Small deleteModal Size -->
    </section>


<?php
$this->load->view('dashboard/common/footer_view');
?>
<!-- Jquery DataTable Plugin Js -->
<script src="<?php echo base_url()."assets/dashboard/" ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?php echo base_url()."assets/dashboard/" ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<!--<script src="<?php echo base_url()."assets/dashboard/" ?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?php echo base_url()."assets/dashboard/" ?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?php echo base_url()."assets/dashboard/" ?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?php echo base_url()."assets/dashboard/" ?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>-->
<script>
    $(document).ready(function () {
        $('#pagesList').DataTable({
            "oSearch"     : {'sSearch': '<?php if (isset($_GET['s'])) echo $_GET['s']; else echo ""; ?>'},
            "ordering"    : true,
            "order": [[0,'asc']],
            "pageLength":25,
            "columnDefs": [
                { "targets": 0, "name": "id", 'searchable':true, 'orderable':true},
                { "targets": 1, "name": "title", 'searchable':true, 'orderable':true},
                { "targets": 2, "name": "status", 'searchable':true, 'orderable':true},
                { "targets": 3, "name": "action", 'searchable':false, 'orderable':false,'width':'110px'},
            ],
            "language": {
                paginate: {
                    next: '<?php echo $this->lang->line("Next"); ?>', // or '→' '&#8594;'
                    previous: '<?php echo $this->lang->line("Previous"); ?>', // or '←' ' &#8592;'
                    first:      '<?php echo $this->lang->line("First"); ?>',
                    last:       '<?php echo $this->lang->line("Last"); ?>',
                },
                "aria": {
                    sortAscending:  ': activate to sort column ascending',
                    sortDescending: ': activate to sort column descendin',
                },
                "zeroRecords": '<?php echo $this->lang->line("No Data Found"); ?>',
                "sLengthMenu": '<?php echo $this->lang->line("Display"); ?> _MENU_ <?php echo $this->lang->line("records"); ?>',
                "search": '<?php echo $this->lang->line("Search"); ?>',
                "infoFiltered": '(<?php echo $this->lang->line("filtered from"); ?> _MAX_ <?php echo $this->lang->line("total records"); ?>)',
                "info": '<?php echo $this->lang->line("Showing"); ?> _START_ <?php echo $this->lang->line("to"); ?> _END_ <?php echo $this->lang->line("of"); ?> _TOTAL_ <?php echo $this->lang->line("entries"); ?>',
                "infoEmpty": '<?php echo $this->lang->line("Showing"); ?> _START_ <?php echo $this->lang->line("to"); ?> _END_ <?php echo $this->lang->line("of"); ?> _TOTAL_ <?php echo $this->lang->line("entries"); ?>',
                "loadingRecords": '<?php echo $this->lang->line("Loading..."); ?>',
                "processing":     '<?php echo $this->lang->line("Processing..."); ?>',
                "emptyTable":     '<?php echo $this->lang->line("No data available in table"); ?>',
            }
        });
    });
</script>

<!-- Pass withdrawal_id into the deleteModal -->
<script type="text/javascript">
    $(function () {
        $(".identifyingClass").click(function () {
            var my_id_value = $(this).data('id');
            $(".modal-footer #withdrawal_account_type_id").val(my_id_value);
        })
    });
</script>
