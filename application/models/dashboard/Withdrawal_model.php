<?php
class Withdrawal_model extends CI_Model
{

    //============================ Main construct
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }


    //============================ Withdrawal Coins List
    function get_withdrawal_coins($table, $limit)
    {
        $user_id = $_SESSION['user_id'];
        if($_SESSION['user_type'] == 1) {
            $q = $this->db->query("Select $table.*, user_table.user_username, user_table.user_id/*, withdrawal_account_type_table.* */
								FROM $table
								INNER JOIN user_table
								ON $table.withdrawal_user_id = user_table.user_id 
								/*INNER JOIN withdrawal_account_type_table
								ON $table.withdrawal_account_type = withdrawal_account_type_table.withdrawal_account_type_id*/
								ORDER BY withdrawal_id DESC
								LIMIT $limit;");
        }else{
            $q = $this->db->query("Select $table.*, user_table.user_username, user_table.user_id/*, withdrawal_account_type_table.* */
								FROM $table
								INNER JOIN user_table
								ON $table.withdrawal_user_id = user_table.user_id 
								/*INNER JOIN withdrawal_account_type_table
								ON $table.withdrawal_account_type = withdrawal_account_type_table.withdrawal_account_type_id*/
								WHERE withdrawal_user_id = $user_id
								ORDER BY withdrawal_id DESC
								LIMIT $limit;");
        }

        return $q;
    }


    //============================
    function get_withdrawal_coin_content($table, $withdrawal_id)
    {
        $query = $this->db->query("Select $table.*, user_table.user_username, user_table.user_id/*, withdrawal_account_type_table.* */
								FROM $table
								INNER JOIN user_table
								ON $table.withdrawal_user_id = user_table.user_id 
								/*INNER JOIN withdrawal_account_type_table
								ON $table.withdrawal_account_type = withdrawal_account_type_table.withdrawal_account_type_id*/
								WHERE withdrawal_id = $withdrawal_id;");
        if ($query->num_rows() > 0)
            return $query;
        else
            redirect(base_url().'dashboard/Withdrawal/withdrawal_coins');
    }


	//============================ Withdrawal Accounts
	function get_withdrawal_accounts($table)
	{
		$q = $this->db->query("Select $table.*
							FROM $table
							ORDER BY withdrawal_account_type_id ASC;");
		return $q;
	}


	//============================ One Withdrawal Account
	function get_one_withdrawal_account($table, $withdrawal_account_type_id)
	{
		$q = $this->db->query("Select $table.*
							FROM $table
							WHERE withdrawal_account_type_id = $withdrawal_account_type_id
							ORDER BY withdrawal_account_type_id ASC;");
		if ($q->num_rows() > 0)
			return $q;
		else
			redirect(base_url().'dashboard/Withdrawal/withdrawal_accounts');
	}

}
