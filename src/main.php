<?php

namespace skyss0fly/CrashTransferPlus;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;

class main extends PluginBase {
public function onLoad {
  $this->saveDefaultConfig();
  $config = $this->getConfig();
}
public function onDisable {
  $ip = $this->getConfig("IP");
  $port = $this->getConfig("Port");
  $delay = $this->getConfig("Delay");
  $this->getLogger("transferring all cureent players to" . $ip . $port . "in " . $delay . " seconds!");
 foreach($this->getServer()->getOnlinePlayers() as $player) {
   $player->sendMessage("The Server will reboot in " . $ip . " seconds! you will be transferred to " . $ip . $port);
   
}

 
}//* this is the main final bracket
