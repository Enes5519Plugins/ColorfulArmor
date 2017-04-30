<?php

namespace Enes5519\colorfularmor;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;

class ColorfulArmor extends PluginBase implements Listener{

    public $kullanan = array();
    private static $ins;

    public function __construct(){
        self::$ins = $this;
    }

    public function onEnable(){
        $this->getServer()->getCommandMap()->register("adminzirh", new Komut($this));
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getScheduler()->scheduleRepeatingTask(new Task($this), 20);
    }
    
    public function cikinca(PlayerQuitEvent $e){
        $o = $e->getPlayer();
        if(!empty($this->kullanan[$o->getName()])){
            unset($this->kullanan[$o->getName()]);
            $this->zirhsil($o);
        }
    }
    
    public function zirhsil(Player $g){
        $s = $g->getInventory()->getSize();
        $g->getInventory()->clear($s);
        $g->getInventory()->clear($s+1);
        $g->getInventory()->clear($s+2);
        $g->getInventory()->clear($s+3);
    }

    public static function getInstance(){
        return self::$ins;
    }
}