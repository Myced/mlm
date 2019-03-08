<?php
namespace App\Classes;

use App\User;
use App\Models\UserData;


class GeneologyManager
{
    protected $user;

    protected $depth = 5;

    protected $count = 2;

    private $tree = [];

    public $levelData = [];


    function __construct($user)
    {
        $this->user = $user;
    }

    public function getGeneologyTree()
    {
        $this->addParent();

        //add level 0 user
        //no need to add the root user
        // $this->levelData[0] = [];
        //
        // array_push($this->levelData[0], $this->user->userData);

        $parentId = 1;
        $level = 0;

        if($this->user->userData->hasChildren())
        {
            $userData = $this->user->userData;

            $this->addChildren($userData, $level, $parentId);
        }

        return $this->tree;
    }

    private function addChildren($userData, $level, $parentId)
    {

        if($userData->hasChildren())
        {
            //cycle through children and then add them

            $level++;
            foreach($userData->getChildren() as $child)
            {
                $this->putData($parentId, $child);

                //push the data
                if(!array_key_exists($level, $this->levelData))
                {
                    $this->levelData[$level] = [];
                }
                array_push($this->levelData[$level], $child);

                $newparentId = $this->count - 1;

                //if the level is 5, then do not check for children
                if($level <= $this->depth - 1)
                {
                    if($child->hasChildren())
                        $this->addChildren($child, $level, $newparentId);
                }

            }
        }
        else {
            //has no children
            //just put its data
            $this->putData( $parentId, $userData);

            //push the data
            if(!array_key_exists($level, $this->levelData))
            {
                $this->levelData[$level] = [];
            }
            array_push($this->levelData[$level], $userData);

        }
    }

    private function putData($parentId, $child)
    {
        $node = [
            'id'        => $this->count,
            'parentId'  => $parentId,
            'name'      => $child->first_name . ' ' . $child->last_name,
            'joined'    => $this->joined($child->created_at),
            'image'     => $child->avatar
        ];

        $this->count++;

        array_push($this->tree, $node);
    }

    private function addParent()
    {
        $parent = [
            'id'        => 1,
            'parentId'  => null,
            'name'      => $this->user->name,
            'joined'    => $this->joined($this->user->created_at),
            'image'     => $this->user->userData->avatar
        ];

        array_push($this->tree, $parent);
    }

    private function joined($date)
    {
        $date->setToStringFormat('j M, Y');
        $formatted = $date->__toString();

        return "Joined: " . $formatted;
    }
}

?>
