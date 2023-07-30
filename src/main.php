<?php

namespace skyss0fly\CrashTransferPlus;

use pocketmine\player\Player;
use pocketmine\scheduler\Task;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
    
class Main extends PluginBase {
    
     public function onLoad(): void {
        $this->saveDefaultConfig();
        $config = $this->getConfig();
    }
    public function delay(): void {
    $delay = $this->getConfig()->get("Delay");
    }
     public function onDisable(): void {
        $delayamount = $this->getConfig()->get("Delay");
        $ip = $this->getConfig()->get("IP");
        $port = $this->getConfig()->get("Port");

        $this->getLogger()->info("Transferring all current players to " . $ip . ":" . $port . " in " . $delayamount . " seconds!");

        foreach ($this->getServer()->getOnlinePlayers() as $player) {
            $player->sendMessage("The server will reboot in " . $delayamount . " seconds! You will be transferred back here!");
        }
        $delay = $delayamount;
        while ($delay > 0) {
            sleep(1);
            $delay--;
        }
         $player = $this->getServer()->getOnlinePlayers();
        $player->transfer($ip, $port);
    }
}
