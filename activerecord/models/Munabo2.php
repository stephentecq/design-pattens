<?php
/**
 * Created by PhpStorm.
 * User: munabste
 * Date: 8/25/2015
 * Time: 11:35 AM
 */

class Munabo {
    public $name = null;
    public $create_status = false;
    public $app_start = false;


   public static $instance;

    public function get_instance()
    {
        if(!isset($this->$instance))
        {
            Munabo::$instance = new Munabo();

        }
        return Munabo::$instance;
    }

    public function  __construct($name)
    {

        if(empty($name))

        {

            //print_r($this->app_start);

            echo "<form method='post' action='index.php' >";
            echo '<p>Enter your app name: <input type="text" name="name"></p>';
            echo '<input type="submit" value="submit">';
        }
        if(isset($name)){
            $this->app_start = true;


            if($this->app_start == true){
                $this->name = $_POST['name'];
                $_SESSION["name"] = $this->name;

                //print_r($name);
                //exit;
                $this->create($this->name);

            }

            //print_r($this->app_start);
        }
    }

    public function create($name)
    {

        $this->name = $name;
        if(empty($this->name) || $this->name == '')
        {

            return false;
            $this->create_status = false;

        }
        else{
            echo 'This app has just been created and its called: ' . $_SESSION['name'];//$this->name;
            $this->create_status = true;
        }

    }

    public function mk_content()
    {
        if( $this->create_status == false)
        {
            echo '<br/>No name was created for this App, Please set a name';
        }
        else{
            echo '<h2>Enter your content Here for your new app!</h2>';
            echo "<form method='post' action='app.php' >";

            echo "<p>Title:</p><div><input type='text' name='content' ></div>";
            echo "<div><p>Content:</p><textarea  name='content' >Enter content here!</textarea></div><br/>";
            echo "<div><input type='submit' value='submit'></div>";
            echo "</form>";
            $this->get_content();


        }
    }
    public function get_content()
    {
        if(isset($_POST['submit']))
        {
            $_SESSION['title'] = $_POST['title'];
            $_SESSION['content'] = $_POST['content'];


        }
    }

    public function display_app()
    {
        echo "<h3>App Name:" . $_SESSION['name'] . "</h3>";
        echo "<h3>App Name:" . $_SESSION['title'] . "</h3>";
        echo "<h3>App Name:" . $_SESSION['content'] . "</h3>";
    }



}








