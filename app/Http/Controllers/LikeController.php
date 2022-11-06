<?php

namespace App\Http\Controllers;

use App\Models\LikeModel;
use Illuminate\Http\Request;

class LikeController extends Controller {

    /**
     * Display the specified resource.
     *
     * @param  int  $articleid
     * @return \Illuminate\Http\JsonResponse
     */
    public function showlike($articleid) {

        $data = LikeModel::with('artical')->where('articleid', $articleid)->get();
        $data = collect($data->toArray());

        $data->transform(function ($item) {
                $newitem = [];
                $newitem['id'] = $item['id'];
                $newitem['artical'] = $item['artical']['title'];
                $newitem['userid'] = $item['userid'];

                return $newitem;
            }
        );

        return response()->json($data, '200');

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function putlike(Request $request) {

        $like = LikeModel::firstOrNew(['articleid' => $request->get('articleid'), 'userid' => $request->get('userid')]);

        if ($like->exists) {
            $like->delete();
            return response()->json('Лайк отменён', '200');
        } else {
            $like->save();
        }

        return response()->json('Поставлен лайк', '200');
    }
}
