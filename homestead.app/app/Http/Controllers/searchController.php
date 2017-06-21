<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class searchController extends Controller{
	public function index()
	{

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

			// some code
			  // echo("suc");
		$email="";
		$password="";
		$internalCompany;
		if(isset($_POST['email'])) $email=$_POST['email'];
		if(isset($_POST['password'])) $password=$_POST['password'];
		// echo($_POST['internalCompany']);
		if($_POST['internalCompany']=="0") $internalCompany='CT';
		if($_POST['internalCompany']=="1") $internalCompany='BHC';
		$lkinid=date("m-d H:i:s");

		session_start();
		$_SESSION['internalCompany']=$internalCompany;
		$_SESSION['lkinid']=$lkinid;

		$sql1='select * from Linkedin_Account';
		$result=mysqli_query($con, $sql1 );
			   // echo (mysqli_fetch_array($result)['1']);
				
			   $sql2='insert into Linkedin_Account values("'.$lkinid.'","'.$email.'","'.$password.'");';
			   // // $sql2= 'insert into Linkedin_Account values(5,"test","password");';

			   $result=mysqli_query($con,$sql2);

			   // if($result){
			   // 	echo("add");
			   // }else{
			   // 	echo("fail add");
			   // }



		mysqli_close($con);

		return view("search");
	}

	public function login()
	{
		return  view("search");
	}


	// public function searchQ(Request $request){
	// 	if ($request->isMethod('post')){    
	// 		return response()->json(['response' => 'This is post method']); 
	// 	}        
	// }
}




