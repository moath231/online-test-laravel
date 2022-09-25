<html>
	<head>
        <title>Smart Math Exam | Profile </title>
        <link rel="stylesheet" href="{{asset('css/smart_math_exam.css')}}" media="screen">
        <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script class="u-script" type="text/javascript" src="{{ asset('js/smart_math_exam.js') }}" defer=""></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</head>
	<body class="bg-dark">
		<nav class="navbar navbar-expand-sm navbar-dark bg-primary" >
            <div class="container-fluid ">
                    <a class="navbar-brand" href="homepage">
                        <img src="https://i.pinimg.com/564x/51/c4/5f/51c45fa5cb709129f3d49b7a8153ae29.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                            Smart Math Exam
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link mx-2" aria-current="page" href="homepage">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link " href="exam_page">Exams</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link " href="contact">Contact</a>
                        </li>
                    </ul>
						@if(!session('user_profile'))
                    <a class="nav-link btn text-dark  btn-outline-light border border-2 border-dark" href="login"><strong>Sign In</strong></a>
					@else
						<div class="login_nav_text"><strong>Welcome </strong><a href="/user_profile" class="ms-2 btn btn-warning text-dark btn-outline-light"><strong> {{session('user_profile')[0]->username}} </strong></a></div>
						<a class="nav-link btn  btn-danger text-dark  " href="logout"><strong>  Logout</strong></a>
					@endif
				</div>
			</div>
		</nav>
		@if(isset($msg))
			<div class="warning_message"><h1> {{$msg}} </h1></div>
		@endif
		@if(isset($form_msg))
			<div class="warning_message"><h1> {{$form_msg}} </h1></div>
		@else
			<div class="login-wrap">
                <div class="login-html">
                <span class="text-dark display-6"><u>{{session('user_profile')[0]->username}}-</a><a class="text-warning">Profile:</a></u></span>
                    <div id="user_profile_html">
                        <table class="table table-dark table-hover table-bordered table-responsive mt-5">
                            <thead class="text-white text-center ">
                                <tr>
                                    <th scope="col">Exam Number</th>
                                    <th scope="col">Exam Score</th>
                                    <th scope="col">Exam Date</th>
                                </tr>
                            </thead>
                            <tbody  class="text-white text-center">
                                    @foreach($exam_history as $key=>$exam)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$exam->score}} /10</td>
                                            <td>{{$exam->date}}</td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
		@endif
	</body>
</html>
