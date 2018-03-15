<?php


class User extends CI_Model {

        public $user_id;
        public $email;
        public $mobile;
        public $name;
        public $college;
        public $branch;
        public $semester;
        public $city;
        public $level;
        public $lastlogin;
        public $lifeline;
        public $score;
        public $status;
        public $profile_image;

        public function __construct()
        {
                $this->load->database();
        }

        // return user details and regn_status (LOGIN | SIGNUP)
        public function user_registered($data = array()) {
            
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where(array('email'=>$data['email']));
            $query = $this->db->get();
            
            $noOfRows = $query->num_rows();
            
            if($noOfRows > 0){
                $result = $query->row_array();
                $result['regn_status'] = TRUE;
            } else{
                $this->db->insert('user',$data);
                
                $this->db->select('*');
                $this->db->from('user');
                $this->db->where(array('email'=>$data['email']));
                $query = $this->db->get();
                
                $result = $query->row_array();
                $result['regn_status'] = FALSE;
            }
            return $result;
        }

        // update user profile on db
        public function update_profile($data = array()) {
            $email = $this->session->userdata('email');
            $this->db->where('email', $email);
            $this->db->update('user', $data);
            return true;
        }
        
        public function update_coins() {
            $email = $this->session->userdata('email');
            $this->db->where('email', $email);
            $this->db->set('coins', 'coins-10', FALSE);
            $this->db->update('user');
            $coins = $this->session->userdata('coins');
            $this->session->set_userdata('coins',$coins-10);
            return true;
        }
        
        public function reward_coins() {
            $email = $this->session->userdata('email');
            $this->db->where('email', $email);
            $this->db->set('coins', 'coins+30', FALSE);
            $this->db->update('user');
            $coins = $this->session->userdata('coins');
            $this->session->set_userdata('coins',$coins+30);
            return true;
        }

        // retrieve user data from db
        public function retrieve_user_data($email) {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where(array('email'=>$email));

            $query = $this->db->get();
            
            $userData = $query->row_array();
            return $userData;
            
        }

        public function get_ranklist() {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->order_by("level", "desc");
            $this->db->order_by("level_pass_time", "asc");

            $query = $this->db->get();

            $result = $query->result_array();
            
            return $result;

            
        }
        
        public function get_rank() {
            $userData['level'] = $this->session->userdata('level');
            $userData['level_pass_time'] = $this->session->userdata('level_pass_time');
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where("level >", $userData['level']);
            $query = $this->db->get();

            $result = $query->num_rows();
            
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where("level =", $userData['level']);
            $this->db->where("level_pass_time <=", $userData['level_pass_time']);
            $query = $this->db->get();
            
            $result += $query->num_rows();
            return $result;
        }
        
        public function level_up($data = array()) {
            $email = $this->session->userdata('email');
            $this->db->where('email', $email);
            $this->db->where_not_in('status', "TERMINATED");
            $this->db->update('user', $data);
            return true;
        }

        //admin function
        public function get_malicious_users() {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('malicious>',1);
            $this->db->order_by("malicious", "desc");

            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
        }
        
        public function get_users() {
            $this->db->select('*');
            $this->db->from('user');

            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
        }
        
        public function get_blocked_users() {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('status',"TERMINATED");

            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
        }
        
        public function get_suspected_users() {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('status',"SUSPECTED");

            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
        }
        
        public function get_admin_users() {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('type',"ADMIN");

            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
        }
        
        public function block_user($user_id) {
            $data['STATUS'] = "TERMINATED";
            $this->db->where('id', $user_id);
            $this->db->update('user', $data);
            return true;
        }
        
        public function unblock_user($user_id) {
            $data['STATUS'] = "SUSPECTED";
            $this->db->where('id', $user_id);
            $this->db->update('user', $data);
            return true;
        }
        
        public function make_admin($user_id) {
            $data['type'] = "ADMIN";
            $this->db->where('id', $user_id);
            $this->db->update('user', $data);
            return true;
        }
        public function downgrade_admin($user_id) {
            $data['type'] = "MODERATOR";
            $this->db->where('id', $user_id);
            $this->db->update('user', $data);
            return true;
        }
        
}
