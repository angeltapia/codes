<?php
require_once "config.php";
class Conexion
{
	static private $instancia=NULL;
	private $enlace=NULL;
	private $resultSet=NULL;

	public function __construct($database = DB_DATABASE, 
                                                         $username = DB_SERVER_USERNAME, 
                                                         $password = DB_SERVER_PASSWORD, 
                                                         $server = DB_SERVER)
	{
		$this->enlace=@mysqli_connect($server,$username,$password);

		if(!$this->enlace){
			echo "No se pudo conectar al server";			
		}

		if(!@mysqli_select_db($this->enlace,$database)){
			echo "No se pudo conectar a la base de datos";			
		}
		
	}

	

    public function query($sql){
		$this->resultSet = @mysqli_query($this->enlace,$sql);
	
		return $this->resultSet;
   }
   
   public function fetch($sql){
		return @mysqli_fetch_array($sql);
   }

   public function numrow(){
		return @mysqli_num_rows($this->resultSet);
   }

   public function cierrasql(){
   		return @mysqli_free_result($this->resultSet);
   }

     public function escape($param){
       return @mysqli_real_escape_string( $this->enlace,$param);
   }

   public function lastid(){
       return @mysqli_insert_id( $this->enlace);
   }

}


?>