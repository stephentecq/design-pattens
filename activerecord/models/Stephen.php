<?php

    class Stephen
    {
        private static $instance;

        public function get_instance()
        {
           if(!isset(Stephen::$instance))
           {
               Stephen::$instance = new Stephen();
               return Stephen::$instance;
           }

        }
        public function __construct()
        {
            echo $this->myson();
        }
         public function myson()
         {
             echo 'Patrick J<br/>';
         }

        public function mywife()
        {
            echo 'celine2';
        }

    }

    $me = new Stephen();
    $me->get_instance();
