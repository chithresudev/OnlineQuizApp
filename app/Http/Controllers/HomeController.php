<?php

namespace App\Http\Controllers;

use App\User;
use App\Questions;
use App\Answer;
use App\UserTest;
use Carbon\Carbon;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return dashboard
     */
    public function index()
    {

        $user = auth()->user();
      // Admin Dashboard
      if ($user->type == 'admin') {
         $users = User::where('type', '<>', 'admin')->get();
         return view('quiz.admin', ['users' => $users]);

      // Exits User DashBoard
      } elseif ($user->isTested()) {

        return view('quiz.result');
      }
       // User Question
        else {
        $questions = Questions::take(5)->get();
        $user->createTest();

        return view('quiz.index', ['questions' => $questions]);
      }

    }

    /**
    * Store the Answer and calculation get score.
    *
    * @return Store
    */
    public function store(Request $request)
    {

      $values = $request->except('_token');
      $user = auth()->user();

        foreach ($values as $question => $value) {
          $question_id = str_after($question, '_');

          $question = Questions::find($question_id);
          $answer = new Answer;
          $answer->question_id = $question_id;
          $answer->user_id = $user->id;
          $answer->correct_answer = $value;
          $answer->answer_score = 0;
          if ($answer->correct_answer == $question->answer) {
            $answer->answer_score = 1;
          }
          $answer->save();
        }

          $user->userTest->ended_at = Carbon::now();
          $user->userTest->status = 2;
          $user->userTest->save();

         return redirect()->back();

    }

    /**
     * Display a listing of the PDF.
     *
     * @return PDF
     */
    public function generatePDF()

    {
        $users = User::where('type','<>','admin')->get();

        $pdf = new TCPDF();
        $pdf::SetTitle('Users Report');
        $pdf::AddPage();
        $pdf::writeHTML(view('quiz.pdf', ['users' => $users]), true, false, true, false, '');
        $pdf::Output('quiz_users.pdf');

    }
}
