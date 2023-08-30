<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\Controller;
use App\Http\Requests\BuyGoodsRequest;
use App\Models\Good;
use App\Services\BuyLogicServices;
use Illuminate\Http\JsonResponse;


class GoodsController extends Controller
{

    public function getGoods(){
        return response()->json(Good::paginate(100), JsonResponse::HTTP_OK);
    }
    public function butGoods(BuyGoodsRequest $request)
    {
        $data = new BuyLogicServices();
        $response = $data->starter($request);
        return $response;
    }
}
