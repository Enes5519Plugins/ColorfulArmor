<?php

namespace Enes5519\colorfularmor;

use pocketmine\command\{CommandSender, Command};
use pocketmine\{Player, Server};

class Komut extends Command{

    public function __construct($plugin){
        $this->p = $plugin;
        parent::__construct("colorfularmor", "ColorfulArmor by Enes5519");
    }
    
    public function execute(CommandSender $g, $label, array $args){
        $main = $this->p;
        if($g instanceof Player){
            if($g->hasPermission("enes5519.colorfularmor")){
                if(empty($main->kullanan[$g->getName()])){
                    $main->kullanan[$g->getName()] = "Aktif";
                    $g->sendMessage("§8» §aColorfulArmor enabled!");
                }else{
                    unset($main->kullanan[$g->getName()]);
                    $this->zirhsil($g);
                    $g->sendMessage("§8» §cColorfulArmor disabled!");
                }
            }else{
                $g->sendMessage("§8» §cNo permission!");
            }
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