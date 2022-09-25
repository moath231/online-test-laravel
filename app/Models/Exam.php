<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Exam extends Model
{
    /**
   * Loads from DB exams questions
   *   *
   * @return \Illuminate\Support\Collection
   */
public function load_questions() {
    $limit = 5;
    $questions_level_0_mc = [];
    $questions_level_1_mc = [];
    $questions_level_2_mc = [];

    $questions_level_0 = (array) DB::select("select * from exam_questions where level = ? order by RANDOM() limit ?",
    [0, $limit]);

    foreach ($questions_level_0 as $question) {
        $text = str_replace("\n", "<br />", $question->text);
        $question->text = $text;
    }

    foreach ($questions_level_0 as $question) {
      $questions_level_0_mc[$question->id] = (array) DB::select("select * from questions_multiple_choices where question_id = ?",[$question->id]);
    }

    $questions_level_1 = (array) DB::select("select * from exam_questions where level = ? order by RANDOM() limit ?",
    [1, $limit]);

    foreach ($questions_level_1 as $question) {
        $text = str_replace("\n", "<br />", $question->text);
        $question->text = $text;
    }

    foreach ($questions_level_1 as $question) {
      $questions_level_1_mc[$question->id] = (array) DB::select("select * from questions_multiple_choices where question_id = ?",[$question->id]);
    }

    $questions_level_2 = (array) DB::select("select * from exam_questions where level = ? order by RANDOM() limit ?",
    [2, $limit]);

    foreach ($questions_level_2 as $question) {
        $text = str_replace("\n", "<br />", $question->text);
        $question->text = $text;
    }

    foreach ($questions_level_2 as $question) {
      $questions_level_2_mc[$question->id] = (array) DB::select("select * from questions_multiple_choices where question_id = ?",[$question->id]);
    }

    return [
        'l0'=>$questions_level_0,
        'l1'=>$questions_level_1,
        'l2'=>$questions_level_2,
        'mc0'=>$questions_level_0_mc,
        'mc1'=>$questions_level_1_mc,
        'mc2'=>$questions_level_2_mc
    ];

}

    /**
     * Saves exam score and date in DB
     *
     * @return \Illuminate\Support\Collection
     */
    public function save_exam_data($score, $date, $user_id)
    {
        return DB::insert('insert into exam_details (user_id, date, score) values (?, ?, ?)',
        [$user_id, $date, $score]);
    }


    /**
     * Calls DB to get exam history
     *
     * @return \Illuminate\Support\Collection
     */
    public function get_history($user_id)
    {
      return ((array) DB::select("select * from exam_details where user_id = ?",
        [$user_id]));
    }
}
