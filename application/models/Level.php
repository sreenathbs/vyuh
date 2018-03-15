<?php

   
class Level extends CI_Model {
    
        public $id;
        public $level_no;
        public $question;
        public $answer;
        public $type;
        public $date;

        public function __construct()
        {
                $this->load->database();
        }


        public function retrieve_level_data_admin() {
            $this->db->select('*');
            $this->db->from('level');
            $this->db->order_by("level_no", "asc");
            //$this->db->limit(50);

            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
        }

        public function add_level_data_admin($data = array()) {
            $this->db->insert('level', $data);
            return true;
        }
        
        public function get_next_question_for_user($email){
            
            $sql = "SELECT level_no,question FROM `user` `u` JOIN `level` `l` ON `u`.`level`+1 = `l`.`level_no` WHERE `u`.`email` = '$email' AND `l`.`active`  = 1";
            
            $query = $this->db->query($sql, array($email));
            
            $row = $query->row();
            
//            print_r($row);
            
            return $row;
            
        }
        
        public function get_next_answer_for_user($data){
            
//            $sql = "SELECT answer FROM `user` `u` JOIN `level` `l` ON `u`.`level`+1 = `l`.`level_no` WHERE `u`.`email` = '$email' ";
//            $query = $this->db->query($sql, array($email));
//            $answer = $query->row();
            
            $this->db->select('percentage');
            $this->db->from('proximity');
            $this->db->where('level_no', $data['level']);
            $this->db->where('answer', $data['answer']);
            
            $query = $this->db->get();
            $answer = $query->row_array();
            
            if (!$answer['percentage']) {
                $answer['percentage'] = 0;
            }
            //echo "level",$answer['percentage'],"perc";
            return $answer['percentage'];
        
        } 
        
}