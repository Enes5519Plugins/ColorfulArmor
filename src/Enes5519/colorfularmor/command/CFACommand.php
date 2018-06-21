<?php

/*
 *    ______              ______           _
 *    | ___ \             |  _  \         | |
 *    | |_/ /___  ___  ___| | | |_   _ ___| |_
 *    |    // _ \/ __|/ _ \ | | | | | / __| __|
 *    | |\ \ (_) \__ \  __/ |/ /| |_| \__ \ |_
 *    \_| \_\___/|___/\___|___/  \__,_|___/\__|
 *
 *
 */

declare(strict_types=1);

namespace Enes5519\colorfularmor\command;

use Enes5519\colorfularmor\ColorfulArmor;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class CFACommand extends Command{

	public function __construct(){
		parent::__construct("cfa", "Colorful Armor enable or disable", "/cfa", []);

		$this->setPermission("enes5519.colorfularmor");
		if(Server::getInstance()->getName() == "Altay"){
			$this->setOverloads([]);
		}
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){
		if(!($sender instanceof Player) or !$this->testPermission($sender)){
			return true;
		}

		$api = ColorfulArmor::getAPI();
		$useArmor = $api->isUseColorfulArmor($sender->getName());

		if($useArmor){
			$api->removeColorfulArmor($sender, true, true);
		}else{
			if(count($sender->getArmorInventory()->getContents(false)) !== 0){
				$sender->sendMessage(ColorfulArmor::PREFIX . TextFormat::RED . "You must have empty armor slots in order to use rainbow armor.");
				return true;
			}

			$api->addColorfulArmor($sender);
		}

		return true;
	}
}