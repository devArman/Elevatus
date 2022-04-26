<?php

namespace App\Console\Commands;

use App\Services\Distance\Hamming;
use App\Services\Distance\Levenshtein;
use App\Services\DistanceService;
use Illuminate\Console\Command;

class DistanceCalculator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Distance:calculate {--algorithm=} {--string1=} {--string2=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'calculate Distance between 2 strings';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $string1 = $this->option('string1');
        if (empty($string1)){
            $this->error('string1 shouldn\'t be empty');
        }

        $string2 = $this->option('string2');
        if (empty($string2)){
            $this->error('string2 shouldn\'t be empty');
        }
        $algorithmObject = null;
        if ($this->option('algorithm') == 'levenshtein'){
            $algorithmObject = new Levenshtein();
        }elseif ($this->option('algorithm') == 'hamming'){
            $algorithmObject = new Hamming();
        }else{
            $this->error('Algorithm is wrong');
        }

        if (!$string2 || !$string1 || !$algorithmObject ){
            return 0;
        }
        $distance = (new DistanceService($algorithmObject))->data($string1,$string2)->distance();

        $this->info('Distance Calculated Successfully!');
        $this->info("algorithm : ".$algorithmObject::NAME);
        $this->info("string1 : {$string1}");
        $this->info("string2 : {$string2}");
        $this->info("Distance : {$distance}");

        return $distance;
    }
}
