<?php
namespace App\Classes;

use App\Models\GeneologyDepth;

class GeneologyStatistics
{

    public $manager;
    public $depth;

    public function __construct($manager)
    {
        //initialise the manage with data
        $manager->getGeneologyTree();

        $this->manager = $manager;
        $this->initDepth();
    }

    private function initDepth()
    {
        $this->depth = GeneologyDepth::find(1)->depth;
    }

    public function directRecruitsCount()
    {
        if(empty($this->manager->levelData[1]))
        {
            return 0;
        }
        else {
            return count($this->manager->levelData[1]);
        }
    }

    public function getCommissionsCount()
    {
        return auth()->user()->commissions->count();
    }

    public function totalRecruitsCount()
    {
        $total = 0;

        for($i = 1; $i <= $this->depth; $i++)
        {
            if(array_key_exists($i, $this->manager->levelData))
                $total += count($this->manager->levelData[$i]);
        }

        return $total;
    }

    public function getLevelCount($level)
    {
        $data = $this->manager->levelData;

        if(empty($data[$level]))
        {
            return "0";
        }

        return count($data[$level]);
    }

    public function latestRecruits()
    {

        $ref = auth()->user()->userData->ref_code;

        $recruits = \App\Models\UserData::where('referrer_code', '=', $ref)
                            ->orderBy('id', 'desc')
                            ->limit(5)
                            ->get();

        return $recruits;
    }


}

?>
