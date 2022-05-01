<?php

namespace App\Http\Controllers;

use App\Models\Userdata;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index() {
        $AllData= Userdata::all()->toArray();
        return array_reverse($AllData);
    }

    public function upload(Request $request) {
    
        $data  = new Userdata();
        $data->title = $request->title;
        $data->description = $request->description;
        $imageName = time().'.'.$request->picture->extension();  
        $request->picture->storeAs('public/image', $imageName);
        $data->picture = $imageName;
        $data->hobby = implode(",",$request->hobby);
        $data->gender = $request->gender;
        $data->save();
    }

    public function edit($id)
    {
        $formFields = Userdata::find($id);
        $arr = explode(',', $formFields->hobby);
        return response()->json(["formFields"=>$formFields,"arr"=>$arr]);
    }
    public function delete($id)
    {
        $formFields = Userdata::find($id);
        $formFields->delete();
        return response()->json('data successfully deleted');
    }
    public function update(Request $request)
    {
        dd($request->hobby);
        $data = Userdata::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        if($request->picture==null) {
            $imageName = time().'.'.$request->picture->extension();  
            $request->picture->storeAs('public/image', $imageName);
            $data->picture = $imageName;
        }
        $data->hobby = implode(",",$request->hobby);
        $data->gender = $request->gender;
        $data->save();
        return response()->json('data successfully updated');
    }
}
