<?php
// include ('searchController.php');
namespace App\Http\Controllers;
use Illuminate\Http\Request;


class searchQ extends Controller{

	public function searchQ(Request $request){
		if ($request->isMethod('post')){    
			return response()->json(['response' => 'This is post method']); 
		}



		$title="";
		$city ="";
		$count="";

		if(isset($_GET['title'])) $title=$_GET['title'];
		if(isset($_GET['city'])) $city=$_GET['city'];
		if(isset($_GET['count'])) $count=$_GET['count'];
        // return response()->json([ $title,$city,$count]);

		$serverName = '127.0.0.1';
		$userName = 'homestead';
		$password= 'secret';
		$database = 'EmailCrawlerDB';
		$con = mysqli_connect($serverName,$userName,$password,$database);
		if (!$con)
		{
			echo("fail");
			die('Could not connect: ' . mysql_error());
		}
		$id=date("YmdHis");
		function get_millisecond()  
		{  
			list($usec, $sec) = explode(" ", microtime());  
			$msec=round($usec*1000);  
			return $msec;               
		} 
		$ms=get_millisecond(); 
		$id=$id.$ms;

		session_start();
		$lkinid=$_SESSION['lkinid'];
		$internalCompany=$_SESSION['internalCompany'];

		$sql1='insert into Search values("'.$id.'","'.$count.'","'.$title.'","'.$city.'","150","pending","'.$lkinid.'","'.$internalCompany.'");';
		$result=mysqli_query($con, $sql1 );

		$sql2='select search_id,search_keywords,search_progress from Search;';
		$result2=mysqli_query($con,$sql2);
		$response=array();
		while($row = mysqli_fetch_array($result2,MYSQLI_NUM)){
			$response[]=$row;

		}
  		echo json_encode($response);

		mysqli_close($con);


	}

}