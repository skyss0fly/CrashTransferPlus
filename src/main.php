<?php

namespace skyss0fly\CrashTransferPlus;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class Main extends PluginBase {
    
// Load and p `****` the config.yml file
$config = yaml_parse_file('config.yml');

// Access the value of $delay
$delay = $config['delay'];



In this example, we use the `yaml_parse_file` function to load and p `****` the `config.yml` file. Then, we access the value of `$delay` by accessing
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
 
