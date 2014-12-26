<?php

namespace iJoshuaHD;

use pocketmine\event\Listener;

use pocketmine\event\player\PlayerChatEvent;

use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\Server;


class LevelChat extends PluginBase implements Listener{

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("LevelChat Enabled!");
    }

	public function onDisable(){
		$this->getLogger()->info("LevelChat Disabled!");
    }

	public function onPlayerChat(PlayerChatEvent $ev){
		$p = $ev->getPlayer();
		$recipients = $ev->getRecipients();
		$array = [];
		foreach($recipients as $t){
			if($t instanceof Player){
				if($p->getLevel() === $t->getLevel()){
					$array[] = $t;
				}
			}else{
				$array[] = $t;
			}
		}
		$ev->setRecipients($array);
		
	}
	
}
