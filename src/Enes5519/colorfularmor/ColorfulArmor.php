<?php

namespace Enes5519\colorfularmor;

use pocketmine\plugin\PluginBase;
use pocketmine\{Player, Server};
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use Enes5519\colorfularmor\Task;
use Enes5519\colorfularmor\Komut;

class ColorfulArmor extends PluginBase implements Listener{

    public $kullanan = array();
    public function onEnable(){
        $this->getServer()->getCommandMap()->register("adminzirh", new Komut($this));
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getScheduler()->scheduleRepeatingTask(new Task($this), 20);
    }
    
    public function cikinca(PlayerQuitEvent $e){
        $o = $e->getPlayer();
        if(!empty($this->kullanan[$o->getName()])){
            unset($this->kullanan[$g->getName()]);
            $this->zirhsil($o);
        }
    }
    
    public function zirhsil($g){
        $s = $g->getInventory()->getSize();
        $g->getInventory()->clear($s);
        $g->getInventory()->clear($s+1);
        $g->getInventory()->clear($s+2);
        $g->getInventory()->clear($s+3);
    }
}