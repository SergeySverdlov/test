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
     private $order = null;
     private $user = null;
     private $resultPrice = 0;
    public function starter(Request $request){
        try {
            DB::transaction(function() use ($request) {
                $this->user = User::find($request->userId);
                $this->order = Order::create([
                    'user_id' => $this->user->id,
                ]);
                foreach ($request->goods as $element) {
                    $product = Good::find($element['id']);
                    if ($product->count < $element['count']){
                        throw new \Exception('Не достаточно товара на складе!');
                    }
                    $product->update(['count' => $product->count - $element['count']]);
                    $this->resultPrice += $element['count'] * $product->price;
                    SoldPosition::create([
                        'user_id' => $this->user->id,
                        'goods_id' => $product->id,
                        'order_id' => $this->order->id,
                        'price' => $product->price,
                        'count' => $element['count'],
                    ]);
                }
                $this->order->update(['resultPrice' => $this->resultPrice]);
            });
            if (Order::find($this->order->id)){
                $this->user->userSendServices($this->resultPrice/100);
                return response()->json(['message' => 'Заказ оформлен, вам будет отправленно сообщение по контактным данным!'], JsonResponse::HTTP_OK);
            }
            return response()->json(['message' => 'Что-то пошло не так, попробуйте позже.'], JsonResponse::HTTP_NOT_ACCEPTABLE);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], JsonResponse::HTTP_NOT_ACCEPTABLE);
        }
    }
    static function checkHasItems($element){
        $product = Good::find($element['id']);
        return $product->count < $element['count'];
    }

}
