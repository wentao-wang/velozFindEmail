
@extends('layouts')

@section('title','Find Email')
@section('body','Begin Search')

@section('content')
   <div class="container">
	   	<div class="row">
	   		<form action="" method = "get">
		        Title (required):<br>
		        <input type='text' name='title' required="required"><br><br>
		        City:<br>
		        <input type='text' name='city'><br><br>
		        <input type="submit" name="search" value="search">
    		</form>
	   	</div>
    </div>
    



@endsection

