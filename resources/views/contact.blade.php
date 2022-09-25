<html>
<head>

	<link rel="stylesheet" href="{{asset('css/smart_math_exam.css')}}" media="screen">
	<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script class="u-script" type="text/javascript" src="{{ asset('js/smart_math_exam.js') }}" defer=""></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <title>Smart Math Exam | Contact </title>
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
              <a class="nav-link active" href="contact">Contact</a>
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
						<div class="w3-panel w3-red w3-display-container warning_message ">
         <span onclick="this.parentElement.style.display='none'"
         class="w3-button w3-large w3-display-topright" >&times;</span>
          <h2> {{$msg}} </h2>
		  </div>
		@endif
		@if(isset($msg))
			<div class="w3-panel w3-red w3-display-container warning_message ">
   <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright" >&times;</span>
  <h1> {{$msg}} </h1>
</div>
		@endif
		<div class="login-wrap" id="contact_page">
			<div class="login-html">
				<input id="tab-2" checked type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Contact Us</label>
				<div class="login-form">
					<div class="sign-up-htm">
						<div class="group">
							<label for="name" class="label">Name</label>
							<input id="name"  type="text" class="input">
						</div>
						<div class="group">
							<label for="email" class="label">Email Address</label>
							<input id="email" type="text" class="input">
						</div>
						<div class="group">
							<label for="notes" class="label">Notes</label>
							<input id="notes" type="text" class="input">
						</div>
						<div class="group">
							<input type="submit" id ="ajaxSubmit3" class="button" value="Send"  >
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
