<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use Illuminate\Http\Request;

class CoinController extends Controller
{

    public function daycoin(Request $request)
    {
        $coinRecord = Coin::firstOrCreate(['user_id' => $request->user()->id]);

        if ($coinRecord->daycoin) {
            return response()->json(['error' => 'Коин уже собран'], 400);
        }

        $coinRecord->update([
            'coin' => $coinRecord->coin + 1,
            'daycoin' => true
        ]);

        return response()->json(['success' => 'Коин добавлен'], 200);
    }


    public function gamecoin(Request $request)
    {
        return response()->json(['error' => 'Пока что на стадии реализации'], 400);

        // Должен принимать значение типо токена игры и проверять выдовался ли он вообще и был ли использован, если да то то отменять если нет то выдовать + и количество коинов от игры
        //Так же проверять сколько раз человек поиграл и выйграл в определенную игру в определенный периуд и мб заносить в скрытую таблицу чтобы понять не жулик ли он, например на выйгрош каконибуть игры даётся минимум минута
        //
    }


    public function showcoin(Request $request)
    {
        $coinRecord = Coin::firstOrCreate(['user_id' => $request->user()->id]);

        return response()->json(['succes' => $coinRecord->coin], 200);
    }
}
