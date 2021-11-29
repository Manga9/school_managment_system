<?php

namespace App\Http\Controllers;

use App\Http\Requests\question\StoreQuestionRequest;
use App\Models\Exam;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        $exams = Exam::all();
        return view('questions.create', compact('exams'));
    }

    public function store(StoreQuestionRequest $request)
    {
        try {
            Question::create([
                'title' => $request->title,
                'answers' => $request->answers,
                'right_answer' => $request->right_answer,
                'score' => $request->score,
                'exam_id' => $request->exam_id
            ]);

            toastr()->success(trans('messages.success'));
            return redirect(route('questions.index'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit(Question $question)
    {
        $exams = Exam::all();
        return view('questions.edit', compact('exams', 'question'));
    }

    public function update(Request $request, Question $question)
    {
        try {
            $question->update([
                'title' => $request->title,
                'answers' => $request->answers,
                'right_answer' => $request->right_answer,
                'score' => $request->score,
                'exam_id' => $request->exam_id
            ]);

            toastr()->success(trans('messages.update'));
            return redirect(route('questions.index'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Question $question)
    {
        try {
            $question->delete();

            toastr()->success(trans('messages.delete'));
            return redirect(route('questions.index'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
