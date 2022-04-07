<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function getAllLists(){
        $lists = Log::get()->toJson(JSON_PRETTY_PRINT);
        return response($lists, 200);
    }

    public function getList($id){
        if(Log::where('id', $id)->exists()) {
            $list = Log::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($list, 200);
        } else {
            return response()->json([
                "message" => "List not found"
            ], 404);
        }
    }

    public function createList(Request $request){
        $list = new Log();
        $list->user_id = $request->user_id;
        $list->title = $request->title;
        $list->save();

        return response()->json([
            "message" => "List record has been created"
        ], 200);
    }

    public function updateList(Request $request, $id){
        if(Log::where('id', $id)->exists()) {
            $list = Log::find($id);
            $list->user_id = is_null($request->user_id) ? $list->user_id : $request->user_id;
            $list->title = is_null($request->title) ? $list->title : $request->title;
            $list->save();

            return response()->json([
                "message" => "List records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "List not found"
            ], 404);
        }
    }

    public function deleteList($id){
        if(Log::where('id', $id)->exists()) {
            $list = Log::find($id);
            $list->delete();

            return response()->json([
                "message" => "List deleted"
            ]);
        } else {
            return response()->json([
                "message" => "List not found"
            ], 404);
        }
    }
}
