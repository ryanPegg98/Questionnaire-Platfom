<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Questionnaire;
use App\Question;
use App\Option;
use App\Scale;

class QuestionsController extends Controller
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
        //private
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createQuestion($questionnaire)
    {
        return view('admin.questions.create')->with('questionnaire', $questionnaire);
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

        if($input['type'] > 2){
            if(!isset($input['layout'])){
                return view('admin.questions.createRefine')->with('data', $input);
            }
        }

        //Question::create($input);

        $question = Question::create($input);

        if($input['type'] > 2){
            if($input['type'] == 4){
                //create the scale that should be used.
                $scaleData = [
                    'question' => $question->id,
                    'startDetail' => 'Start',
                    'start' => 0,
                    'endDetail' => 'End',
                    'end' => 6
                ];
                Scale::create($scaleData);
            }
            return redirect('/admin/questions/' . $question->id . '/edit');
        } else {
            return redirect('/admin/questionnaires/' . $input['questionnaire'] . '/edit')->withSuccess('"' . $question->question . '" has been created!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);

        // if the type is an option return a list of options to the user
        if($question['type'] == 3){
            //get all of the options that belong to it
            $options = Option::where('question', $id)->get();
            $question['options'] = $options;
        } else if($question['type'] == 4){
            $scale = Scale::where('question', $id)->first();
            $question['scale'] = $scale;
        }

        return view('admin.questions.edit')->with('question', $question);
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
        $question = Question::findOrFail($id);

        $input = $request->all();

        $question->update($input);

        return redirect('/admin/questionnaires/' . $input['questionnaire'] . '/edit')->withSuccess('Changes have been saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
