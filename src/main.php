<?php

namespace skyss0fly\CrashTransferPlus;

use pocketmine\player\Player;
use pocketmine\scheduler\Task;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
    
class Main extends PluginBase {
    
     function onLoad(): void {
        $this->saveDefaultConfig();
        $config = $this->getConfig();
    }
    function delay(): void {
    $delay = $this->getConfig("Delay");
    }
     function onDisable($delay): void {
      while ($delay > 0) {
          sleep(1);
        $delay--;
    
        $delayamount = $this->getConfig()->get("Delay");
        $ip = $this->getConfig()->get("IP");
        $port = $this->getConfig()->get("Port");

        $this->getLogger()->info("Transferring all current players to $ip:$port in $delayamount seconds!");

        foreach ($this->getServer()->getOnlinePlayers() as $player) {
            $player->sendMessage("The server will reboot in " . $delayamount . " seconds! You will be transferred back here!");
        }
          $player->transfer($ip, $port);
      }
    }
}
 
