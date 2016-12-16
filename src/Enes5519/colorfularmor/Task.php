<?php 

namespace Enes5519\colorfularmor;

use pocketmine\scheduler\PluginTask;
use pocketmine\item\Item;
use pocketmine\utils\Color;
use pocketmine\{Server, Player};

class Task extends PluginTask{
    
    public $i = 0;
    public function __construct($plugin){
        $this->p = $plugin;
        parent::__construct($plugin);
    }
    
    public function onRun($tick){
        $main = $this->p;
        foreach($main->getServer()->getOnlinePlayers() as $g){
            if(!empty($main->kullanan[$g->getName()])){
                $ba = Item::get(298);
                $zi = Item::get(299);
                $pa = Item::get(300);
                $ay = Item::get(301);
                $sa = $this->i;
                if($this->i == 0){
                    $ba->setCustomColor(Color::getDyeColor(0));
                    $zi->setCustomColor(Color::getDyeColor(0));
                    $pa->setCustomColor(Color::getDyeColor(0));
                    $ay->setCustomColor(Color::getDyeColor(0));
                    $this->i = 1;
                }elseif($this->i == 1){
                    $ba->setCustomColor(Color::getDyeColor(1));
                    $zi->setCustomColor(Color::getDyeColor(1));
                    $pa->setCustomColor(Color::getDyeColor(1));
                    $ay->setCustomColor(Color::getDyeColor(1));
                    $this->i = 2;
                }elseif($this->i == 2){
                    $ba->setCustomColor(Color::getDyeColor(2));
                    $zi->setCustomColor(Color::getDyeColor(2));
                    $pa->setCustomColor(Color::getDyeColor(2));
                    $ay->setCustomColor(Color::getDyeColor(2));
                    $this->i = 3;
                }elseif($this->i == 3){
                    $ba->setCustomColor(Color::getDyeColor(3));
                    $zi->setCustomColor(Color::getDyeColor(3));
                    $pa->setCustomColor(Color::getDyeColor(3));
                    $ay->setCustomColor(Color::getDyeColor(3));
                    $this->i = 4;
                }elseif($this->i == 4){
                    $ba->setCustomColor(Color::getDyeColor(4));
                    $zi->setCustomColor(Color::getDyeColor(4));
                    $pa->setCustomColor(Color::getDyeColor(4));
                    $ay->setCustomColor(Color::getDyeColor(4));
                    $this->i = 5;
                }elseif($this->i == 5){
                    $ba->setCustomColor(Color::getDyeColor(5));
                    $zi->setCustomColor(Color::getDyeColor(5));
                    $pa->setCustomColor(Color::getDyeColor(5));
                    $ay->setCustomColor(Color::getDyeColor(5));
                    $this->i = 6;
                }elseif($this->i == 6){
                    $ba->setCustomColor(Color::getDyeColor(6));
                    $zi->setCustomColor(Color::getDyeColor(6));
                    $pa->setCustomColor(Color::getDyeColor(6));
                    $ay->setCustomColor(Color::getDyeColor(6));
                    $this->i = 7;
                }elseif($this->i == 7){
                    $ba->setCustomColor(Color::getDyeColor(7));
                    $zi->setCustomColor(Color::getDyeColor(7));
                    $pa->setCustomColor(Color::getDyeColor(7));
                    $ay->setCustomColor(Color::getDyeColor(7));
                    $this->i = 8;
                }elseif($this->i == 8){
                    $ba->setCustomColor(Color::getDyeColor(8));
                    $zi->setCustomColor(Color::getDyeColor(8));
                    $pa->setCustomColor(Color::getDyeColor(8));
                    $ay->setCustomColor(Color::getDyeColor(8));
                    $this->i = 9;
                }elseif($this->i == 9){
                    $ba->setCustomColor(Color::getDyeColor(9));
                    $zi->setCustomColor(Color::getDyeColor(9));
                    $pa->setCustomColor(Color::getDyeColor(9));
                    $ay->setCustomColor(Color::getDyeColor(9));
                    $this->i = 10;
                }elseif($this->i == 10){
                    $ba->setCustomColor(Color::getDyeColor(10));
                    $zi->setCustomColor(Color::getDyeColor(10));
                    $pa->setCustomColor(Color::getDyeColor(10));
                    $ay->setCustomColor(Color::getDyeColor(10));
                    $this->i = 11;
                }elseif($this->i == 11){
                    $ba->setCustomColor(Color::getDyeColor(11));
                    $zi->setCustomColor(Color::getDyeColor(11));
                    $pa->setCustomColor(Color::getDyeColor(11));
                    $ay->setCustomColor(Color::getDyeColor(11));
                    $this->i = 12;
                }elseif($this->i == 12){
                    $ba->setCustomColor(Color::getDyeColor(12));
                    $zi->setCustomColor(Color::getDyeColor(12));
                    $pa->setCustomColor(Color::getDyeColor(12));
                    $ay->setCustomColor(Color::getDyeColor(12));
                    $this->i = 13;
                }elseif($this->i == 13){
                    $ba->setCustomColor(Color::getDyeColor(13));
                    $zi->setCustomColor(Color::getDyeColor(13));
                    $pa->setCustomColor(Color::getDyeColor(13));
                    $ay->setCustomColor(Color::getDyeColor(13));
                    $this->i = 14;
                }elseif($this->i == 14){
                    $ba->setCustomColor(Color::getDyeColor(14));
                    $zi->setCustomColor(Color::getDyeColor(14));
                    $pa->setCustomColor(Color::getDyeColor(14));
                    $ay->setCustomColor(Color::getDyeColor(14));
                    $this->i = 15;
                }elseif($this->i == 15){
                    $ba->setCustomColor(Color::getDyeColor(15));
                    $zi->setCustomColor(Color::getDyeColor(15));
                    $pa->setCustomColor(Color::getDyeColor(15));
                    $ay->setCustomColor(Color::getDyeColor(15));
                    $this->i = 0;
                }
                $g->getInventory()->setHelmet($ba);
                $g->getInventory()->setChestplate($zi);
                $g->getInventory()->setLeggings($pa);
                $g->getInventory()->setBoots($ay);
            }
        }
    }
}
