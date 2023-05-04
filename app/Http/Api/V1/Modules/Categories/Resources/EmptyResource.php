<?php

namespace App\Http\Api\V1\Modules\Categories\Resources;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Http\Resources\Json\JsonResource;

class EmptyResource 
{
    public function _construct()
    {
        return response()->json(['success' => true]);
    }
}






//Jsonable
// {
//     /**
//      * Get the instance as an array.
//      *
//      * @param  \Illuminate\Http\Request|null  $request
//      * @return array
//      */
//     public function toArray($request = null)
//     {
//         return [];
//     }

//     /**
//      * Convert the object to its JSON representation.
//      *
//      * @param  \Illuminate\Http\Request|null  $request
//      * @param  int  $options
//      * @return \Illuminate\Http\JsonResponse
//      */
//     public function toJson($request = null, $options = 0)
//     {
//         return response()->json([]);
//     }
// }