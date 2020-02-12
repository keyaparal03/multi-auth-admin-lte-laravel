<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use Validator;
use Auth;

class BlogController extends Controller
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

        $blogs = Blog::all()->where( 'status' , '1' );

        return view('admin.blogs.index')->withBlogs($blogs);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('admin.blogs.create');



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
                $blog = new Blog();
                $blog->name = $request->name;
                $blog->slug = $request->slug;
                $images=array();
                if($request->hasFile('image')) {
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $photoname = time().rand(11111,99999).'.'.$extension;
                    $request->file('image')->move(public_path() .'/blog', $photoname);
                    $images['image']= $photoname;
                    $blog->image = serialize( $images );
                }
                $blog->video_url = '';
                $blog->description = $request->description;
                $blog->status = 1;
                $res = $blog->save();

                if($res)
                {

                    session()->flash('success', 'Blog successfully created');

                    return redirect()->route('blog.index');

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

        $blog = Blog::find($id);

        return view('admin.blogs.show')->withBlog($blog);

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\CoachingClasses  $coachingtype

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $blog = Blog::find($id);

        return view('admin.blogs.edit')->withBlog($blog);

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



            $blog = Blog::find($id);



            $blog->name = $request->name;

            $blog->slug = $request->slug;
            $images=array();
            if($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $photoname = time().rand(11111,99999).'.'.$extension;
                $request->file('image')->move(public_path() .'/blog', $photoname);
                $images['image']= $photoname;
                $blog->image = serialize( $images );
            }
            $blog->description = $request->description;
            $blog->status = 1;

            $res = $blog->save();
            if($res)

            {

                session()->flash('success', 'Blog successfully updated');

                return redirect()->route('blog.index');

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

        Blog::where('id', $id)->delete();

        session()->flash('success','Blog was successfully deleted!!!');

        return redirect()->route('blog.index');

    }
}
