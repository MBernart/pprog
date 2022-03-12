<?php

namespace App\Http\Controllers;

use App\Models\QuestionAnswer;
use App\Models\TestApproach;
use App\Models\Test;
use App\Models\TestApproachAnswer;
use Illuminate\Http\Request;
use App\Models\TestQuestion;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TestController extends Controller
{

    function getNextQuestionsIdAndPopIt()
    {
        $nextIDs = session()->pull('questions_order');
        $nextQuestionId = array_shift($nextIDs);
        session()->put('questions_order', $nextIDs);
        session()->put('current_question', $nextQuestionId);
        return $nextQuestionId;
    }

    function displayResults($approach_id)
    {
        $thisApproach = TestApproach::find($approach_id);
        return view('test.result', ['testApproach' => $thisApproach, 'score' => $thisApproach->getScore()]);
    }

    public function endTest()
    {
        $testApproach = TestApproach::find(session()->get('test_approach_id'));
        $testApproach->end_time = now();
        $testApproach->save();
    }

    function createTestApproach($test_id)
    {
        $membership_id = Test::find($test_id)->Course->Memberships->where('user_id', Auth::id())->first()->id;
        // dd($membership_id, $test_id);
        $testApproach = new TestApproach(['membership_id' => $membership_id, 'test_id' => $test_id]);
        // dd($testApproach);
        $testApproach->save();
        session()->put('test_approach_id', $testApproach->id);
    }

    public function setEmptyApproachInSession($test_id)
    {
        $test = Test::find($test_id);
        // dd($membership_id, $test_id);
        $testApproach = $test->usersEmptyApproaches(Auth::user())->first();
        $testApproach->start_time = now();
        // dd($testApproach);
        $testApproach->save();
        session()->put('test_approach_id', $testApproach->id);
    }

    function showNextQuestion($question_id)
    {
        return view('test.question', ['question' => TestQuestion::where('id', $question_id)->first()]);
    }

    function setShuffledQuestionsOrder($test_id)
    {
        $questionsOrder = TestQuestion::where('test_id', $test_id)->pluck('id')->toArray();
        shuffle($questionsOrder);
        session()->put('questions_order', $questionsOrder);
    }


    public function submitAnswerAndGetNextQuestion()
    {
        $question_id = session()->pull('current_question');
        $scoreAwarded = 0;
        $question = TestQuestion::find($question_id);
        $correctAnswer = $question->CorrectAnswers->first()->id;
        $answer = request('answer');
        if ($answer == $correctAnswer)
        {
            $scoreAwarded = $question->max_points;
        }
        $answer = new TestApproachAnswer(
            [
                'test_approach_id' => session()->get('test_approach_id'),
                'question_id' => $question_id,
                'given_answer_id' => request('answer'),
                'score_awarded' => $scoreAwarded,
            ]
        );
        $answer->save();
        return TestController::showNextQuestion(TestController::getNextQuestionsIdAndPopIt());
        // return redirect(route('test-question', [$question->Test->id]));
    }

    public function startApproach($test_id)
    {
        session()->forget(['questions_order', 'test_approach_id']);
        TestController::setEmptyApproachInSession($test_id);
        TestController::setShuffledQuestionsOrder($test_id);

        return redirect(route('test-question', [$test_id]));
    }

    public function handleTestApproach($test_id)
    {
        if (request()->has('answer'))
        {
            if (count(session()->get('questions_order')))
                return TestController::submitAnswerAndGetNextQuestion();
            else
            {
                TestController::submitAnswerAndGetNextQuestion();
                TestController::endTest();
            }
            return redirect(route('get-test-result', ['approach_id' => session()->pull('test_approach_id')]));
        }
        else
        {
            return TestController::showNextQuestion(TestController::getNextQuestionsIdAndPopIt());
        }
    }
}
