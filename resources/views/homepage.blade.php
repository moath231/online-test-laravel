<html>
	<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script class="u-script" type="text/javascript" src="{{ asset('js/smart_math_exam.js') }}" defer=""></script>
        <link rel="stylesheet" href="{{asset('css/smart_math_exam.css')}}" media="screen">
        <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <title>Smart Math Exam | Homepage </title>
        </head >
<body>
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
                    <a class="nav-link active mx-2" aria-current="page" href="homepage">Home</a>
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

        <div class="container mt-5 mx-5  ">
            <h1 class="text-dark display-2 ">This is Smart Math Exam </h1>
            <h2 class="text-dark mt-4   ">A Free Responsive Math Exam</h2>
            @if(!session('user_profile'))
                <a class="btn btn-primary btn-outline-white mt-4" href="login">Sign Up</a>
            @endif
        </div>
        <div class="divider py-1  mt-5"><hr></div>
		<div class="container mt-5 mx-5">
			<h2 class="text-dark ">WHAT WE HAVE </h2>
			<h5 class="text-muted mt-2 mb-4 ">WHY OUR EXAMS ARE DIFFERENT</h5>
            <div class="container  border border-2 border-dark">
                <div class="row mt-5 ">
                    <div class="col-sm">
                        <img src="https://cdn-icons-png.flaticon.com/512/1451/1451868.png" class="img-responsive rounded float-left w-0 " alt="..." width="200" height="150">
                    </div>
                    <div class="col-sm">
                        <img src="https://bsmedia.business-standard.com/_media/bs/img/article/2021-09/20/full/1632101780-4712.jpg?im=Resize,width=480" class="img-responsive rounded float-left w-0 " alt="..." width="200" height="150">
                    </div>
                    <div class="col-sm">
                        <img src="https://abinteriorconstruction.com/en/contact.png" class="img-responsive rounded float-left w-0 " alt="..." width="200" height="150">
                    </div>
                </div>
                <div class="container mb-4">
                    <div class="row mt-3">
                        <div class="col-sm text-dark">
                            <strong>Our Website offers updated exams <br>with a click without wasting time and search for questions to know your level in Math.</strong>
                        </div>
                        <div class="col-sm text-dark">
                            <strong> Get instant results for your exams <br>once you finish, no need for waiting the result, results are saved in your profile. </strong>
                        </div>
                        <div class="col-sm text-dark">
                            <strong>Connect with us, if you experienced <br> any bugs occured while navigating the website, or if you have any recommendations.</strong>
                        </div>
                    </div>
                </div>
            </div>

			<div class="divider py-1  "><hr></div>
                <h2 class="text-dark mt-5"><strong>SERVICES</strong></h2>
                <h4 class="text-dark mt-2 mb-3">KNOW MORE ABOUT OUR WEBSITE</h4>
			<div class="container  border border-2 border-dark">
                <div class="row mt-5">
                    <div class="col-sm me-5">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSr6j8KzuJfj7RUI1QAb_f5UhOk7ewRdKuNuQ&usqp=CAU" class="img-responsive rounded float-left w-0 " alt="..." width="400" height="200">
                    </div>
                    <div class=" col-sm ms-5">
                        <img src="data:image/png;base64,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" class="img-responsive rounded float-left w-0 " alt="..." width="400" height="200">
                    </div>
                </div>
				<div class="container">
                    <div class="row mt-3">
                        <div class="text-dark me-5 col-sm">
                            <h3><strong> EXAMS</strong></h3>
                        </div>
                        <div class=" text-dark col-sm ms-5">
                            <h3><strong>CHALLENGING</strong></h3>
                        </div>
                    </div>
				</div>
				<div class="container">
                    <div class="row mt-3">
                        <div class="text-dark col-sm  me-4 ">
                            Have the opportunity to take exams in our website, which has extraordinary
                            features, multiple exams and smart question picker which depends on the student's level, with 3 question levels: easy, medium and hard. However it also has a fair scoring system.
                        </div>
                        <div class="text-dark col-sm  ms-5 ">
                            Every Exam in our website contains different questions than other one's, because we have a large question bank. Our exams has a different scoring system,
                            if you answer an overall 2 positive correct answers  you will have a 2 questions skip taking their marks with you.
                        </div>
                    </div>
                </div>
                <div class="devider py-3"></div>
			</div>
			<div class="container  mt-1 py-1 mb-4  " >
				<div class="row mt-3">
                    <div class="text-dark col-sm  ">
                        <u>ABOUT US </u><br>  <h6 class="mt-2">The Smart Math Exams that are provided on this<br>website are free to use for educational noncommercial purposes only.</h6>
                    </div>
                    <div class=" text-dark col-sm">
                        <u>USEFUL LINKS </u><br>
                        <a href="https://magoosh.com/" class="link-primary">Magoosh<br></a>
                        <a href="https://www.khanacademy.org/" class="link-primary">KhanAcademy<br></a>
                        <a href="https://brilliant.org/" class="link-primary">Brilliant</a>
                    </div>
                    <div class=" text-dark col-sm ">
                        <u>SOCIAL<br></u>
                        <div>
                            <a class="btn btn-dark bg-primary btn-sm" style="background-color: #55acee; width:100px" href="#!" role="button">
                            <i class="fab fa-twitter me-2"></i>Twitter<br></a>
                        </div>
                        <div>
                        <a class="btn btn-dark bg-primary btn-sm" style="background-color: #55acee; width:100px" href="#!" role="button">
                            <i class="fab fa-facebook-f"></i>Facebook<br></a>
                        </div>
                        <div>
                                <a class="btn btn-dark bg-primary btn-sm" style="background-color: #55acee; width:100px" href="#!" role="button">
                                <i class="fab fa-google"></i> Gmail<br></a>
                        </div>
                    </div>
				</div>
			</div>
	</body>
</html>
