<?php

namespace App\Models;

use App\Models\MembershipLevel;
use App\Classes\GeneologyManager;
use Illuminate\Database\Eloquent\Model;
use App\Events\MembershipLevelUpgraded;

class UserData extends Model
{
    private $children = null;

    private $isInit = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function memberLevel()
    {
        return MembershipLevel::where('level', '=', $this->membership_level)->first();
    }

    public function parent()
    {
        return static::where('ref_code', '=', $this->referrer_code)->first();
    }

    public function addPoints($points)
    {
        $oldPoints = $this->points;

        $newPoints = round($oldPoints + $points, 1);

        $this->points = $newPoints;

        $this->save();

        $this->refresh();

        //try to see if the person has reached the next membership level;

        $memberLevel = $this->membership_level;

        $oldLevel = MembershipLevel::where('level', '=', $memberLevel)->first();
        // $oldLevel  = $memberLevel;

        $memberLevels = MembershipLevel::all();

        //we start from the highest points and start check and coming down
        // to see if the user is greater than that level .
        foreach($memberLevels as $level)
        {
            if($oldLevel->level >= $level->level)
            {
                continue;
            }

            if($newPoints >= $level->points)
            {
                if($level->level > $memberLevel)
                {
                    //check that the person has enough users registered
                    if($this->checkTree($level->level))
                    {
                        //then update user membership
                        //this is a new level. it has to be updated;
                        $this->membership_level = $level->level;
                        $this->save();

                        $newLevel = MembershipLevel::where('level', '=', $level->level)->first();

                        event(new MembershipLevelUpgraded($this->user, $newLevel, $oldLevel));

                        break;
                    }

                }
            }
        }

    }

    private function checkTree($newLevel)
    {
        $user = $this->user;
        $user->refresh(); // make sure u are working with updated instance of the user

        $geneologyManager = new GeneologyManager($user);

        $tree = $geneologyManager->getGeneologyTree();

        $previousLevel = $newLevel - 1;

        //now check that
        if(!array_key_exists($newLevel, $geneologyManager->levelData))
        {
            //the key does not exist

            return false;
        }


        //now that the key exist
        //make sure there is at least one user there
        if( count($geneologyManager->levelData[$newLevel]) == 0 )
        {
            //the person has zero users on this level
            //so this person cannot upgrade
            return false;
        }

        //now check that the previous level is full
        //the previous level could be -1 if the user is at 0
        //so we assum he has one person in that position.
        if(array_key_exists($previousLevel, $geneologyManager->levelData))
        {
            $previousLevelUsers = count($geneologyManager->levelData[$previousLevel]);
        }
        else {
            $previousLevelUsers = 1;
        }

        //get the geneolog width;
        $geneologyWidth = \App\Models\GeneologyDepth::find(1)->width;

        $previousLevelTotal = pow($geneologyWidth, $previousLevel);

        if($previousLevelTotal != $previousLevelUsers)
        {
            return false;
        }

        //everything has pass so far so return true;
        return true;
    }

    public function recruiterName()
    {
        if($this->referrer_code == null)
        {
            return "No Body";
        }
        else {
            $recruiter = $this->where('ref_code', '=', $this->referrer_code)->first();
            return $recruiter->user->name;
        }
    }

    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }

    private function initChildren()
    {
        $result = $this->where('referrer_code', '=', $this->ref_code)->get();

        $this->isInit = true;

        $this->children = $result;
    }

    public function hasChildren()
    {
        $this->initChildren();
        $result = $this->children;

        if($result->count() == 0)
            return false;
        else {
            $this->children = $result;
            return true;
        }
    }

    public function getChildren()
    {
        if ($this->isInit) {
            return $this->children;
        }
        else {
            $this->initChildren();
            return $this->children;
        }
    }

    public function getChildrenCount()
    {
        if ($this->isInit) {
            if($this->children != null)
            {
                return $this->children->count();
            }
            else {
                return 0;
            }
        }

        else {
            $this->initChildren();

            if($this->children != null)
            {
                return $this->children->count();
            }
            else {
                return 0;
            }
        }
    }

}
