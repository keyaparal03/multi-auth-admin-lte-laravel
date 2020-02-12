<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Category;
use App\UserCategory;
use Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller

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

        $users = User::all()->where( 'type' , '1' );

        return view('admin.vendors.index')->withusers($users);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {
        $categories = Category::all()->where( 'status' , '1' );
        return view('admin.vendors.create')->withCategories($categories);

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {


        // print_r($request->category);
        // die;
          $customMessage = '';

        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required',
            'password' => 'required'

        ]);

        if ($validator->fails()) {

            $validator_ArrayCount = $validator->errors()->toArray();



            foreach ($validator_ArrayCount as $key => $value) {

                $customMessage .= $value[$key].'<br>';

            }



             session()->flash('error', $customMessage);

        }

        else{
                $user = new user();



                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->dob = $request->dob;
                $user->address = $request->address;
                $user->city = $request->city;
                $user->state = $request->state;
                $user->country = $request->country;
                $user->dob = $request->dob;
                $user->pincode = $request->pincode;
                $user->phoneno = $request->phoneno;
                $user->blood_group = $request->blood_group;
                $user->about = $request->about;

                $profileimages=array();
                if($request->hasFile('profileimage')) {
                    $extension = $request->file('profileimage')->getClientOriginalExtension();
                    $photoname = time().rand(11111,99999).'.'.$extension;
                    $request->file('profileimage')->move(public_path() .'/profileimage', $photoname);
                    $profileimages['image']= $photoname;
                }

                $user->profileimage = serialize( $profileimages );

                $resume=array();
                if($request->hasFile('resume')) {
                    $extension = $request->file('resume')->getClientOriginalExtension();
                    $photoname = time().rand(11111,99999).'.'.$extension;
                    $request->file('resume')->move(public_path() .'/resume', $photoname);
                    $resume['file']= $photoname;
                }

                $user->resume = serialize( $resume );
                $user->type = 1;
                $user->status = 1;

                $res = $user->save();

                $user_id=$user->id;
                foreach( $request->category as $cat )
                {

                    $usercategory = new UserCategory();
                    $usercategory->user_id =  $user_id;
                    $usercategory->category_id = $cat;
                    $usercategory->status = 1;
                    $usercategory->save();

                }

            if($res)

            {

                session()->flash('success', 'Vendor successfully created');

                return redirect()->route('vendors.index');

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

        $user = user::find($id);

        return view('admin.vendors.show')->withuser($user);

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\CoachingClasses  $coachingtype

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $vendors = User::find($id);

        return view('admin.vendors.edit')->withvendors($vendors);

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



            $user = User::find($id);



            $user->name = $user->name;

            $user->slug = $request->slug;

            $user->status = 1;

            $res = $user->save();

            if($res)

            {

                session()->flash('success', 'User successfully updated');

                return redirect()->route('vendors.index');

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

        User::where('id', $id)->delete();

        session()->flash('success','User was successfully deleted!!!');

        return redirect()->route('vendors.index');

    }
    //Normal users
    public function get_users()

    {

        $users = User::all()->where( 'type' , '0' );

        return view('admin.users.index')->withusers($users);

    }

}

