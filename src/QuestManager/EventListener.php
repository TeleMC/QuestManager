<?php
namespace QuestManager;

use pocketmine\event\entity\EntityDeathEvent;
use pocketmine\event\entity\EntityInventoryChangeEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class EventListener implements Listener {
    private $plugin;

    public function __construct(QuestManager $plugin) {
        $this->plugin = $plugin;
    }

    public function onJoin(PlayerJoinEvent $ev) {
        if (!isset($this->plugin->udata[$ev->getPlayer()->getName()])) {
            $this->plugin->udata[$ev->getPlayer()->getName()] = [];
            $this->plugin->udata[$ev->getPlayer()->getName()]["클리어"] = [];
        }
        if ($this->plugin->isQuest($ev->getPlayer()->getName(), "이별")) {
            $ev->getPlayer()->setSpawn(new Vector3(0.5, 76, 5.5));
        }
    }

    public function onQuit(PlayerQuitEvent $ev) {
        unset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 듣는중..."]);
    }

    public function onMove(PlayerMoveEvent $ev) {
        $player = $ev->getPlayer();
        if (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Tomas_3") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(-79.0798, 65, 1079.8748)) < 5) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Jack_2") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(65.1943, 65, 1103.3884)) < 5) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Helen_1") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(-79.0798, 65, 1079.8748)) < 5) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Jack_3") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(1.3313, 86, 988.7441)) < 5) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Tomsn_2") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(-60.7994, 66, 1061.6156)) < 5) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Beongk_3") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(0.5, 76, 5.5)) < 5 || $ev->getPlayer()->distance(new Vector3(330, 65, 39)) < 10 || $ev->getPlayer()->distance(new Vector3(1, 65, 401)) < 10 || $ev->getPlayer()->distance(new Vector3(-405, 65, 0)) < 10 || $ev->getPlayer()->distance(new Vector3(0, 65, -397)) < 10) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Astra_5") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(-92.1355, 65, 325.0674)) < 5) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Pron_1") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(-123.218, 40, 436.0233)) < 5) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Pron_2") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(53.3, 65, 284.5997)) < 5) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Brit_1") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(-92.1355, 65, 325.0674)) < 5) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Pron_3") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(-123.218, 40, 436.0233)) < 5) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Pron_4") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(-1, 81, -1001)) < 5) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Delik_3") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(432, 62, -763)) < 5) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Carry_1") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(427, 63, -778)) < 5) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Pdier_3") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(95, 66, -1020)) < 5) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Kain_1") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(410, 70, -860)) < 5) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Akio_2") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(850, 65, -2)) < 10 || $ev->getPlayer()->distance(new Vector3(1000, 65, -150)) < 10 || $ev->getPlayer()->distance(new Vector3(1149, 65, 0)) < 10 || $ev->getPlayer()->distance(new Vector3(998, 65, 149)) < 10 || $ev->getPlayer()->distance(new Vector3(1006, 75, 13)) < 10) {
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Gaira_1") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(792, 65, -20)) < 5) {//실종된 아버지, 로이쿤 찾기
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Roikun_1") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(794, 39, 2)) < 5) {//실종된 아버지, 발칸 찾기
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Balkan_3") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(1101, 71, -34)) < 5) {//채굴 작업, 리튼 찾기
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Ritten_1") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(1019, 77, 33)) < 5) {//채굴 작업, 게일 찾기
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Gale_3") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(794, 39, 2)) < 5) {//게일의 최종병기, 발칸 찾기
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Balkan_6") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(-367, 66, -1196)) < 5) {//사막 가기
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Orgen_3") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(-388, 75, -1192)) < 5) {//게의사 밀리슨의 물자 1, 밀리슨 찾기
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Milison_2") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(-390, 70, -1209)) < 5) {//용병들의 걱정, 용병 카렌  찾기
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Karen_2") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(-424, 97, -1126)) < 5) {//나그네의 정찰, 지로 찾기
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Giro_3") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(-390, 70, -1209)) < 5) {//나그네의 보고, 카렌 찾기
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Orgen_4") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(-995, 64, -537)) < 5) {//촌장의 지인 리만찾기
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Riemann_3") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(-972, 63, -588)) < 5) {//호수로 가는 길, 얼어붙은 정령 찾기
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "SpiritA_4") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(1003.5, 99, 780.5)) < 5 || $ev->getPlayer()->distance(new Vector3(832.5, 70, 871)) < 5) {//도움! 외침!, 톨이마을 찾기
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Jumo_3") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(904, 74, 943)) < 5) {//막쇠 부름, 막쇠 찾기
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        } elseif (isset($this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]) and $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."] == "Ibang_1") {
            if ($ev->getPlayer()->getLevel()->getName() == "ReWorld") {
                if ($ev->getPlayer()->distance(new Vector3(904, 74, 943)) < 5) {//이방 증언, 막쇠 찾기
                    $this->plugin->clearQuest($player, $this->plugin->udata[$ev->getPlayer()->getName()]["퀘스트 진행중..."]);
                }
            }
        }
    }

    /*public function onInventory(EntityInventoryChangeEvent $ev){
      if($ev->getEntity() instanceof Player){
        $player = $ev->getEntity();
        if(isset($this->plugin->udata[$player->getName()]["퀘스트 진행중..."])){
          if($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "RoveMan_1"){
            if(stripos("낡은 십자가", $ev->getNewItem()->getName()) !== false){
              $item = $ev->getNewItem();
              $item->setCount(20);
              if($player->getInventory()->contain($ev->getNewItem()))
            }
          }
        }
      }
    }*/

    public function onKillMonster(EntityDeathEvent $ev) {
        $eid = "{$ev->getEntity()->getId()}";
        $nameTag = $ev->getEntity()->getNameTag();
        if (isset($this->plugin->packet->hit[$eid])) {
            $player = $this->plugin->packet->hit[$eid];
            if (isset($this->plugin->udata[$player->getName()]["퀘스트 진행중..."])) {
                $tag = explode("\n", $nameTag);
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Tomas_1") {//토마스의 마지막 부탁 I
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "토마스의 돼지") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["토마스의 돼지"]++;
                        $player->sendMessage("{$this->plugin->pre} 토마스의 돼지를 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["토마스의 돼지"]}/10)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["토마스의 돼지"] == 10) {
                            $player->sendMessage("{$this->plugin->pre} 토마스의 돼지 10마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["토마스의 돼지"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Tomas_2") {//토마스의 마지막 부탁 II
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "토마스의 소") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["토마스의 소"]++;
                        $player->sendMessage("{$this->plugin->pre} 토마스의 소를 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["토마스의 소"]}/15)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["토마스의 소"] == 15) {
                            $player->sendMessage("{$this->plugin->pre} 토마스의 소 15마리를 모두 잡았습니다!");
                        }
                    }
                    if (stripos($nameTag, "토마스의 닭") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["토마스의 닭"]++;
                        $player->sendMessage("{$this->plugin->pre} 토마스의 닭을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["토마스의 닭"]}/15)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["토마스의 닭"] == 15) {
                            $player->sendMessage("{$this->plugin->pre} 토마스의 닭 15마리를 모두 잡았습니다!");
                        }
                    }
                    if ($this->plugin->udata[$player->getName()]["진행도"]["토마스의 소"] >= 15 and $this->plugin->udata[$player->getName()]["진행도"]["토마스의 닭"] >= 15) {
                        $player->sendMessage("{$this->plugin->pre} 토마스의 소와 닭 15마리를 모두 잡았습니다!");
                        $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                        unset($this->plugin->udata[$player->getName()]["진행도"]["토마스의 소"]);
                        unset($this->plugin->udata[$player->getName()]["진행도"]["토마스의 닭"]);
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Jack_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "토마스의 소") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["농장에 나타난 소"]++;
                        $player->sendMessage("{$this->plugin->pre} 농장에 나타난 소를 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["농장에 나타난 소"]}/15)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["농장에 나타난 소"] == 15) {
                            $player->sendMessage("{$this->plugin->pre} 농장에 나타난 소 15마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["농장에 나타난 소"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Beongk_2") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "굶주린 늑대") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["굶주린 늑대"]++;
                        $player->sendMessage("{$this->plugin->pre} 굶주린 늑대를 잡았습니다!");
                        $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                        unset($this->plugin->udata[$player->getName()]["진행도"]["굶주린 늑대"]);
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Astra_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "견습산적") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["견습산적"]++;
                        $player->sendMessage("{$this->plugin->pre} 견습산적을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["견습산적"]}/20)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["견습산적"] == 20) {
                            $player->sendMessage("{$this->plugin->pre} 견습산적 20마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["견습산적"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Astra_2") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "산적") !== false and stripos($nameTag, "견습") == false and stripos($nameTag, "베테랑") == false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["산적"]++;
                        $player->sendMessage("{$this->plugin->pre} 산적을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["산적"]}/25)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["산적"] == 25) {
                            $player->sendMessage("{$this->plugin->pre} 산적 25마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["산적"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Astra_3") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "베테랑산적") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["베테랑산적"]++;
                        $player->sendMessage("{$this->plugin->pre} 베테랑산적을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["베테랑산적"]}/50)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["베테랑산적"] == 50) {
                            $player->sendMessage("{$this->plugin->pre} 베테랑산적 50마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["베테랑산적"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Astra_4") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "견습산적") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["견습산적"]++;
                        $player->sendMessage("{$this->plugin->pre} 견습산적을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["견습산적"]}/20)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["견습산적"] == 20) {
                            $player->sendMessage("{$this->plugin->pre} 견습산적 20마리를 모두 잡았습니다!");
                        }
                    }
                    if (stripos($nameTag, "산적") !== false and stripos($nameTag, "견습") == false and stripos($nameTag, "베테랑") == false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["산적"]++;
                        $player->sendMessage("{$this->plugin->pre} 산적을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["산적"]}/20)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["산적"] == 20) {
                            $player->sendMessage("{$this->plugin->pre} 산적 20마리를 모두 잡았습니다!");
                        }
                    }
                    if (stripos($nameTag, "베테랑산적") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["베테랑산적"]++;
                        $player->sendMessage("{$this->plugin->pre} 베테랑산적을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["베테랑산적"]}/20)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["베테랑산적"] == 20) {
                            $player->sendMessage("{$this->plugin->pre} 베테랑산적 20마리를 모두 잡았습니다!");
                        }
                    }
                    if ($this->plugin->udata[$player->getName()]["진행도"]["견습산적"] >= 20 and $this->plugin->udata[$player->getName()]["진행도"]["산적"] >= 20 and $this->plugin->udata[$player->getName()]["진행도"]["베테랑산적"] >= 20) {
                        $player->sendMessage("{$this->plugin->pre} 산적 무리들을 20마리씩 모두 잡았습니다!");
                        $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                        unset($this->plugin->udata[$player->getName()]["진행도"]["견습산적"]);
                        unset($this->plugin->udata[$player->getName()]["진행도"]["산적"]);
                        unset($this->plugin->udata[$player->getName()]["진행도"]["베테랑산적"]);
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "RoveMan_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "프렐교 광신도") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["광신도"]++;
                        $player->sendMessage("{$this->plugin->pre} 광신도를 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["광신도"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["광신도"] == 30) {
                            $player->sendMessage("{$this->plugin->pre} 광신도 30마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["광신도"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "RoveMan_2") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "프렐교 사제") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["프렐교 사제"]++;
                        $player->sendMessage("{$this->plugin->pre} 프렐교 사제를 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["프렐교 사제"]}/20)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["프렐교 사제"] == 20) {
                            $player->sendMessage("{$this->plugin->pre} 프렐교 사제 20마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["프렐교 사제"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "RoveMan_3") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "프렐교 병사") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["프렐교 병사"]++;
                        $player->sendMessage("{$this->plugin->pre} 프렐교 병사를 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["프렐교 병사"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["프렐교 병사"] == 30) {
                            $player->sendMessage("{$this->plugin->pre} 프렐교 병사 30마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["프렐교 병사"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "RoveMan_4") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "프렐교 병사") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["프렐교 병사"]++;
                        $player->sendMessage("{$this->plugin->pre} 프렐교 병사를 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["프렐교 병사"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["프렐교 병사"] == 30) {
                            $player->sendMessage("{$this->plugin->pre} 프렐교 병사 30마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["프렐교 병사"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "RoveMan_5") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "프렐교 병사") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["프렐교 병사"]++;
                        $player->sendMessage("{$this->plugin->pre} 프렐교 병사를 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["프렐교 병사"]}/50)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["프렐교 병사"] == 50) {
                            $player->sendMessage("{$this->plugin->pre} 프렐교 병사 50마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["프렐교 병사"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "RoveMan_6") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "프렐교 백단장 베르노아") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["프렐교 백단장 베르노아"]++;
                        $player->sendMessage("{$this->plugin->pre} 프렐교 백단장 베르노아를 잡았습니다!!");
                        $player->sendMessage("{$this->plugin->pre} 프론 단장에게 이 사실을 알리세요!");
                        $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                        unset($this->plugin->udata[$player->getName()]["진행도"]["프렐교 백단장 베르노아"]);
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Delik_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "코발트 강의 견습해적") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 견습해적"]++;
                        $player->sendMessage("{$this->plugin->pre} 코발트 강의 견습해적을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 견습해적"]}/20)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 견습해적"] == 20) {
                            $player->sendMessage("{$this->plugin->pre} 코발트 강의 견습해적 20마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 견습해적"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Delik_2") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "코발트 강의 해적") !== false) {
                        $this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 해적"]++;
                        $player->sendMessage("{$this->plugin->pre} 코발트 강의 해적을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 해적"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 해적"] == 30) {
                            $player->sendMessage("{$this->plugin->pre} 코발트 강의 해적 30마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 해적"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Pdier_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "코발트 강의 해적") !== false && $this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 해적"] <= 30) {
                        $this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 해적"]++;
                        $player->sendMessage("{$this->plugin->pre} 코발트 강의 해적을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 해적"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 해적"] == 30) {
                            $player->sendMessage("{$this->plugin->pre} 코발트 강의 해적 30마리를 모두 잡았습니다!");
                        }
                    }
                    if (stripos($nameTag, "코발트 강의 전투해적") !== false && $this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 전투해적"] <= 30) {
                        $this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 전투해적"]++;
                        $player->sendMessage("{$this->plugin->pre} 코발트 강의 전투해적을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 전투해적"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 전투해적"] == 30) {
                            $player->sendMessage("{$this->plugin->pre} 코발트 강의 전투해적 30마리를 모두 잡았습니다!");
                        }
                    }
                    if ($this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 전투해적"] >= 30 && $this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 해적"] >= 30) {
                        $player->sendMessage("{$this->plugin->pre} 코발트 강의 전투해적과 코발트 강의 해적을 30마리씩 모두 처치하였습니다!");
                        $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                        unset($this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 전투해적"]);
                        unset($this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 해적"]);
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Pdier_2") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "코발트 강의 전투해적") !== false && $this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 전투해적"] <= 30) {
                        $this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 전투해적"]++;
                        $player->sendMessage("{$this->plugin->pre} 코발트 강의 전투해적을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 전투해적"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 전투해적"] >= 30) {
                            $player->sendMessage("{$this->plugin->pre} 코발트 강의 전투해적 30마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["코발트 강의 전투해적"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Akio_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "해적선장 나세르") !== false) {
                        $player->sendMessage("{$this->plugin->pre} 해적선장 나세르를 잡았습니다!");
                        $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                        unset($this->plugin->udata[$player->getName()]["진행도"]["해적선장 나세르"]);
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Balkan_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "저주걸린 광부") !== false && $this->plugin->udata[$player->getName()]["진행도"]["저주걸린 광부"] <= 30) {
                        $this->plugin->udata[$player->getName()]["진행도"]["저주걸린 광부"]++;
                        $player->sendMessage("{$this->plugin->pre} 저주걸린 광부를 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["저주걸린 광부"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["저주걸린 광부"] >= 30) {
                            $player->sendMessage("{$this->plugin->pre} 저주걸린 광부 30마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["저주걸린 광부"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Balkan_2") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "저주걸린 광부") !== false && $this->plugin->udata[$player->getName()]["진행도"]["저주걸린 광부"] <= 20) {
                        $this->plugin->udata[$player->getName()]["진행도"]["저주걸린 광부"]++;
                        $player->sendMessage("{$this->plugin->pre} 저주걸린 광부를 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["저주걸린 광부"]}/20)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["저주걸린 광부"] >= 20) {
                            $player->sendMessage("{$this->plugin->pre} 저주걸린 광부 20마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["저주걸린 광부"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Gale_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "저주걸린 채굴병") !== false && $this->plugin->udata[$player->getName()]["진행도"]["저주걸린 채굴병"] <= 30) {
                        $this->plugin->udata[$player->getName()]["진행도"]["저주걸린 채굴병"]++;
                        $player->sendMessage("{$this->plugin->pre} 저주걸린 채굴병을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["저주걸린 채굴병"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["저주걸린 채굴병"] >= 30) {
                            $player->sendMessage("{$this->plugin->pre} 저주걸린 채굴병 30마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["저주걸린 채굴병"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Gale_2") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "광부 경비경") !== false && $this->plugin->udata[$player->getName()]["진행도"]["광부 경비경"] <= 40) {
                        $this->plugin->udata[$player->getName()]["진행도"]["광부 경비경"]++;
                        $player->sendMessage("{$this->plugin->pre} 광부 경비경을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["광부 경비경"]}/40)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["광부 경비경"] >= 40) {
                            $player->sendMessage("{$this->plugin->pre} 광부 경비경 40마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["광부 경비경"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Balkan_4") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "미니좀비 광부") !== false && $this->plugin->udata[$player->getName()]["진행도"]["미니좀비 광부"] <= 30) {
                        $this->plugin->udata[$player->getName()]["진행도"]["미니좀비 광부"]++;
                        $player->sendMessage("{$this->plugin->pre} 미니좀비 광부을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["미니좀비 광부"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["미니좀비 광부"] >= 30) {
                            $player->sendMessage("{$this->plugin->pre} 미니좀비 광부 30마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["미니좀비 광부"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Balkan_5") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "광산의 주인 데릭") !== false) {
                        $player->sendMessage("{$this->plugin->pre} 광산의 주인 데릭을 잡았습니다!");
                        $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                        unset($this->plugin->udata[$player->getName()]["진행도"]["광산의 주인 데릭"]);
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Orgen_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "붉은 칼의 보병") !== false && $this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 보병"] <= 50) {
                        $this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 보병"]++;
                        $player->sendMessage("{$this->plugin->pre} 붉은 칼의 보병을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 보병"]}/50)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 보병"] >= 50) {
                            $player->sendMessage("{$this->plugin->pre} 붉은 칼의 보병 50마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 보병"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Orgen_2") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "붉은 칼의 보병") !== false && $this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 보병"] <= 30) {
                        $this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 보병"]++;
                        $player->sendMessage("{$this->plugin->pre} 붉은 칼의 보병을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 보병"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 보병"] == 30) {
                            $player->sendMessage("{$this->plugin->pre} 붉은 칼의 보병 30마리를 모두 잡았습니다!");
                        }
                    }
                    if (stripos($nameTag, "붉은 칼의 아처") !== false && $this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 아처"] <= 30) {
                        $this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 아처"]++;
                        $player->sendMessage("{$this->plugin->pre} 붉은 칼의 아처을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 아처"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 아처"] == 30) {
                            $player->sendMessage("{$this->plugin->pre} 붉은 칼의 아처 30마리를 모두 잡았습니다!");
                        }
                    }
                    if ($this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 아처"] >= 30 && $this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 보병"] >= 30) {
                        $player->sendMessage("{$this->plugin->pre} 붉은 칼의 아처과 붉은 칼의 보병을 30마리씩 모두 처치하였습니다!");
                        $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                        unset($this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 아처"]);
                        unset($this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 보병"]);
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Karen_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "붉은 칼의 아처") !== false && $this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 아처"] <= 70) {
                        $this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 아처"]++;
                        $player->sendMessage("{$this->plugin->pre} 붉은 칼의 아처을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 아처"]}/70)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 아처"] >= 70) {
                            $player->sendMessage("{$this->plugin->pre} 붉은 칼의 아처 70마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 아처"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Giro_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "붉은 칼의 주술사") !== false && $this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 주술사"] <= 50) {
                        $this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 주술사"]++;
                        $player->sendMessage("{$this->plugin->pre} 붉은 칼의 주술사를 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 주술사"]}/50)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 주술사"] >= 50) {
                            $player->sendMessage("{$this->plugin->pre} 붉은 칼의 주술사 50마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 주술사"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Giro_2") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "붉은 칼의 주술사") !== false && $this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 주술사"] <= 80) {
                        $this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 주술사"]++;
                        $player->sendMessage("{$this->plugin->pre} 붉은 칼의 주술사를 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 주술사"]}/80)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 주술사"] >= 80) {
                            $player->sendMessage("{$this->plugin->pre} 붉은 칼의 주술사 80마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["붉은 칼의 주술사"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Karen_3") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "붉은 칼 부족장 라우트") !== false) {
                        $player->sendMessage("{$this->plugin->pre} 붉은 칼 부족장 라우트를 잡았습니다!");
                        $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                        unset($this->plugin->udata[$player->getName()]["진행도"]["붉은 칼 부족장 라우트"]);
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Riemann_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "정령의 푸른 잔해") !== false && $this->plugin->udata[$player->getName()]["진행도"]["정령의 푸른 잔해"] <= 30) {
                        $this->plugin->udata[$player->getName()]["진행도"]["정령의 푸른 잔해"]++;
                        $player->sendMessage("{$this->plugin->pre} 정령의 푸른 잔해을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["정령의 푸른 잔해"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["정령의 푸른 잔해"] >= 30) {
                            $player->sendMessage("{$this->plugin->pre} 정령의 푸른 잔해 30마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["정령의 푸른 잔해"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Riemann_2") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "정령의 푸른 형상") !== false && $this->plugin->udata[$player->getName()]["진행도"]["정령의 푸른 형상"] <= 40) {
                        $this->plugin->udata[$player->getName()]["진행도"]["정령의 푸른 형상"]++;
                        $player->sendMessage("{$this->plugin->pre} 정령의 푸른 형상을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["정령의 푸른 형상"]}/40)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["정령의 푸른 형상"] >= 40) {
                            $player->sendMessage("{$this->plugin->pre} 정령의 푸른 형상 40마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["정령의 푸른 형상"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "SpiritA_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "푸른 설인") !== false && stripos($nameTag, "언데드 푸른 설인") === false && stripos($nameTag, "푸른 설인의 주인 로메니스") === false && $this->plugin->udata[$player->getName()]["진행도"]["푸른 설인"] <= 40) {
                        $this->plugin->udata[$player->getName()]["진행도"]["푸른 설인"]++;
                        $player->sendMessage("{$this->plugin->pre} 푸른 설인을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["푸른 설인"]}/40)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["푸른 설인"] >= 40) {
                            $player->sendMessage("{$this->plugin->pre} 푸른 설인 40마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["푸른 설인"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "SpiritA_2") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "푸른 설인") !== false && stripos($nameTag, "언데드 푸른 설인") === false && stripos($nameTag, "푸른 설인의 주인 로메니스") === false && $this->plugin->udata[$player->getName()]["진행도"]["푸른 설인"] <= 30) {
                        $this->plugin->udata[$player->getName()]["진행도"]["푸른 설인"]++;
                        $player->sendMessage("{$this->plugin->pre} 푸른 설인을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["푸른 설인"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["푸른 설인"] == 30) {
                            $player->sendMessage("{$this->plugin->pre} 푸른 설인 30마리를 모두 잡았습니다!");
                        }
                    }
                    if (stripos($nameTag, "언데드 푸른 설인") !== false && $this->plugin->udata[$player->getName()]["진행도"]["언데드 푸른 설인"] <= 50) {
                        $this->plugin->udata[$player->getName()]["진행도"]["언데드 푸른 설인"]++;
                        $player->sendMessage("{$this->plugin->pre} 언데드 푸른 설인을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["언데드 푸른 설인"]}/50)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["언데드 푸른 설인"] == 50) {
                            $player->sendMessage("{$this->plugin->pre} 언데드 푸른 설인 50마리를 모두 잡았습니다!");
                        }
                    }
                    if ($this->plugin->udata[$player->getName()]["진행도"]["언데드 푸른 설인"] >= 50 && $this->plugin->udata[$player->getName()]["진행도"]["푸른 설인"] >= 30) {
                        $player->sendMessage("{$this->plugin->pre} 푸른 설인과 언데드 푸른 설인을 30마리와 50마리씩 모두 처치하였습니다!");
                        $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                        unset($this->plugin->udata[$player->getName()]["진행도"]["언데드 푸른 설인"]);
                        unset($this->plugin->udata[$player->getName()]["진행도"]["푸른 설인"]);
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "SpiritA_3") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "푸른 설인의 주인 로메니스") !== false) {
                        $player->sendMessage("{$this->plugin->pre} 푸른 설인의 주인 로메니스를 잡았습니다!");
                        $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                        unset($this->plugin->udata[$player->getName()]["진행도"]["푸른 설인의 주인 로메니스"]);
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Ddol_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "호랑이 탈을 쓴 광대") !== false && $this->plugin->udata[$player->getName()]["진행도"]["호랑이 탈을 쓴 광대"] <= 30) {
                        $this->plugin->udata[$player->getName()]["진행도"]["호랑이 탈을 쓴 광대"]++;
                        $player->sendMessage("{$this->plugin->pre} 호랑이 탈을 쓴 광대를 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["호랑이 탈을 쓴 광대"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["호랑이 탈을 쓴 광대"] >= 30) {
                            $player->sendMessage("{$this->plugin->pre} 호랑이 탈을 쓴 광대 30마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["호랑이 탈을 쓴 광대"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Jumo_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "여우 탈을 쓴 여인") !== false && $this->plugin->udata[$player->getName()]["진행도"]["여우탈을 쓴 여인"] <= 20) {
                        $this->plugin->udata[$player->getName()]["진행도"]["여우탈을 쓴 여인"]++;
                        $player->sendMessage("{$this->plugin->pre} 여우탈을 쓴 여인을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["여우탈을 쓴 여인"]}/20)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["여우탈을 쓴 여인"] >= 20) {
                            $player->sendMessage("{$this->plugin->pre} 여우탈을 쓴 여인 20마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["여우탈을 쓴 여인"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Jumo_2") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "구미호") !== false && $this->plugin->udata[$player->getName()]["진행도"]["구미호"] <= 50) {
                        $this->plugin->udata[$player->getName()]["진행도"]["구미호"]++;
                        $player->sendMessage("{$this->plugin->pre} 구미호를 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["구미호"]}/50)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["구미호"] >= 50) {
                            $player->sendMessage("{$this->plugin->pre} 구미호 50마리를 모두 잡았습니다!");
                            $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                            unset($this->plugin->udata[$player->getName()]["진행도"]["구미호"]);
                        }
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Makshoe_1") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "여우 탈을 쓴 여인") !== false && $this->plugin->udata[$player->getName()]["진행도"]["여우탈을 쓴 여인"] <= 50) {
                        $this->plugin->udata[$player->getName()]["진행도"]["여우탈을 쓴 여인"]++;
                        $player->sendMessage("{$this->plugin->pre} 여우탈을 쓴 여인을 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["여우탈을 쓴 여인"]}/30)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["여우탈을 쓴 여인"] == 50) {
                            $player->sendMessage("{$this->plugin->pre} 여우탈을 쓴 여인 50마리를 모두 잡았습니다!");
                        }
                    }
                    if (stripos($nameTag, "호랑이 탈을 쓴 광대") !== false && $this->plugin->udata[$player->getName()]["진행도"]["호랑이 탈을 쓴 광대"] <= 50) {
                        $this->plugin->udata[$player->getName()]["진행도"]["호랑이 탈을 쓴 광대"]++;
                        $player->sendMessage("{$this->plugin->pre} 호랑이 탈을 쓴 광대를 잡았습니다! ({$this->plugin->udata[$player->getName()]["진행도"]["호랑이 탈을 쓴 광대"]}/50)");
                        if ($this->plugin->udata[$player->getName()]["진행도"]["호랑이 탈을 쓴 광대"] == 50) {
                            $player->sendMessage("{$this->plugin->pre} 호랑이 탈을 쓴 광대 50마리를 모두 잡았습니다!");
                        }
                    }
                    if ($this->plugin->udata[$player->getName()]["진행도"]["호랑이 탈을 쓴 광대"] >= 50 && $this->plugin->udata[$player->getName()]["진행도"]["여우탈을 쓴 여인"] >= 50) {
                        $player->sendMessage("{$this->plugin->pre} 호랑이 탈을 쓴 광대와 여우탈을 쓴 여인을 50마리씩 모두 처치하였습니다!");
                        $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                        unset($this->plugin->udata[$player->getName()]["진행도"]["호랑이 탈을 쓴 광대"]);
                        unset($this->plugin->udata[$player->getName()]["진행도"]["여우탈을 쓴 여인"]);
                    }
                }
                if ($this->plugin->udata[$player->getName()]["퀘스트 진행중..."] == "Makshoe_3") {
                    if (isset($this->plugin->udata[$player->getName()]["퀘스트 완료!"])) return;
                    if (stripos($nameTag, "사또") !== false) {
                        $player->sendMessage("{$this->plugin->pre} 사또를 잡았습니다!");
                        $this->plugin->udata[$player->getName()]["퀘스트 완료!"] = $this->plugin->udata[$player->getName()]["퀘스트 진행중..."];
                        unset($this->plugin->udata[$player->getName()]["진행도"]["사또"]);
                    }
                }
            }
        }
    }
}
