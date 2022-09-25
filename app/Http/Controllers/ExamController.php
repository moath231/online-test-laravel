<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ExamController extends Controller
{
    /**
   * Call to model to loads from DB exams questions
   *   *
   * @return \Illuminate\Support\Collection
   */
public function load_questions()
{
    $exam = new Exam();
    $questions = $exam->load_questions();

    $number_exam_questions = 15;
    $number_level_questions = 5;
    $number_of_questions_levels = 3;
    $json_questions = [];

    for($round=0; $round<$number_of_questions_levels; $round++){

        $start_question_id = ($number_level_questions * $round) +1;
        $end_question_id = $start_question_id + $number_level_questions -1;
        $questions_counter = 0;

    for($question_id=$start_question_id; $question_id<=$end_question_id; $question_id++){
        $level = 'l'.$round;
        $mc = 'mc'.$round;

        $question = $questions[$level][$questions_counter];
        $mc_options = $questions[$mc][$question->id];
        $mc_options [] = (object)["text" => $question->answer];
        shuffle($mc_options);

        $json_mc_options = [];
    foreach ($mc_options as $option) {
        $json_mc_options[] = $option->text;
    }

        $json_questions[] = [
            "numb" =>$question_id,
            "question"=> $question->text,
            "answer"=> $question->answer,
            "options"=> $json_mc_options
        ];

        $questions_counter++;
    }
    }

    return ($json_questions);
}


/**
   * Calls model to save exam score qnd date
   *
   * @return \Illuminate\Support\Collection
   */
public function save_exam_data($score)
{
    $exam = new Exam();
    $date = date('Y-m-d');
    $user_id = session('user_profile')[0]->id;

    return $exam->save_exam_data($score, $date, $user_id);
}

/**
   * Calls model to get exam history
   *
   * @return \Illuminate\Support\Collection
   */
public function get_history()
{
    $exam = new Exam();
    $user_id = session('user_profile')[0]->id;
    return $exam->get_history($user_id);
}

}

