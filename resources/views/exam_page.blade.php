<!DOCTYPE html>
<html lang="en">
<head>
    <script class="u-script" type="text/javascript" src="{{ asset('js/smart_math_exam.js') }}" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{ asset('js/questions.js') }}" defer=""></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{asset('css/smart_math_exam.css')}}" media="screen">
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Math Exam | Exams </title>
</head>

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
            <a class="nav-link active"  href="exam_page">Exams</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact">Contact</a>
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

<body class="bg-dark">
    <!-- start Quiz button -->
    <div class="start_btn"><button>Start Exam</button></div>

    <!-- Info Box -->
    <div class="info_box">
        <div class="info-title"><span>Rules Of This Exam</span></div>
        <div class="info-list">
            <div class="info">1. You Will Have Only <span>220 Seconds </span> Per Each Question.</div>
            <div class="info">2. Once You Select Your Answer, It Can't Be Undone.</div>
            <div class="info">3. You Can't Select Any Option Once Time Goes Off.</div>
            <div class="info">4. You Can't Exit From The Exam While You're In.</div>
            <div class="info">5. You'll Get Points On The Basis Of Your Correct Answers.</div>
            <div class="info">5. You'll Get One Chance To Skip Two Questions And Get Their Points When Your OverAll Correct Answers Is +2.</div>
        </div>
        <div class="buttons">
            <button class="quit">Exit Exam</button>
            <button class="restart">Continue</button>
        </div>
    </div>

    <!-- Quiz Box -->
    <div class="quiz_box">
        <header>
            <div class="title">Smart Math Exam</div>
            <div class="timer">
                <div class="time_left_txt">Time Left</div>
                <div class="timer_sec">220</div>
            </div>
            <div class="time_line"></div>
        </header>
        <section>
            <div class="que_text">
                <!-- Here I've inserted question from JavaScript -->
            </div>
            <div class="option_list">
                <!-- Here I've inserted options from JavaScript -->
            </div>
        </section>

        <!-- footer of Quiz Box -->
        <footer>
            <div class="total_que">
                <!-- Here I've inserted Question Count Number from JavaScript -->
            </div>
            <button class="next_btn">Next Question</button>
        </footer>
    </div>

    <!-- Result Box -->
    <div class="result_box">
        <div class="icon">
            <i class="fas fa-crown"></i>
        </div>
        <div class="complete_text">You've Completed The Exam!</div>
        <div class="score_text">
            <!-- Here I've inserted Score Result from JavaScript -->
        </div>
        <div class="buttons">
            <button class="restart">Replay Exam</button>
            <button class="quit">Quit Exam</button>
        </div>
    </div>

    <script>
    var questions = {{!! json_encode($questions) !!}};
    </script>

</body>
</html>
