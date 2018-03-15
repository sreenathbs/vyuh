<?php

class Level extends CI_Model {

		public $level_id;
		public $serial_number;
		public $question;
		public $answer;
		public $type;
		public $active;

        public function __construct()
        {
                $this->load->database();
        }
}

