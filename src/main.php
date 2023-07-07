<?php

namespace skyss0fly\CrashTransferPlus;

use pocketmine\player\Player;
use pocketmine\scheduler\Task;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginLoader;

class Main extends PluginBase {
    
private $config;

    public function __construct(PluginLoader $loader) {
        $this->config = $this->loadConfig();
          parent::__construct($loader);
    
    }

    private function loadConfig() {
        // Read and p `****` the configuration file
        $configData = yaml_parse_file('config.yml');
        return $configData;
    }

    public function getConfig() {
        return $this->config;
    }

    public function onLoad(): void {
        $this->saveDefaultConfig();
        $config = $this->getConfig();
    }

    public function onDisable($delay) {
      while ($delay > 0) {
          sleep(1);
        $delay--;
    
        $delay = $this->getConfig()->get("Delay");
        $ip = $this->getConfig()->get("IP");
        $port = $this->getConfig()->get("Port");

        $this->getLogger()->info("Transferring all current players to $ip:$port in $delay seconds!");

        foreach ($this->getServer()->getOnlinePlayers() as $player) {
            $player->sendMessage("The server will reboot in " . $delay . " seconds! You will be transferred back here!");
        }
          $player->transfer($ip);
      }
    }
}
 
