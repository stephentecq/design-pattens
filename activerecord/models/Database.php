<?php
/**
 * Created by PhpStorm.
 * User: munabste
 * Date: 8/24/2015
 * Time: 3:00 PM
 */
//THIS IS THE SINGLETON DESIGN PATTERN FOR DATABASE CONNECTION
        //
        // 1.First you create a Database class
        //
class Database
    {
        //here we will create variable that we will be using to store our connection, query and results
        private $_mysqli,
                $_query,
                $_results = array(),
                $_count = 0;



        //
        //2. we create a static variable to enable us to be able to use it in this way ( Database::whateverMethod())
        //
        public static $instance;

        //
        //3. This will create the new instance for the database class for us
        //Since this function in the Database class, it has full access to all methods in this class, thus it can call the -0----
        //
        public static function get_instance()
        {
            //
            // the if statement check to see if there is already an instance to database open,
            // if is is it will use current connection else it will open a new connection

            if(!isset(Database::$instance))
            {
                //
                // Ths creates a new instance of the database an stores in the database variable we created call $instance
                //
                Database::$instance = new Database();
                // once the database instance has been created, in order to use it, we have to return in a nd make it available to any ne instance
                return Database::$instance;
            }

        }

        //
        //3. The constructor will be used to make sure the db connection is always instantiated when a new instance to created
        //
        private function __construct()
            {
                $this->_mysqli = new mysqli('localhost', 'root', '', 'xapp_base');
                //echo 'connected';
            }

        public function query($sql)
        {
            if($this->_query = $this->_mysqli->query($sql))
            {
                while($row = $this->_query->fetch_object())
                {
                    $this->_results[] = $row;
                }
                $this->_count = $this->_query->num_rows;

            }
            return $this;
        }
        public function results()
        {
            return $this->_results;
        }

        public function count()
        {
            return $this->_count;
        }
    }


  $users = Database::get_instance()->query("SELECT * FROM users LIMIT 10");
    if($users->count())
    {
        foreach($users->results() as $user)
        {
          echo $user->name .  "<br/>";
        }
    }
