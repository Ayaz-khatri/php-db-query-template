<?php

class db
{

	/*//////////////////////////////////////////////////////////////////////////
	Variables for Connection
	/////////////////////////////////////////////////////////////////////////*/

	private $dbHost = "localhost";
	private $dbUser = "root";
	private $dbPassword = "";
	private $dbName = "student";


	/*//////////////////////////////////////////////////////////////////////////
	Variables for Class
	/////////////////////////////////////////////////////////////////////////*/

	private $mysqli = "";
	private $result = array();
	private $conn = false;

	
	/*//////////////////////////////////////////////////////////////////////////
	Constructor Function
	/////////////////////////////////////////////////////////////////////////*/
	
	public function __construct()
	{
		if(!$this->conn)
		{
			$this->mysqli = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
			$this->conn = true;
			if($this->mysqli->connect_error)
			{
				array_push($this->result, $this->mysqli->connect_error);
				return false;

			}
		}
		else
		{
			return true;
		}
	}

	/*//////////////////////////////////////////////////////////////////////////
	Desstructor Function
	/////////////////////////////////////////////////////////////////////////*/

	public function __destruct()
	{
		if($this->conn)
		{
			if($this->mysqli->close())
			{
				$this->conn = false;
				return true;
			}
		}else
		{
			return false;
		}
	}

	/*//////////////////////////////////////////////////////////////////////////
	Parameters Binding Dynamically
	/////////////////////////////////////////////////////////////////////////*/

	public function dynamicallyBindParameters($query, $params)
	{
		$types = '';						// Generate the Type String (eg: 'issisd')
	        foreach($params as $param)
	        {
	            if(is_int($param)) 
	            {	$types .= 'i';	}			// Integer 
	            				
	            elseif (is_float($param)) 
	            {	$types .= 'd';	}			// Double 		
	            
	            elseif (is_string($param)) 
	            {   $types .= 's';	}			// String 		
	            
	            else 
	            {   $types .= 'b';	}			// Blob and Unknown			
	        }

	        $bind_names[] = $types;				// Add the Type String as the first Parameter
	  
	        for ($i=0; $i<count($params);$i++)	// Loop thru the given Parameters
	        { 
	            $bind_name = 'bind' . $i;		// Create a variable Name        
	            $$bind_name = $params[$i];		// Add the Parameter to the variable Variable
	            $bind_names[] = &$$bind_name;	// Associate the Variable as an Element in the Array
	        }
	        return $bind_names;
	}

	/*//////////////////////////////////////////////////////////////////////////
	Select Operation
	/////////////////////////////////////////////////////////////////////////*/
	
	public function executeSQL($query, $params, $select = false)
	{
	    if (!empty($params))
	    {        	        
	        $bind_names = $this->dynamicallyBindParameters($query, $params);
			$query = $this->mysqli->prepare($query);
	        call_user_func_array(array($query,'bind_param'), $bind_names);
	        $query->execute();
	        if($select)
	        {
	        	$result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
	    	}
	    	else
	    	{
	    		if($query->affected_rows > 0)
		        {
		        	$result = ["queryExecuted" => true, "affectedRows" => $query->affected_rows];
		        }
		        else
		        {
		        	$result = ["queryExecuted" => false, "affectedRows" => 0];
		        }
	    	}
	    }
	    else
	    {
	    	$query = $this->mysqli->prepare($query);
	        $query->execute();
	        $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
	    }
	    return $result;
	}


	/*////////////////////////////////////////////////////////////////////////*/

} //Class Close

?>