<?php
include "connection.php";



class Database
{
	public $conn;

	public function __construct()
	{
		$db = new connect();

		$this->conn = $db->connect_db();

	}
	public function createinfo($name,$address,$email,$cno,$city,$gender,$image)
	{
		

		$sql = " INSERT INTO peeps (name,address,email,cno,city,gender,image) VALUES ('$name','$address','$email','$cno','$city','$gender','$image')";
		$res = mysqli_query($this->conn, $sql);
		// if($this->conn->query($sql) === TRUE)
  //       {
  // 		header("Location: listinfo.php");
  // 	    }
  // 	    else
  // 	    {
  // 		header("Location: listinfo.php");
  // 	    }
       return $res;
	}
	public function readinfo($id=null)
    {
		$sql = "SELECT * FROM peeps";
		if($id)
			{ 
				$sql .= " WHERE id=$id";
			}
 		$res = mysqli_query($this->conn, $sql);
 		return $res;
	}
	public function deleteinfo($id)
	{
		$sql = "DELETE FROM peeps WHERE id=$id";
 		$res = mysqli_query($this->conn,$sql);
 		return $res;
	}

	public function updateinfo($name,$address,$email,$cno,$city,$gender,$image,$id)
	{
		$sql = "UPDATE peeps SET name='$name', address='$address', email='$email', cno='$cno', city='$city', gender='$gender', image='$image' WHERE id=$id";
		// echo $sql;exit;

		if(mysqli_query($this->conn, $sql))
		{
	
			header("Location:listinfo.php");
		}
	}
}

?>