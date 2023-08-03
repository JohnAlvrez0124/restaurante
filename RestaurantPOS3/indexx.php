<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Restro POS System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
			radial-gradient:(red, blue);
			background-image: url("copitas.jpg");
            background-color: #cccccc;
			background-size : cover;
			background-repeat: no-repeat ;
			background-position: center center ;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
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

        .title {
            font-size: 100px;
			color: #E2DDEB;
			font-weight: bold;
        }

        .links>a {
            color: #ADADAD;
            padding: 0 40px;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: .3rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
			margin-top: 0px;
            margin-bottom: 30px;
        }
		
		a:hover {
            color: #E3E3E3;
        }
		
    </style>
</head>
<!-- For more projects: Visit codeastro.com  -->
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                CONSUELO
            </div>

            <div class="links">
			<!-- For more projects: Visit codeastro.com  -->
                <a href="restro\admin\index1.php">Administrador</a>
                <a href="restro\admin\index copy.php">Empleados</a>
<!--              <a href="Restro/customer">Customer Log In</a> -->
            </div>
        </div>
    </div>
</body>
</html>