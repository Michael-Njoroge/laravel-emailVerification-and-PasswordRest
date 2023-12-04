<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test App</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .logout{
            cursor: pointer;
            background-color: rgb(213, 45, 20);
            border-style: none;
            border-radius: 25px;
            padding: 5px 1px;
            width: 115px;
            color: #fff;
            font-size: 15px;
            font-weight: bold;
            top: 12px;
            right: 12px; 
            position: absolute;
          }
    </style>
</head>
<body>

<button class="logout">Logout</button>
  
<script>
    var token = localStorage.getItem('access_token');

    if( window.location.pathname == '/register' || window.location.pathname == '/')
    {

        if(token != null){
            window.location.href = '/profile';
        }

        $(".logout").hide();

    }
    else{

        if(token == null){
            window.location.href = '/';
        }

    }

    //logout user
    $(".logout").click(function(){
        $.ajax({
                url: "http://127.0.0.1:8000/api/logout",
                type: "GET",
                headers: {
                    'Authorization':localStorage.getItem('access_token')
                },
                success:function(data){
                    if(data.status == 'true')
                    {
                        localStorage.removeItem('access_token');
                        window.location.href = '/'
                    }
                    else{
                        alert(data.message)
                    }
                }
            });
    });
</script>

</body>
</html>