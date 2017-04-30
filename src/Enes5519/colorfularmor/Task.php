<?php 

namespace Enes5519\colorfularmor;

use pocketmine\item\Armor;
use pocketmine\scheduler\PluginTask;
use pocketmine\item\Item;
use pocketmine\utils\Color;

class Task extends PluginTask{
    
    public $i = 0;
    private $p;
    public function __construct($plugin){
        $this->p = ColorfulArmor::getInstance();
        parent::__construct($plugin);
    }
    
    public function onRun($tick){
        $main = $this->p;
        foreach($main->getServer()->getOnlinePlayers() as $g){
            if(!empty($main->kullanan[$g->getName()])){
                $ba = Item::get(Item::LEATHER_CAP);
                $zi = Item::get(Item::LEATHER_TUNIC);
                $pa = Item::get(Item::LEATHER_PANTS);
                $ay = Item::get(Item::LEATHER_BOOTS);
                if($ba instanceof Armor && $zi instanceof Armor && $pa instanceof Armor && $ay instanceof Armor){
                    $ba->setCustomColor(Color::getDyeColor($this->i));
                    $zi->setCustomColor(Color::getDyeColor($this->i));
                    $pa->setCustomColor(Color::getDyeColor($this->i));
                    $ay->setCustomColor(Color::getDyeColor($this->i));
                }
                if($this->i == 15){
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
