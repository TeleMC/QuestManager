<?php
namespace QuestManager\Quest;

use pocketmine\Player;
use pocketmine\scheduler\Task;
use QuestManager\QuestManager;

class Quest {

    public function __construct(QuestManager $plugin) {
        $this->plugin = $plugin;
    }

    public function Tomas_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Tomas_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            if ($this->a == 3) {
                                $item = $this->plugin->equipments->getEquipment("몽둥이", 1);
                                foreach ($item as $key => $value) {
                                    $this->player->getInventory()->addItem($value);
                                }
                            }
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Tomas_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["토마스의 돼지"] = 0;
                            $this->plugin->tutorial->check($this->player, 0);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Tomas_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Tomas_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Tomas_2";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["토마스의 닭"] = 0;
                            $this->plugin->udata[$this->player->getName()]["진행도"]["토마스의 소"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Tomas_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Tomas_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Tomas_3";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Jack_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Jack_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Jack_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["농장에 나타난 소"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Jack_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Jack_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Jack_2";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Jack_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Jack_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Jack_3";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Helen_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Helen_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Helen_1";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Tomsn_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Tomsn_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Tomsn_1";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Tomsn_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Tomsn_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Tomsn_2";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Beongk_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Beongk_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->a = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->job($this->player);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Beongk_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Beongk_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Beongk_2";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["굶주린 늑대"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Beongk_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Beongk_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Beongk_3";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Astra_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Astra_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Astra_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["견습산적"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Astra_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Astra_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Astra_2";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["산적"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Astra_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Astra_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Astra_3";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["베테랑산적"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Astra_4(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Astra_4"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Astra_4";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["견습산적"] = 0;
                            $this->plugin->udata[$this->player->getName()]["진행도"]["산적"] = 0;
                            $this->plugin->udata[$this->player->getName()]["진행도"]["베테랑산적"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Astra_5(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Astra_5"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Astra_5";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Pron_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Pron_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Pron_1";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function RoveMan_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["RoveMan_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "RoveMan_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["광신도"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function RoveMan_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["RoveMan_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "RoveMan_2";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["프렐교 사제"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function RoveMan_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["RoveMan_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "RoveMan_3";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["프렐교 병사"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Pron_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Pron_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Pron_2";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Brit_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Brit_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Brit_1";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Pron_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Pron_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Pron_3";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function RoveMan_4(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["RoveMan_4"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "RoveMan_4";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["프렐교 병사"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function RoveMan_5(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["RoveMan_5"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "RoveMan_5";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["프렐교 병사"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function RoveMan_6(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["RoveMan_6"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "RoveMan_6";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["프렐교 백단장 베르노아"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Pron_4(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Pron_4"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Pron_4";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Delik_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Delik_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Delik_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["코발트 강의 견습해적"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Delik_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Delik_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Delik_2";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["코발트 강의 해적"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Delik_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Delik_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Delik_3";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Carry_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Carry_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Carry_1";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Pdier_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Pdier_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Pdier_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["코발트 강의 해적"] = 0;
                            $this->plugin->udata[$this->player->getName()]["진행도"]["코발트 강의 전투해적"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Pdier_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Pdier_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Pdier_2";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["코발트 강의 전투해적"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Pdier_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Pdier_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Pdier_3";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Kain_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Kain_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Kain_1";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Akio_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Akio_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Akio_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["해적선장 나세르"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Akio_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Akio_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Akio_2";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Gaira_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Gaira_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Gaira_1";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Roikun_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Roikun_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Roikun_1";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Balkan_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Balkan_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Balkan_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["저주걸린 광부"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Balkan_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Balkan_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Balkan_2";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["저주걸린 광부"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Balkan_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Balkan_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Balkan_3";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Ritten_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Ritten_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Ritten_1";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Gale_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Gale_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Gale_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["저주걸린 채굴병"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Gale_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Gale_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Gale_2";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["광부 경비경"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Gale_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Gale_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Gale_3";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Balkan_4(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Balkan_4"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Balkan_4";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["미니좀비 광부"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Balkan_5(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Balkan_5"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Balkan_5";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["광산의 주인 데릭"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Balkan_6(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Balkan_6"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Balkan_6";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Orgen_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Orgen_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Orgen_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["붉은 칼의 보병"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Orgen_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Orgen_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Orgen_2";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["붉은 칼의 보병"] = 0;
                            $this->plugin->udata[$this->player->getName()]["진행도"]["붉은 칼의 아처"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Orgen_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Orgen_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Orgen_3";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Milison_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Milison_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Milison_1";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Milison_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Milison_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Milison_2";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Karen_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Karen_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Karen_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["붉은 칼의 아처"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Karen_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Karen_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Karen_2";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Giro_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Giro_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Giro_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["붉은 칼의 주술사"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Giro_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Giro_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Giro_2";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["붉은 칼의 주술사"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Giro_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Giro_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Giro_3";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Orgen_4(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Orgen_4"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Orgen_4";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Karen_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Karen_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Karen_3";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["붉은 칼 부족장 라우트"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Riemann_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Riemann_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Riemann_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["정령의 푸른 잔해"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Riemann_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Riemann_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Riemann_2";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["정령의 푸른 형상"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Riemann_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Riemann_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Riemann_3";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function SpiritA_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["SpiritA_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "SpiritA_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["푸른 설인"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function SpiritA_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["SpiritA_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "SpiritA_2";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["푸른 설인"] = 0;
                            $this->plugin->udata[$this->player->getName()]["진행도"]["언데드 푸른 설인"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function SpiritA_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["SpiritA_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "SpiritA_3";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["푸른 설인의 주인 로메니스"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function SpiritA_4(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["SpiritA_4"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "SpiritA_4";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Ddol_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Ddol_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Ddol_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["호랑이 탈을 쓴 광대"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Jumo_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Jumo_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Jumo_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["여우탈을 쓴 여인"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Jumo_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Jumo_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Jumo_2";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["구미호"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Jumo_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Jumo_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Jumo_3";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Makshoe_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Makshoe_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Makshoe_1";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["호랑이 탈을 쓴 광대"] = 0;
                            $this->plugin->udata[$this->player->getName()]["진행도"]["여우탈을 쓴 여인"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Ibang_1(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Ibang_1"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Ibang_1";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Makshoe_2(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Makshoe_2"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Makshoe_2";
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }

    public function Makshoe_3(Player $player) {
        $this->plugin->udata[$player->getName()]["퀘스트 듣는중..."] = "on";
        $quest = $this->plugin->qdata["Makshoe_3"];
        $this->plugin->getScheduler()->scheduleRepeatingTask(
                new class($this->plugin, $player, $quest) extends Task {
                    public function __construct(QuestManager $plugin, Player $player, $quest) {
                        $this->plugin = $plugin;
                        $this->player = $player;
                        $this->quest = $quest;
                        $this->count = count($quest["대사"]);
                        $this->count_1 = count($quest["시스템"]);
                        $this->a = 0;
                        $this->b = 0;
                    }

                    public function onRun($currentTick) {
                        if (!$this->player->isOnline()) {
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                            return;
                        }
                        $h = str_repeat("\n", 9);
                        if ($this->count > 0) {//대사가 남았으면..
                            $this->player->addTitle(" ", $this->quest["대사"][$this->a], 10, 30, 10);
                            //$this->player->sendPopup("토마스 > {$this->quest["대사"][$this->a]}{$h}");
                            $this->a++;
                            $this->count--;
                        } elseif ($this->count <= 0 and $this->count_1 > 0) {//시스템 대사가 남았으면..
                            $this->player->sendMessage("{$this->plugin->pre} {$this->quest["시스템"][$this->b]}");
                            $this->b++;
                            $this->count_1--;
                        } elseif ($this->count <= 0 and $this->count_1 <= 0) {//모든 대사가 끝났으면..
                            unset($this->plugin->udata[$this->player->getName()]["퀘스트 듣는중..."]);
                            $this->plugin->udata[$this->player->getName()]["퀘스트 진행중..."] = "Makshoe_3";
                            $this->plugin->udata[$this->player->getName()]["진행도"]["사또"] = 0;
                            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                        }
                    }
                }, 60);
    }
}
