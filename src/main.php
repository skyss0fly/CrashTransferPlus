<?php

namespace skyss0fly\CrashTransferPlus;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class Main extends PluginBase {
    public function onLoad() {
        $this->saveDefaultConfig();
        $config = $this->getConfig();
    }

    public function onDisable($delay) {
      while ($delay > 0) {
        $delay = $this->getConfig()->get("Delay");
        $ip = $this->getConfig()->get("IP");
        $port = $this->getConfig()->get("Port");

        $this->getLogger()->info("Transferring all current players to $ip:$port in $delay seconds!");

        foreach ($this->getServer()->getOnlinePlayers() as $player) {
            $player->sendMessage("The server will reboot in " . $delay . " seconds! You will be transferred back here!");
            }
            $player->transfer()
                }
    }
    }

            
            
