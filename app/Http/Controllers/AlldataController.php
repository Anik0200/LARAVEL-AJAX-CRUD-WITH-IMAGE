<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AlldataController extends Controller
{
    public function index()
    {
        $allData = Data::latest()->paginate(5);
        return view('index', compact('allData'));
    }

    public function createData(Request $request)
    {
        $request->validate(
            [
                'name'  => "required|max:20",
                'desc'  => "required|max:30",
                'image' => "required|mimes:png,jpg",
            ],
            [
                'name'  => "Name Is Required",
                'desc'  => "Description Is Required",
                'image' => "Iameg Is Required",
            ]
        );

        if ($request->hasFile('image')) {
            $img     = $request->file('image');
            $imgName = time() . '.' . $img->extension();
            $img->storeAs('images', $imgName, 'public');

            Data::create([
                'name'  => $request->name,
                'desc'  => $request->desc,
                'image' => $imgName,
            ]);

            return response()->json([
                'sts' => 200,
                'msg' => 'Data Created!',
            ]);
        } else {

            return response()->json([
                'sts' => 400,
                'msg' => 'Something Wrong',
            ]);
        }
        //====================================
    }

    public function upData(Request $request)
    {
        $data = Data::find($request->id);

        return response()->json([
            'sts'  => 200,
            'data' => $data,
        ]);
    }

    public function update(Request $request)
    {

        $request->validate(
            [
                'upName'  => 'required|max:20',
                'upDesc'  => 'required|max:30',
                'upImage' => 'mimes:png,jpg',
            ],
            [
                'upName'  => "Name Is Required",
                'upDesc'  => "Description Is Required",
                'upImage' => "Chose Valid Iamage",
            ]
        );

        $data    = Data::find($request->upId);
        $imgPath = public_path('storage/images/' . $data->image);

        if ($request->hasFile('upImage')) {
            $imgDel     = File::delete($imgPath);
            $newImg     = $request->file('upImage');
            $newImgName = time() . '.' . $newImg->extension();
            $newImg->storeAs('images', $newImgName, 'public');
        } else {

            $newImgName = $data->image;
        };

        $data->update([
            'name'  => $request->upName,
            'desc'  => $request->upDesc,
            'image' => $newImgName,
        ]);

        return response()->json([
            'sts' => 200,
            'msg' => 'Data Updated!',
        ]);

    }

    public function delete(Request $request)
    {
        $data    = Data::find($request->id);
        $imgPath = public_path('storage/images/' . $data->image);

        if ($data || File::exists($imgPath)) {

            File::delete($imgPath);
            $data->delete();

            return response()->json([
                'sts' => 200,
                'msg' => 'Data Deleted!',
            ]);
        } else {

            return response()->json([
                'sts' => 200,
                'msg' => 'Something Wrong!',
            ]);
        }
    }

    public function pagination()
    {
        $allData = Data::latest()->paginate(5);
        return view('paginate', compact('allData'))->render();
    }

    public function searchData(Request $request)
    {

        $allData = Data::where('name', 'LIKE', '%' . $request->string . '%')
            ->orWhere('id', 'LIKE', '%' . $request->string . '%')
            ->paginate(5);

        if ($allData->count() >= 1) {

            return view('paginate', compact('allData'))->render();
        } else {

            return response()->json([
                'sts' => 400,
                'msg' => "No Data Fond!",
            ]);
        }

    }
}
