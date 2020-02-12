<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Cms;
use Auth;

class CmsController extends Controller
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
        
        $cms = Cms::all()->where( 'status' , '1' );
        return view('admin.cms.index')->withCms($cms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.cms.create');
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
        'title' => 'required',
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
            $cms = new Cms();
            $cms->title = $request->title;
            $cms->slug = ($request->slug)? $request->slug :'';
            $cms->description1 = ($request->description1)? $request->description1 :'';
            $cms->description2 = ($request->description2)?$request->description2:'';
            $images1=array();
            if($request->hasFile('image1')) {        
                $extension = $request->file('image1')->getClientOriginalExtension();
                $photoname = time().rand(11111,99999).'.'.$extension;
                $request->file('image1')->move(public_path() .'/logo', $photoname);
                $images1['image1']= $photoname;
            }
            $images2=array();
            if($request->hasFile('image2')) {        
                $extension = $request->file('image2')->getClientOriginalExtension();
                $photoname = time().rand(11111,99999).'.'.$extension;
                $request->file('image2')->move(public_path() .'/logo', $photoname);
                $images2['image2']= $photoname;
            }
            $cms->image1 = serialize( $images1 );
            $cms->image2 = serialize( $images2 );
            $cms->meta_title = ($request->meta_title) ? $request->meta_title : '';
            $cms->meta_tags  = ($request->meta_tags) ? $request->meta_tags : '';
            $cms->meta_details = ($request->meta_details) ? $request->meta_details : '';
            $cms->status = 1;
            $res = $cms->save();
             
            if($res)
            {
                session()->flash('success', 'Page successfully created');
                return redirect()->route('cms.index');
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
        
        $course = Cms::find($id);
        return view('admin.cms.index')->withCms($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CoachingClasses  $coachingtype
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $cms = Cms::find($id);
        return view('admin.cms.edit')->withCms($cms);
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
        'title' => 'required',
        'slug' => 'required'
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
            
            $cms = Cms::find($id);        
            $cms->title = $request->title;
            $cms->slug = ($request->slug)? $request->slug :'';
            $cms->description1 = ($request->description1)? $request->description1 :'';
            $cms->description2 = ($request->description2)?$request->description2:'';
            $images1=array();
            if($request->hasFile('image1')) {        
                $extension = $request->file('image1')->getClientOriginalExtension();
                $photoname = time().rand(11111,99999).'.'.$extension;
                $request->file('image1')->move(public_path() .'/logo', $photoname);
                $images1['image1']= $photoname;
                $cms->image1 = serialize( $images1 );
            }
            $images2=array();
            if($request->hasFile('image2')) {        
                $extension = $request->file('image2')->getClientOriginalExtension();
                $photoname = time().rand(11111,99999).'.'.$extension;
                $request->file('image2')->move(public_path() .'/logo', $photoname);
                $images2['image2']= $photoname;
                $cms->image2 = serialize( $images2 );
            }
           
            
            
            $cms->meta_title = ($request->meta_title) ? $request->meta_title : '';
            $cms->meta_tags  = ($request->meta_tags) ? $request->meta_tags : '';
            $cms->meta_details = ($request->meta_details) ? $request->meta_details : '';
           
            $cms->status = 1;
            $res = $cms->save();

            if($res)
            {
                session()->flash('success', 'Page successfully updated');
                return redirect()->route('cms.index');
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
       
        Cms::where('id', $id)->delete();
        session()->flash('success','Page was successfully deleted!!!');
        return redirect()->route('cms.index');
    }
}
