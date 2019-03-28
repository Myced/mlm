<?php

namespace App\Models;

use App\Models\MembershipLevel;
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
        return \App\Models\MembershipLevel::where('level', '=', $this->membership_level)->first();
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

        //try to see if the person has reached the next membership level;

        $memberLevel = $this->membership_level;

        $oldLevel = $memberLevel;

        $memberLevels = array_reverse(MembershipLevel::all()->toArray());

        //we start from the highest points and start check and coming down
        // to see if the user is greater than that level .
        foreach($memberLevels as $level)
        {
            if($newPoints >= $level['points'])
            {
                if($level['level'] > $memberLevel)
                {
                    //this is a new level. it has to be updated;
                    $this->membership_level = $level['level'];
                    $this->save();

                    $newLevel = MembershipLevel::where('level', '=', $level['level'])->first();

                    event(new MembershipLevelUpgraded($this->user, $newLevel, $oldLevel));

                    break;
                }
            }
        }

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
