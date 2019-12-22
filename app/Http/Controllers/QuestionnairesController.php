<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Questionnaire;
use App\Question;

use Auth;

class QuestionnairesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $questionnaires = Questionnaire::where('creator', $user)->orderBy('updated_at', 'dsc')->get();

        return view('admin.questionnaires.index')->with('questionnaires', $questionnaires);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questionnaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['creator'] = Auth::user()->id;
        $input['status'] = 0;

        Questionnaire::create($input);

        $questionnaire = Questionnaire::where('title', $input['title'])->get();

        return redirect('/admin/questionnaires/' . $questionnaire[0]['id'] . '/edit');
        //return $questionnaire;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/admin/questionnaires');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);
        $questions = Question::where('questionnaire', $id)->get();

        return view('admin.questionnaires.edit')->with('questionnaire', $questionnaire)->with('questions', $questions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $questionnaire = Questionnaire::findOrFail($id);
        $questionnaire->update($input);

        return redirect('/admin/questionnaires/' . $id . '/edit')->withSuccess('Questionnaire has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);

        $questionnaire->delete();

        return redirect('admin/questionnaires')->withSuccess('The questionnaire has been deleted.');
    }
}
