<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Result</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            min-height: : 100vh;
            margin: 0;
        }
        th,td{
            text-align: center;
        }

        .full-height {
            min-height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }
        .content2{
            text-align: center;
        }
        .result_content {
            text-align: center;
        }

        .title {
            font-size: 50px;
            margin-top: 0px
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 0px;
        }
    </style>
</head>
<body>



    <script type='text/javascript'>
        $(document).ready(function(){
        // alert('test');
        function GetRequest(strName)
        {
           var strHref = window.location.href; 
           var intPos = strHref.indexOf("?");  
           var strRight = strHref.substr(intPos + 1);
           var arrTmp = strRight.split("&"); 
           for(var i = 0; i < arrTmp.length; i++) 
           { 
             var arrTemp = arrTmp[i].split("="); 
             if(arrTemp[0].toUpperCase() == strName.toUpperCase()) return arrTemp[1]; 
         } 
         return ""; 
     }

// alert(GetRequest("id"));
// alert(GetRequest("status"));

if(GetRequest("status")=="pending"){
    text="<br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><center><p class='title'> This search is still pending. Please wait for result.</p><center>";
    
    $('#resTable').html(text);

}
if(GetRequest("status")=="failed"){
    text="<br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><center><p class='title'> This search is failed. Please try others.</p><center>";
    
    $('#resTable').html(text);

}
if(GetRequest("status")=="processing"){
    text="<br><br><br><br><br><br><br><br><br><br<br><br><br><br><br><br><center><p class='title'> This search is still processing. Please try others.</p><center>";
    
    $('#resTable').html(text);

}
if(GetRequest("status")=="completed"){
    text="<br><br><center><p class='title'> Result</p><center>";
    text+="<center><table border='1' width='800' height='300px'><tbody><tr ><th width='800'>Linkedin</th><th width='800'>Name</th><th width='800'>Title</th><th width='800'>Emails</th></tr>";
    var searchId= GetRequest("id");
    $.ajax({
        type:'GET',
        url:'/return',
        data:{searchId:searchId},
        success:function($response){

            var response=JSON.parse($response);
           
            // alert(response[3][2]);

            for(var i = 0; i<response[0].length;i++){
                text+="<tr><td width='800'>";
                text+=response[0][i];
                text+="</td><td width='800'>";
                text+=response[1][i];
                text+="</td><td width='800'>";
                text+=response[2][i]; 
                text+="</td><td width='800'>";
                if(response[3][i].length==0){
                    text+="not found</td></tr>";
                }else if(response[3][i].length==1){
                    text+=response[3][i][0];
                    text+="</td></tr>";
                }else{
                    text+=response[3][i][0];
                    text+="</td></tr>";
                    for(var j=1; j<response[3][i].length;j++){
                    text+="<tr><td></td><td></td><td></td><td>";
                    text+=response[3][i][j];
                    text+="</td></tr>";
                    }
                }



                    
                
                



            }
            text+="</tbody></table></center>"
            $('#resTable').html(text);

        }


    });

    
    

}



});





</script>
<div id="resTable">

</div><br><br><br>

</body>
</html>
