<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    private $children = null;

    private $isInit = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    private function getGeneologyTree()
    {

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
