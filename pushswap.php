<?php

class PushSwap
{
    public $la;
    public $lb;

    public function __construct()
    {
        global $argv;
        global $argc;

        array_shift($argv);
        if(count($argv) > 1)
        {
            $this->la = $argv;
            $this->lb = [];
            if(count($argv) == 3)
            {
                $this->littlealgo();
                echo PHP_EOL;
            }
            elseif(count($argv) == 2)
            {
                $this->algoTwo();
                echo PHP_EOL;
            }
            else
            {
                $this->algo();
                echo PHP_EOL;
            }
        }
    }

    //Switch position with the two first elements of the array la
    public function sa()
    {
        global $argc;
        if($argc > 2)
        {
            $sa = $this->la[0];
            $this->la[0] = $this->la[1];
            $this->la[1] = $sa;
        }
        else
        {
        }
    }

    //Switch position with the two first elements of the array lb
    public function sb()
    {
        if($this->lb != [])
        {
            $sb = $this->lb[0];
            $this->lb[0] = $this->lb[1];
            $this->lb[1] = $sb;
        }
        else
        {
        }
    }

    //Both sa and sb
    public function sc()
    {
        $this->sa();
        $this->sb();
    }

    //Take the first element of lb and put in the first position of la
    public function pa()
    {
        if(!empty($this->lb))
        {
            $firstitem = array_shift($this->lb);
            array_unshift($this->la, $firstitem);
        }
        else
        {
        }
    }

    //Take the first element of la and put in the first position of lb
    public function pb()
    {
        $firstitem = array_shift($this->la);
        array_unshift($this->lb, $firstitem);
    }

    //Rotate la to the begin
    public function ra()
    {
        $first = array_shift($this->la);
        array_push($this->la, $first);
    }
    
    //Rotate lb to the begin
    public function rb()
    {
        $first = array_shift($this->lb);
        array_push($this->lb, $first);
    }

    //ra rb both time
    public function rr()
    {
        $this->ra();
        $this->rb();
    }

    //Rotate la to the end
    public function rra()
    {
        $last = array_pop($this->la);
        array_unshift($this->la, $last);
    }

    //Rotate lb to the end
    public function rrb()
    {
        $last = array_pop($this->lb);
        array_unshift($this->lb, $last);
    }

    //rra rrb both time
    public function rrr()
    {
        $this->rra();
        $this->rrb();
    }

    public function algo()
    {
        // var_dump($this->la);
        if($this->la !== [])
        {
            $max = max($this->la);
            while($this->la[0] != $max)
            {
                $this->rra();
                echo "rra ";
                
                // print_r($this->lb);
            }
            $this->pb();
            echo "pb ";
            $this->algo();
            $this->pa();
            echo "pa ";
            $this->ra();
            echo "ra ";
            
            // print_r($this->lb);
        }
    }

    public function littlealgo()
    {
        $max = max($this->la);
        $min = min($this->la);
        switch($this->la)
        {
            case($max === $this->la[2] && $min === $this->la[1]):
            $this->sa();
            echo "sa ";
            break;
            
            case($max === $this->la[0] && $min === $this->la[2]):
            $this->sa();
            echo "sa ";
            $this->rra();
            echo "rra ";
            break;

            case($max === $this->la[0] && $min === $this->la[1]):
            $this->ra();
            echo "ra ";
            break;
            
            case($min === $this->la[0] && $max === $this->la[1]):
            $this->sa();
            echo "sa ";
            $this->ra();
            echo "ra ";
            break;
            
            case ($min === $this->la[2] && $max === $this->la[1]):
            $this->rra();
            echo "rra ";
            break;

            case ($min === $this->la[0] && $max === $this->la[2]):
            break;
        }

    }

    public function algoTwo()
    {   
        $max = max($this->la);
        $min = min($this->la);
        if($max === $this->la[0] || $min === $this->la[1])
        {
            $this->sa();
            echo "sa";
        }
        else
        {
        }
    }
}
$push = new PushSwap;