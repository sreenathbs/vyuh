<?php


class Hint extends CI_Model {

        public $hint_id;
        public $level_id;
        public $hint;
        public $active;

        public function __construct()
        {
                $this->load->database();
        }


        public function get_hints_for_level($level_no){


        
        }


        public function get_all_hints(){



        }

        public function add_hint($level_no, $hint){



        }


}
