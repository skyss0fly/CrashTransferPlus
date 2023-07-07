<?php

namespace skyss0fly\CrashTransferPlus;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class main extends PluginBase {
public function onLoad {
  $this->saveDefaultConfig();
  $config = $this->getConfig();
}
public function onDisable($delay) {
  while ($delay > 0) {
  $ip = $this->getConfig("IP");
  $port = $this->getConfig("Port");
  $delay = $this->getConfig("Delay");
  $this->getLogger("transferring all cureent players to" . $ip . $port . "in " . $delay . " seconds!");
 foreach($this->getServer()->getOnlinePlayers() as $player) {
   $player->sendMessage("The Server will reboot in " . $ip . " seconds! you will be transferred to " . $ip . $port);
 }
   $player->transfer($ip);
}

// Example usage
$delay = 10; // Replace with your desired delay in seconds
countdown_timer($delay);

 
}//* this is the main final bracket
