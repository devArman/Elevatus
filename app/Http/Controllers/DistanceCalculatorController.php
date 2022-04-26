<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistanceCalculateRequest;
use App\Services\Distance\Hamming;
use App\Services\Distance\Levenshtein;
use App\Services\DistanceService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DistanceCalculatorController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('welcome');
    }

    /**
     * @param DistanceCalculateRequest $request
     * @throws Exception
     */
    public function calculate(DistanceCalculateRequest $request){
        $data = $request->all();
        if ($data['method'] == 'levenshtein'){
            $algorithmObject = new Levenshtein();
        }elseif ($data['method'] == 'hamming'){
            $algorithmObject = new Hamming();
        }else{
            throw new Exception('Method now allowed');
        }

        $distance = (new DistanceService($algorithmObject))->data($data['string1'],$data['string2'])->distance();

        dump('Distance Calculated Successfully!');
        dump("algorithm : ".$algorithmObject::NAME);
        dump("string1 : {$data['string1']}");
        dump("string2 : {$data['string2']}");
        dump("Distance : {$distance}");

    }
}
