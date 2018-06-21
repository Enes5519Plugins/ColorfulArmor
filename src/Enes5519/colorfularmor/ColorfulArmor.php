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

namespace Enes5519\colorfularmor;

use Enes5519\colorfularmor\command\CFACommand;
use Enes5519\colorfularmor\task\ArmorTask;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class ColorfulArmor extends PluginBase implements Listener{
	public const PREFIX = TextFormat::YELLOW . "CFA " . TextFormat::DARK_GRAY . "» " . TextFormat::GRAY;

	public const TASK_PERIOD = 1;

	/** @var ColorfulArmor */
	private static $api;

	/** @var Player[] */
	protected $players = [];

	public static function getAPI() : ColorfulArmor{
		return self::$api;
	}

	public function onLoad(){
		self::$api = $this;
	}

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getCommandMap()->register("colorfularmor", new CFACommand());
		$this->getScheduler()->scheduleRepeatingTask(new ArmorTask($this), self::TASK_PERIOD);
	}

	public function onDisable(){
		foreach($this->players as $player){
			$player->getArmorInventory()->clearAll();
		}
	}

	public function isUseColorfulArmor(string $name){
		return isset($this->players[strtolower($name)]);
	}

	public function removeColorfulArmor(Player $player, bool $message = true, bool $force = false) : bool{
		$name = $player->getName();

		if($force or $this->isUseColorfulArmor($name)){
			unset($this->players[$name]);
			$player->getArmorInventory()->clearAll();

			if($message){
				$player->sendMessage(self::PREFIX . TextFormat::RED . "Your colorful armor was removed!");
			}

			return true;
		}

		return false;
	}

	public function addColorfulArmor(Player $player, bool $message = true, bool $force = false) : bool{
		$name = strtolower($player->getName());

		if($force or !$this->isUseColorfulArmor($name)){
			$this->players[$name] = $player;

			if($message){
				$player->sendMessage(self::PREFIX . TextFormat::GREEN . "Colorful armor enabled.");
			}

			return true;
		}

		return false;
	}

	public function getPlayers() : array{
		return $this->players;
	}

	public function onQuit(PlayerQuitEvent $event){
		$this->removeColorfulArmor($event->getPlayer(), false);
	}

	public function onDeath(PlayerDeathEvent $event){
		$player = $event->getPlayer();
		$useArmor = $this->removeColorfulArmor($player);

		if($useArmor){
			$event->setDrops($player->getDrops());
		}
	}
}