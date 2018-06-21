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

namespace Enes5519\colorfularmor\task;

use Enes5519\colorfularmor\ColorfulArmor;
use pocketmine\item\Armor;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\Player;
use pocketmine\scheduler\Task;
use pocketmine\utils\Color;

class ArmorTask extends Task{

	/** @var ColorfulArmor */
	private $api;

	/** @var Armor[] */
	private $armors;
	/** @var int */
	protected $step = 0;
	/** @var Color */
	protected $color;

	public function __construct(ColorfulArmor $api){
		$this->api = $api;

		$this->armors = [
			ItemFactory::get(Item::LEATHER_CAP),
			ItemFactory::get(Item::LEATHER_TUNIC),
			ItemFactory::get(Item::LEATHER_LEGGINGS),
			ItemFactory::get(Item::LEATHER_BOOTS)
		];

		$this->color = new Color(255, 0, 0);
	}

	public function onRun(int $currentTick){
		$players = $this->api->getPlayers();

		$this->updateColor();
		$armors = array_map(function(Armor $armor) : Armor{
			$armor->setCustomColor($this->color);
			return $armor;
		}, $this->armors);

		/** @var Player $player */
		foreach($players as $player){
			$player->getArmorInventory()->setContents($armors);
		}
	}

	protected function updateColor() : void{
		$step = $this->step++;
		if($step <= 16){
			$this->color->setG($step * 15);
		}elseif($step <= 32){
			$this->color->setR(255 - 15 * $step);
		}elseif($step <= 48){
			$this->color->setB($step * 15);
		}elseif($step <= 64){
			$this->color->setG(255 - 15 * $step);
		}elseif($step <= 80){
			$this->color->setR($step * 15);
		}elseif($step <= 96){
			$this->color->setB(255 - 15 * $step);
		}else{
			$this->step = 0;
		}
	}

}