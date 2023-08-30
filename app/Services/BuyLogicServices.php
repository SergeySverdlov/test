<?php

namespace App\Services;

use App\Models\Good;
use App\Models\Order;
use App\Models\SoldPosition;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyLogicServices
{
    public function starter(Request $request){
        try {
            DB::transaction(function() use ($request) {
                $user = User::find($request->userId);
                $order = Order::create([
                    'user_id' => $user->id,
                ]);
                $resultPrice = 0;
                foreach ($request->goods as $element) {
                    $product = Good::find($element['id']);
                    if ($product->count < $element['count']){
                        throw new \Exception('Не достаточно товара на складе!');
                    }
                    $product->update(['count' => $product->count - $element['count']]);
                    $resultPrice += $element['count'] * $product->price;
                    SoldPosition::create([
                        'user_id' => $user->id,
                        'goods_id' => $product->id,
                        'order_id' => $order->id,
                        'price' => $product->price,
                        'count' => $element['count'],
                    ]);
                }
                $order->update(['resultPrice' => $resultPrice]);
                $user->emailSend($resultPrice/100);
            });
            return response()->json(['message' => 'Заказ оформлен, вам будет отправленно сообщение по контактным данным!'], JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], JsonResponse::HTTP_NOT_ACCEPTABLE);
        }
    }
    static function checkHasItems($element){
        $product = Good::find($element['id']);
        return $product->count < $element['count'];
    }

}
