<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;
use Validator;
use Auth;

class TeamController extends Controller
{
     public function __construct ()

    {

          $this->middleware('auth:admin');

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $teams = Team::all()->where( 'status' , '1' );

        return view('admin.teams.index')->withTeams($teams);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()
    {
        return view('admin.teams.create');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $customMessage = '';

        $validator = Validator::make($request->all(), [

            'name' => 'required',

            'slug' => 'required'

        ]);

        if ($validator->fails()) {

            $validator_ArrayCount = $validator->errors()->toArray();



            foreach ($validator_ArrayCount as $key => $value) {

                $customMessage .= $value[$key].'<br>';

            }



             session()->flash('error', $customMessage);

        }

        else{
                $team = new Team();
                $team->name = $request->name;
                $team->slug = $request->slug;
                $images=array();
                if($request->hasFile('image')) {
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $photoname = time().rand(11111,99999).'.'.$extension;
                    $request->file('image')->move(public_path() .'/team', $photoname);
                    $images['image']= $photoname;
                    $team->image = serialize( $images );
                }
                $team->designation = $request->designation;
                $team->description = $request->description;
                $team->fblink = $request->fblink;
                $team->glink = $request->glink;
                $team->twiterlink = $request->twiterlink;
                $team->linkedinlink = $request->linkedinlink;
                $team->status = 1;
                $res = $team->save();

                if($res)
                {

                    session()->flash('success', 'Team successfully created');

                    return redirect()->route('team.index');

                }

        }



    }



    /**

     * Display the specified resource.

     *

     * @param  \App\CoachingClasses  $CoachingClasses

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $team = Team::find($id);

        return view('admin.team.show')->withTeam($team);

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\CoachingClasses  $coachingtype

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $team = Team::find($id);

        return view('admin.teams.edit')->withTeam($team);

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\CoachingClasses  $coachingtype

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {
         $customMessage = '';



        $validator = Validator::make($request->all(), [

            'name' => 'required'

        ]);

        if ($validator->fails()) {

            $validator_ArrayCount = $validator->errors()->toArray();



            foreach ($validator_ArrayCount as $key => $value) {

                $customMessage .= $value[$key].'<br>';

            }



             session()->flash('error', $customMessage);

        }

        else

        {



            $team = Team::find($id);



            $team->name = $request->name;

            $team->slug = $request->slug;
            $images=array();
            if($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $photoname = time().rand(11111,99999).'.'.$extension;
                $request->file('image')->move(public_path() .'/team', $photoname);
                $images['image']= $photoname;
                $team->image = serialize( $images );
            }
            
            $team->status = 1;

            $res = $team->save();
            if($res)

            {

                session()->flash('success', 'Team successfully updated');

                return redirect()->route('team.index');

            }



        }

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\CoachingClasses  $CoachingClasses

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        Team::where('id', $id)->delete();

        session()->flash('success','Team was successfully deleted!!!');

        return redirect()->route('team.index');

    }
}
