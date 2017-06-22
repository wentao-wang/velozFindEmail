
@extends('layouts')

@section('title','Find Email')
@section('body','Begin Search')

@section('content')
<div class="container">
	<div class="row">
		<div name="theSearch"> 
			Keyword (required):<br>
			<input type='text' name='title' id ="title" required="required"><br><br>
			City:<br>
			<input type='text' name='city' id='city'><br><br>
			Count:<br>
			<input type='number' name='count' id ='count' ><br><br>

			<button id="sub" >Add to search queue </button>


			<!-- <input type="submit" name="search" value="Add to search queue"> -->
		</div><br>
		<button id="ref" >Refresh</button>


	</div>
</div>

<script type="text/javascript">
$('#ref').click(function(){
	$.ajax({

			type:'GET',
			url:'/search2',
			data:{},
			success:function($response){
				var response=JSON.parse($response);
    						// alert("res");
    						// alert(response);

    						var cellCount=response.length;
    						

    						var htmltext="<h4>Search Queue</h4><center><table border='1' width='800'><tbody><tr ><th width='800'>Id</th><th width='800'>Keyword</th><th width='800'>Status</th><th width='800'>Result</th></tr>";

    						for(var i=0;i<cellCount;i++){
    							htmltext+="<tr>";
    							for(var j=0;j<3;j++){
    								htmltext+="<td width='800'>";
    								htmltext+=response[i][j];
    								htmltext+="</td>";
    							}
    							
    					htmltext+="<td width='800'><a target='_blank' href='/result?id="+response[i][0]+"&status="+response[i][2]+"'>result</a></td></tr>";

    						}
    						htmltext+="</tbody></table></center>";
    						$('#appendArea').html(htmltext);
    						// alert(cellCount);
    					}
});
});
	
	$(document).ready(function() {
		$.ajax({

			type:'GET',
			url:'/search2',
			data:{},
			success:function($response){
				var response=JSON.parse($response);
    						// alert("res");
    						// alert(response);

    						var cellCount=response.length;
    						
    						
    						
    						

    						var htmltext="<h4>Search Queue</h4><center><table border='1' width='800'><tbody><tr ><th width='800'>Id</th><th width='800'>Keyword</th><th width='800'>Status</th><th width='800'>Result</th></tr>";

    						for(var i=0;i<cellCount;i++){
    							htmltext+="<tr>";
    							for(var j=0;j<3;j++){
    								htmltext+="<td width='800'>";
    								htmltext+=response[i][j];
    								htmltext+="</td>";
    							}
    							htmltext+="<td width='800'><a target='_blank' href='/result?id="+response[i][0]+"&status="+response[i][2]+"'>result</a></td></tr>";
    						}
    						htmltext+="</tbody></table></center>";
    						$('#appendArea').html(htmltext);
    						// alert(cellCount);
    					}
});







	});


	$('#sub').click(function(){
		var title=$('#title').val();
		var city=$('#city').val();
		var count=$('#count').val();
		$.ajax({

			type:'GET',
			url:'/search2',
			data:{title:title,city:city,count:count},
			success:function($response){
				var response=JSON.parse($response);
    						// alert("res");
    						// alert(response);

    						var cellCount=response.length;
    						
    						
    						// $('#appendBody').html("");
    						
    						// var tcontent="<tr>";
    						// 	for(var i =0;i<cellCount;i++){
    						// 		for(var j =0;j<3;j++){
    						// 			tcontent+="<td width='800'>";
    						// 			tcontent+=response[i][j];
    						// 			tcontent+="</td>"
    						// 		}
    						// 		tcontent+="<td width='800'>result</td>";
    						// 		tcontent+="</tr>";
    						// 		$('#appendTable').find('tbody').append(tcontent);
    						// 		tcontent="<tr>";

    						// 	}

    						var htmltext="<h4>Search Queue</h4><center><table border='1' width='800'><tbody><tr ><th width='800'>Id</th><th width='800'>Keyword</th><th width='800'>Status</th><th width='800'>Result</th></tr>";

    						for(var i=0;i<cellCount;i++){
    							htmltext+="<tr>";
    							for(var j=0;j<3;j++){
    								htmltext+="<td width='800'>";
    								htmltext+=response[i][j];
    								htmltext+="</td>";
    							}
    							htmltext+="<td width='800'><a target='_blank' href='/result?id="+response[i][0]+"&status="+response[i][2]+"'>result</a></td></tr>";
    						}
    						htmltext+="</tbody></table></center>";
    						$('#appendArea').html(htmltext);
    						// alert(cellCount);
    					}
});

	});
    			</script>

@endsection

@section('content2')
<div id="appendArea">
<!-- <h4>Search Queue</h4>
<center>
	<table border="1" width="800" id="appendTable">
		<tbody id="appendBody">
		<tr >
			<th width="800">Id</th>
			
			<th width="800">Keyword</th>
			<th width="800">Status</th>
			<th width="800">Result</th>

		</tr> -->
	

	
		
			
			<!-- 	
			</tbody>
		</table>
		</center> -->
	</div><br><br><br>

@endsection

