<?php

namespace App\Http\Controllers;

	class searchController extends Controller{
		public function index()
    {
        return view("search");
    }

	}


echo(" Hello ".$_POST['email']) ;

