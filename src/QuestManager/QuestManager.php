<?php
namespace QuestManager;

use AbilityManager\AbilityManager;
use Core\Core;
use Core\util\Util;
use Equipments\Equipments;
use EtcItem\EtcItem;
use Monster\Monster;
use PacketEventManager\PacketEventManager;
use pocketmine\item\Item;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\Task;
use pocketmine\Server;
use pocketmine\utils\Config;
use PrefixManager\PrefixManager;
use QuestManager\Quest\Quest;
use TeleMoney\TeleMoney;
use TutorialManager\TutorialManager;
use UiLibrary\UiLibrary;

class QuestManager extends PluginBase {
    private static $instance = null;
    //public $pre = "§e§l[ §f퀘스트 §e]§r§e";
    public $pre = "§e•";

    public static function getInstance() {
        return self::$instance;
    }

    public function onLoad() {
        self::$instance = $this;
    }

    public function onEnable() {
        @mkdir($this->getDataFolder());
        $this->saveResource("Quests.yml");
        $this->saveResource("QuestInfo.yml");
        $this->quest = new Config($this->getDataFolder() . "Quests.yml", Config::YAML);
        $this->qdata = $this->quest->getAll();
        $this->questinfo = new Config($this->getDataFolder() . "QuestInfo.yml", Config::YAML);
        $this->qidata = $this->questinfo->getAll();
        $this->user = new Config($this->getDataFolder() . "User.yml", Config::YAML);
        $this->udata = $this->user->getAll();
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->money = TeleMoney::getInstance();
        $this->core = Core::getInstance();
        $this->util = new Util($this->core);
        $this->equipments = Equipments::getInstance();
        $this->etcitem = EtcItem::getInstance();
        $this->packet = PacketEventManager::getInstance();
        $this->ui = UiLibrary::getInstance();
        $this->prefix = PrefixManager::getInstance();
        $this->monster = Monster::getInstance();
        $this->tutorial = TutorialManager::getInstance();
        $this->ability = AbilityManager::getInstance();
        $this->quest = new Quest($this);
    }

    public function onDisable() {
        $this->save();
    }

    public function save() {
        $this->user->setAll($this->udata);
        $this->user->save();
    }

    public function Quest(Player $player, string $quest) {
        if ($quest == "Tomas") $this->Tomas($player);
        elseif ($quest == "Jack") $this->Jack($player);
        elseif ($quest == "Helen") $this->Helen($player);
        elseif ($quest == "Tomsn") $this->Tomsn($player);
        elseif ($quest == "Beongk") $this->Beongk($player);

        elseif ($quest == "Astra") $this->Astra($player);
        elseif ($quest == "Pron") $this->Pron($player);
        elseif ($quest == "RoveMan") $this->RoveMan($player);
        elseif ($quest == "Brit") $this->Brit($player);

        elseif ($quest == "Delik") $this->Delik($player);
        elseif ($quest == "Carry") $this->Carry($player);
        elseif ($quest == "Pdier") $this->Pdier($player);
        elseif ($quest == "Kain") $this->Kain($player);
        elseif ($quest == "Akio") $this->Akio($player);

        elseif ($quest == "Gaira") $this->Gaira($player);
        elseif ($quest == "Roikun") $this->Roikun($player);
        elseif ($quest == "Balkan") $this->Balkan($player);
        elseif ($quest == "Ritten") $this->Ritten($player);
        elseif ($quest == "Gale") $this->Gale($player);
        elseif ($quest == "Orgen") $this->Orgen($player);
        elseif ($quest == "Milison") $this->Milison($player);
        elseif ($quest == "Karen") $this->Karen($player);
        elseif ($quest == "Giro") $this->Giro($player);

        elseif ($quest == "Riemann") $this->Riemann($player);
        elseif ($quest == "SpiritA") $this->SpiritA($player);

        elseif ($quest == "Ddol") $this->Ddol($player);
        elseif ($quest == "Jumo") $this->Jumo($player);
        elseif ($quest == "Makshoe") $this->Makshoe($player);
        elseif ($quest == "Ibang") $this->Ibang($player);

        else {
            $player->sendMessage("{$this->pre} 해당 퀘스트를 찾을 수 없습니다.");
            $player->sendMessage("{$this->pre} 설정된 퀘스트 : {$quest}");
            return;
        }
        return;
    }

    public function Tomas(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."])) return;
        else //////////////////// 완료한 퀘스트 판단, 클리어 or 캔슬 ////////////////////

            if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
                if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Tomas_1") {
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
                } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Tomas_2") {
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
                }
            } else //////////////////// 진행중인 퀘스트 판단, 중도포기 ////////////////////

                if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
                    if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Tomas") !== false)
                        $this->giveupQuest($player);
                } else //////////////////// 퀘스트 진행도 판단, 퀘스트 지급 ////////////////////

                    if (!$this->isQuest($player->getName(), $this->getQuestName("Tomas_1"))) {
                        if (!$this->tutorial->isTutorialing($player->getName()) && !$this->tutorial->isTutorialed($player->getName())) {
                            $this->tutorial->Tutorial($player);
                            return false;
                        }
                        $this->startQuest($player, "Tomas_1");
                    } elseif (!$this->isQuest($player->getName(), $this->getQuestName("Tomas_2"))) {
                        $this->startQuest($player, "Tomas_2");
                    } elseif (!$this->isQuest($player->getName(), $this->getQuestName("Tomas_3"))) {
                        $this->startQuest($player, "Tomas_3");
                    } else {
                        $player->addTitle(" ", "저번의 부탁을 들어준건 고마웠네, 잘 지내고 있는가?", 10, 30, 10);
                    }
    }

    public function clearQuest(Player $player, string $questName) {
        unset($this->udata[$player->getName()]["퀘스트 완료!"]);
        unset($this->udata[$player->getName()]["퀘스트 진행중..."]);
        $this->udata[$player->getName()]["클리어"][$this->qidata[$questName][0]] = "true";
        foreach ($this->qdata[$questName]["완료"] as $type => $value) {
            if ($type == "경험치") $this->util->addExp($player->getName(), $value);
            elseif ($type == "테나") $this->money->addMoney($player->getName(), $value);
            elseif ($type == "장비") $this->equipments->getEquipment($player, explode(":", $value)[0], explode(":", $value)[1]);
            elseif ($type == "잡화") $this->etcitem->getEtcItem($player, explode(":", $value)[0], explode(":", $value)[1]);
            elseif ($type == "아이템") $player->getInventory()->addItem(Item::get(explode(":", $value)[0], explode(":", $value)[1], explode(":", $value)[2]));
            elseif ($type == "칭호") $this->prefix->addPrefix($player->getName(), $value);
        }
        if ($this->qdata[$questName]["완료"]["메세지"] !== null)
            $player->addTitle(" ", $this->qdata[$questName]["완료"]["메세지"], 10, 30, 10);
        $player->sendMessage("{$this->pre} {$this->qidata[$questName][0]}(을)를 완료하였습니다!");
        $player->sendMessage("{$this->pre} {$this->getReward($questName)}(을)를 받았습니다!");
        if ($questName == "Tomas_1")
            $this->tutorial->check($player, 2);
    }

    /*public function getMessage(string $npc){
      $msg = "";
      for($i=0; $i < count($this->qdata[$npc]["대사"]); $i++){
        $msg .= $this->qdata[$npc]["대사"][$i]."\n";
      }
      return $msg;
    }

    public function sendMessage(Player $player, string $npc){
      for($i=0; $i < count($this->qdata[$npc]["시스템"]); $i++){
        $player->sendMessage("{$this->pre} {$this->qdata[$npc]["시스템"][$i]}");
      }
    }*/

    public function getReward(string $quest) {
        $reward = "";
        if ($this->qdata[$quest]["보상"] == null) {
            $raward = "없음";
            return $reward;
        }
        for ($i = 0; $i < count($this->qdata[$quest]["보상"]); $i++) {
            if ($i == count($this->qdata[$quest]["보상"]) - 1) {
                $reward .= "{$this->qdata[$quest]["보상"][$i]}";
            } else {
                $reward .= "{$this->qdata[$quest]["보상"][$i]}, ";
            }
        }
        return $reward;
    }

    ///////////////////////////////////////////////////////// 토마스 /////////////////////////////////////////////////////////

    public function giveupQuest(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 완료!"]))
            $m = $this->udata[$player->getName()]["퀘스트 완료!"];
        else
            $m = $this->udata[$player->getName()]["퀘스트 진행중..."];
        $questName = $this->qidata[$m][0];
        $rejectMessage = $this->qdata[$m]["포기"];
        $rejectMessage = str_replace("\n", "\n", $rejectMessage);
        $form = $this->ui->ModalForm(function (Player $player, array $data) {
            if (isset($this->udata[$player->getName()]["퀘스트 완료!"]))
                $m = $this->udata[$player->getName()]["퀘스트 완료!"];
            else
                $m = $this->udata[$player->getName()]["퀘스트 진행중..."];
            $questName = $this->qidata[$m][0];
            if ($data[0] == true) {
                if (isset($this->qdata[$m]["거절"]))
                    $player->addTitle(" ", $this->qdata[$m]["거절"], 10, 30, 10);
                unset($this->udata[$player->getName()]["퀘스트 진행중..."]);
                unset($this->udata[$player->getName()]["진행도"]);
                unset($this->udata[$player->getName()]["퀘스트 완료!"]);
                $player->sendMessage("{$this->pre} {$questName} 퀘스트를 포기하였습니다.");
            } else {
                return;
            }
        });
        $form->setTitle($questName);
        $form->setContent($rejectMessage);
        $form->setButton1("§l[중도포기]");
        $form->setButton2("§l[계속진행]");
        $form->sendToPlayer($player);
    }


    ///////////////////////////////////////////////////////// 잭 /////////////////////////////////////////////////////////

    public function isQuest(string $name, string $quest): bool {
        if (isset($this->udata[$name]["클리어"][$quest])) return true;
        else return false;
    }


    ///////////////////////////////////////////////////////// 헬렌 /////////////////////////////////////////////////////////

    public function getQuestName(string $quest) {
        if (!isset($this->qidata[$quest]))
            return null;
        else
            return $this->qidata[$quest][0];
    }


    ///////////////////////////////////////////////////////// 톰슨 /////////////////////////////////////////////////////////

    public function startQuest(Player $player, string $questName) {
        $this->Z[$player->getName()] = $questName;
        $form = $this->ui->ModalForm(function (Player $player, array $data) {
            $questName = $this->Z[$player->getName()];
            if ($data[0] == true) {
                unset($this->Z[$player->getName()]);
                $this->quest->$questName($player);
            } else {
                unset($this->Z[$player->getName()]);
                $player->sendMessage("{$this->pre} {$this->qidata[$questName][0]} 퀘스트를 거절하였습니다.");
                if (isset($this->qdata[$questName]["거절"]))
                    $player->addTitle(" ", $this->qdata[$questName]["거절"], 10, 30, 10);
            }
        });
        $form->setTitle($this->qidata[$questName][0]);
        $form->setContent($this->qdata[$questName]["요청"]);
        $form->setButton1("§l[수락]");
        $form->setButton2("§l[거절]");
        $form->sendToPlayer($player);
    }


    ///////////////////////////////////////////////////////// 벙크 /////////////////////////////////////////////////////////

    public function Jack(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Jack_1") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Jack") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), $this->getQuestName("Tomas_3"))) {
            $player->addTitle(" ", "처음 보는 아이네, 놀러왔어?", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), $this->getQuestName("Jack_1"))) {
            $this->startQuest($player, "Jack_1");
        } elseif (!$this->isQuest($player->getName(), $this->getQuestName("Jack_2"))) {
            $this->startQuest($player, "Jack_2");
        } elseif (!$this->isQuest($player->getName(), $this->getQuestName("Jack_3"))) {
            if (!$this->isQuest($player->getName(), $this->getQuestName("Helen_1")))
                $player->addTitle(" ", "나중에 부탁이 있으면 부를게!", 10, 30, 10);
            else
                $this->startQuest($player, "Jack_3");
        } else {
            $player->addTitle(" ", "고마웠어!", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 아스트라 /////////////////////////////////////////////////////////

    public function Helen(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Helen") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), $this->getQuestName("Jack_2"))) {
            $player->addTitle(" ", "넌 누구니?", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), $this->getQuestName("Helen_1"))) {
            $this->startQuest($player, "Helen_1");
        } else {
            $player->addTitle(" ", "너가.. 잭의 심부름을 하던 아이였나?", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 프론 /////////////////////////////////////////////////////////

    public function Tomsn(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Tomsn") !== false) {
                if ($this->udata[$player->getName()]["퀘스트 진행중..."] == "Tomsn_1") {
                    if ($this->util->getLevel($player->getName()) >= 10) {
                        $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 진행중..."]);
                    } else
                        $this->giveupQuest($player);
                }
            }
        } else if (!$this->isQuest($player->getName(), $this->getQuestName("Jack_3"))) {
            $player->addTitle(" ", "여행은 잘 하고 있나보구나.", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "성장의 길")) {
            $this->startQuest($player, "Tomsn_1");
        } elseif (!$this->isQuest($player->getName(), "나의 전공")) {
            $this->startQuest($player, "Tomsn_2");
        } else {
            $player->addTitle(" ", "여행은 잘 하고 잇나보구나.", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 검은 로브를 쓴 남자 /////////////////////////////////////////////////////////

    public function Beongk(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Beongk_2")
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Beongk") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "나의 전공")) {
            $player->addTitle(" ", "창고는 내가 지키지!", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "레츠 기릿!")) {
            $this->quest->Beongk_1($player);
        } elseif (!$this->isQuest($player->getName(), "늑대의 습격")) {
            $this->startQuest($player, "Beongk_2");
        } elseif (!$this->isQuest($player->getName(), "이별")) {
            $this->startQuest($player, "Beongk_3");
        } else {
            $player->addTitle(" ", "창고는 내가 지키지!", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 브리트 /////////////////////////////////////////////////////////

    public function Astra(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Astra_1")
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Astra_2")
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Astra_3")
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Astra_4")
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Astra") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "나의 전공")) {
            $player->addTitle(" ", "넌 아직 켄텀브리엄으로 오면 안돼", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "모험의 준비 1")) {
            $this->startQuest($player, "Astra_1");
        } elseif (!$this->isQuest($player->getName(), "모험의 준비 2")) {
            $this->startQuest($player, "Astra_2");
        } elseif (!$this->isQuest($player->getName(), "모험의 준비 3")) {
            $this->startQuest($player, "Astra_3");
        } elseif (!$this->isQuest($player->getName(), "모험의 준비 4")) {
            $this->startQuest($player, "Astra_4");
        } elseif (!$this->isQuest($player->getName(), "첫 의뢰")) {
            if ($this->util->getLevel($player->getName()) < 20) {
                $player->addTitle(" ", "흐음.. 좀 약해보이는군 레벨을 §c20§f까지만 올리면 의뢰를..", 10, 30, 10);
                return;
            }
            $this->startQuest($player, "Astra_5");
        } else {
            $player->addTitle(" ", "넌 정말 훌륭한 모험가야!", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 델리크 /////////////////////////////////////////////////////////

    public function Pron(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "RoveMan_3") {
                if (!isset($this->monster->idata[$player->getName()]["검은빛의 검"]) || $this->monster->idata[$player->getName()]["검은빛의 검"] < 10) {
                    $player->addTitle(" ", "전해줄것이 있다고? 양이 좀 부족한듯 하네.", 10, 30, 10);
                } else {
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
                    $this->monster->idata[$player->getName()]["검은빛의 검"] -= 10;
                }
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "RoveMan_6") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Pron") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "첫 의뢰")) {
            $player->addTitle(" ", "너도 프렐교 사람인가? 그렇다면 당장 그만두게!", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "수상한 종교")) {
            $this->startQuest($player, "Pron_1");
        } elseif (!$this->isQuest($player->getName(), "추적 브리트!")) {
            $this->startQuest($player, "Pron_2");
        } elseif (!$this->isQuest($player->getName(), "명탐정 프론")) {
            $this->startQuest($player, "Pron_3");
        } elseif (!$this->isQuest($player->getName(), "임무 완료")) {
            $this->startQuest($player, "Pron_4");
        } else {
            $player->addTitle(" ", "신세를 많이 졌어.", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 캐리 /////////////////////////////////////////////////////////

    public function RoveMan(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "RoveMan_1") {
                if (!isset($this->monster->idata[$player->getName()]["파괴된 십자가"]) || $this->monster->idata[$player->getName()]["파괴된 십자가"] < 20) {
                    $this->giveupQuest($player);
                } else {
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
                    $this->monster->idata[$player->getName()]["파괴된 십자가"] -= 20;
                }
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "RoveMan_2") {
                if (!isset($this->monster->idata[$player->getName()]["수상한 성서"]) || $this->monster->idata[$player->getName()]["수상한 성서"] < 10) {
                    $this->giveupQuest($player);
                } else {
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
                    $this->monster->idata[$player->getName()]["수상한 성서"] -= 10;
                }
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "RoveMan_3") {
                if (!isset($this->monster->idata[$player->getName()]["검은빛의 검"]) || $this->monster->idata[$player->getName()]["검은빛의 검"] < 10) {
                    $this->giveupQuest($player);
                } else {
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
                    $this->monster->idata[$player->getName()]["검은빛의 검"] -= 10;
                }
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "RoveMan_4") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "RoveMan_5") {
                if (!isset($this->monster->idata[$player->getName()]["검은빛의 검"]) || $this->monster->idata[$player->getName()]["검은빛의 검"] < 20) {
                    $this->giveupQuest($player);
                } else {
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
                    $this->monster->idata[$player->getName()]["검은빛의 검"] -= 20;
                }
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "RoveMan") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "수상한 종교")) {
            $player->addTitle(" ", "흐음... 수상하군...", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "정찰의 기본 1")) {
            $this->startQuest($player, "RoveMan_1");
        } elseif (!$this->isQuest($player->getName(), "정찰의 기본 2")) {
            $this->startQuest($player, "RoveMan_2");
        } elseif (!$this->isQuest($player->getName(), "그들의 거래")) {
            $this->startQuest($player, "RoveMan_3");
        } elseif (!$this->isQuest($player->getName(), "추적 브리트!")) {
            $player->addTitle(" ", "프론 단장님께 전해드렸나?", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "명탐정 프론")) {
            $player->addTitle(" ", "프렐교의 움직임이 수상해. 더 빠르게 움직여 주게!", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "프렐교 병사 소탕작전 1")) {
            $this->startQuest($player, "RoveMan_4");
        } elseif (!$this->isQuest($player->getName(), "프렐교 병사 소탕작전 2")) {
            $this->startQuest($player, "RoveMan_5");
        } elseif (!$this->isQuest($player->getName(), "프렐교의 실체")) {
            $this->startQuest($player, "RoveMan_6");
        } else {
            $player->addTitle(" ", "정찰 실력이 보통이 아니었네!", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 프디에르 /////////////////////////////////////////////////////////

    public function Brit(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            $player->addTitle(" ", "어서옵쇼! 좋은 무기가 많이 준비되어있습니다!", 10, 30, 10);
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Brit") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "추적 브리트!")) {
            $player->addTitle(" ", "어서옵쇼! 좋은 무기가 많이 준비되어있습니다!", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "이제는 말할수 있다!")) {
            $this->startQuest($player, "Brit_1");
        } else {
            $player->addTitle(" ", "죄송합니다 모험가님..", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 카인 /////////////////////////////////////////////////////////

    public function Delik(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Delik_1") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Delik_2") {
                if (!isset($this->monster->idata[$player->getName()]["붉은 두건"]) || $this->monster->idata[$player->getName()]["붉은 두건"] < 20) {
                    $this->giveupQuest($player);
                    //$player->addTitle(" ", "붉은 두건이 좀 부족해요.. 꼭 필요한건데..", 10, 30, 10);
                } else {
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
                }
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Delik") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "프렐교의 실체")) {
            $player->addTitle(" ", "큰일이야 큰일...", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "어부의 생계 1")) {
            if ($this->util->getLevel($player->getName()) < 30) {
                $player->addTitle(" ", "큰일이야 큰일.. 아 혹시 도와주시려는건가요..?\n좀 약하신것 같은데.. 레벨이 적어도 §c30§f까지는", 10, 30, 10);
                return;
            }
            $this->startQuest($player, "Delik_1");
        } elseif (!$this->isQuest($player->getName(), "어부의 생계 2")) {
            $this->startQuest($player, "Delik_2");
        } elseif (!$this->isQuest($player->getName(), "어부의 목격")) {
            $this->startQuest($player, "Delik_3");
        } else {
            $player->addTitle(" ", "도움을 주셔서 감사합니다!", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 아키오 /////////////////////////////////////////////////////////

    public function Carry(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if (!$this->isQuest($player->getName(), "아키오의 이야기"))
                $player->addTitle(" ", "도와주세요..", 10, 30, 10);
            else
                $player->addTitle(" ", "감사했습니다!", 10, 30, 10);
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Carry") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "어부의 목격")) {
            $player->addTitle(" ", "어 당신은 누구야! 저리 꺼져! 나를 납치하려고! 프디에르 할아버지!!", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "인어의 사정")) {
            $this->startQuest($player, "Carry_1");
        } else {
            if (!$this->isQuest($player->getName(), "아키오의 이야기"))
                $player->addTitle(" ", "도와주세요..", 10, 30, 10);
            else
                $player->addTitle(" ", "감사했습니다!", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 가이라 /////////////////////////////////////////////////////////

    public function Pdier(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Pdier_1") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Pdier_2") {
                if (!isset($this->monster->idata[$player->getName()]["코발트 해적기"]) || $this->monster->idata[$player->getName()]["코발트 해적기"] < 30) {
                    $this->giveupQuest($player);
                } else {
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
                }
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Pdier") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "인어의 사정")) {
            $player->addTitle(" ", "쿨럭쿨럭.. 자넨 누군가..??", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "공포의 해적 1")) {
            $this->startQuest($player, "Pdier_1");
        } elseif (!$this->isQuest($player->getName(), "공포의 해적 2")) {
            $this->startQuest($player, "Pdier_2");
        } elseif (!$this->isQuest($player->getName(), "내부의 배신자")) {
            $this->startQuest($player, "Pdier_3");
        } else {
            $player->addTitle(" ", "자네에겐 모두가 고마워하고있네..", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 로이쿤 /////////////////////////////////////////////////////////

    public function Kain(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            $player->addTitle(" ", "저희 마을을 구원해주셔서 감사합니다!!", 10, 30, 10);
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Kain") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "내부의 배신자")) {
            $player->addTitle(" ", "우리 마을이 위험해...", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "카인의 이야기")) {
            $this->startQuest($player, "Kain_1");
        } else {
            $player->addTitle(" ", "저희 마을을 구원해주셔서 감사합니다!!", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 발칸 /////////////////////////////////////////////////////////

    public function Akio(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Akio_1") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } else {
                $player->addTitle(" ", "정말로 감사드립니다!!", 10, 30, 10);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Akio") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "카인의 이야기")) {
            $player->addTitle(" ", "이게 정말 해적인.. 아아 아닙니다!", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "아키오의 이야기")) {
            $this->startQuest($player, "Akio_1");
        } elseif (!$this->isQuest($player->getName(), "장난의 마을의 평화")) {
            $this->startQuest($player, "Akio_2");
        } else {
            $player->addTitle(" ", "정말로 감사드립니다!!", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 리튼 /////////////////////////////////////////////////////////

    public function Gaira(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if (!$this->isQuest($player->getName(), "아키오의 이야기")) {
                $player->addTitle(" ", "흑...흑흑...", 10, 30, 10);
            } else {
                $player->addTitle(" ", "정말로 감사드립니다!!", 10, 30, 10);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Gaira") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "장난의 마을의 평화")) {
            $player->addTitle(" ", "흑...흑흑...", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "실종된 아버지 1")) {
            if ($this->util->getLevel($player->getName()) < 40) {
                $player->addTitle(" ", "흑...흑흑...\n저희 아버지좀 구해주세요..\n§c40§f레벨의 모험가님이 필요해요..", 10, 30, 10);
                return;
            }
            $this->startQuest($player, "Gaira_1");
        } else {
            $player->addTitle(" ", "정말로 감사드립니다!!", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 게일 /////////////////////////////////////////////////////////

    public function Roikun(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if (!$this->isQuest($player->getName(), "실종된 아버지 1")) {
                $player->addTitle(" ", "이곳은 지나갈 수 없습니다.", 10, 30, 10);
            } else {
                $player->addTitle(" ", "광산에 그런일이..", 10, 30, 10);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Roikun") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "실종된 아버지 1")) {
            $player->addTitle(" ", "이곳은 지나갈 수 없습니다.", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "실종된 아버지 2")) {
            $this->startQuest($player, "Roikun_1");
        } else {
            $player->addTitle(" ", "광산에 그런일이...", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 오르겐 /////////////////////////////////////////////////////////

    public function Balkan(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Balkan_1") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Balkan_2") {
                if (!isset($this->monster->idata[$player->getName()]["망가진 곡괭이"]) || $this->monster->idata[$player->getName()]["망가진 곡괭이"] < 20) {
                    $this->giveupQuest($player);
                } else {
                    $this->monster->idata[$player->getName()]["망가진 곡괭이"] -= 20;
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
                }
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Balkan_4") {
                if (!isset($this->monster->idata[$player->getName()]["오염된 삽"]) || $this->monster->idata[$player->getName()]["오염된 삽"] < 20) {
                    $this->giveupQuest($player);
                } else {
                    $this->monster->idata[$player->getName()]["오염된 삽"] -= 20;
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
                }
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Balkan_5") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } else {
                $player->addTitle(" ", "제 생명의 은인이십니다..", 10, 30, 10);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Balkan") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "실종된 아버지 2")) {
            $player->addTitle(" ", "크윽.. 대체 왜 이렇게 된거지..", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "실종된 아버지 3")) {
            $this->startQuest($player, "Balkan_1");
        } elseif (!$this->isQuest($player->getName(), "채굴 작업 1")) {
            $this->startQuest($player, "Balkan_2");
        } elseif (!$this->isQuest($player->getName(), "채굴 작업 2")) {
            $this->startQuest($player, "Balkan_3");
        } elseif (!$this->isQuest($player->getName(), "게일의 비밀병기 2")) {
            $player->addTitle(" ", "작업은 잘 되가나요..? 저도 힘내겠습니다!", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "발칸의 발견 1")) {
            $this->startQuest($player, "Balkan_4");
        } elseif (!$this->isQuest($player->getName(), "발칸의 발견 2")) {
            $this->startQuest($player, "Balkan_5");
        } elseif (!$this->isQuest($player->getName(), "발칸의 마지막 부탁")) {
            $this->startQuest($player, "Balkan_6");
        } else {
            $player->addTitle(" ", "제 생명의 은인이십니다..", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 말리슨 /////////////////////////////////////////////////////////

    public function Ritten(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if (!$this->isQuest($player->getName(), "채굴 작업 2")) {
                $player->addTitle(" ", "뭐 부탁이라도 하려는건가? 난 이 구역 장인이라네!", 10, 30, 10);
            } else {
                $player->addTitle(" ", "큰 일을 해냈다면서?", 10, 30, 10);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Ritten") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "채굴 작업 2")) {
            $player->addTitle(" ", "뭐 부탁이라도 하려는건가? 난 이 구역 장인이라네!", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "장인의 위엄")) {
            $this->startQuest($player, "Ritten_1");
        } else {
            $player->addTitle(" ", "큰 일을 해냈다면서?", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 카렌 /////////////////////////////////////////////////////////

    public function Gale(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Gale_1") {
                if (!isset($this->monster->idata[$player->getName()]["슬픈 나무조각"]) || $this->monster->idata[$player->getName()]["슬픈 나무조각"] < 30) {
                    $this->giveupQuest($player);
                } else {
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
                    $this->monster->idata[$player->getName()]["슬픈 나무조각"] -= 30;
                }
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Gale_2") {
                if (!isset($this->monster->idata[$player->getName()]["날이선 곡괭이"]) || $this->monster->idata[$player->getName()]["날이선 곡괭이"] < 30) {
                    $this->giveupQuest($player);
                } else {
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
                    $this->monster->idata[$player->getName()]["날이선 곡괭이"] -= 30;
                }
            } else {
                $player->addTitle(" ", "큰 일을 해냈다면서?", 10, 30, 10);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Gale") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "실종된 아버지 2")) {
            $player->addTitle(" ", "이 큰 공장이 내것이라네! 하하하!", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "게일의 제안")) {
            $this->startQuest($player, "Gale_1");
        } elseif (!$this->isQuest($player->getName(), "게일의 비밀병기 1")) {
            $this->startQuest($player, "Gale_2");
        } elseif (!$this->isQuest($player->getName(), "게일의 비밀병기 2")) {
            $this->startQuest($player, "Gale_3");
        } else {
            $player->addTitle(" ", "큰 일을 해냈다면서?", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 지로 /////////////////////////////////////////////////////////

    public function Orgen(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Orgen_1") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Orgen_2") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } else {
                $player->addTitle(" ", "내 마을을 살려줘서 정말 고맙네..!", 10, 30, 10);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Orgen") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "발칸의 발견 2")) {
            $player->addTitle(" ", "내가 키워온 마을이.. 여기서 끝을...", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "촌장의 고민 1")) {
            if ($this->util->getLevel($player->getName()) < 50) {
                $player->addTitle(" ", "저 무리의 레벨이..\n적어도 §c50§f레벨의 용병이 나서야하는데..", 10, 30, 10);
                return;
            }
            $this->startQuest($player, "Orgen_1");
        } elseif (!$this->isQuest($player->getName(), "촌장의 고민 2")) {
            $this->startQuest($player, "Orgen_2");
        } elseif (!$this->isQuest($player->getName(), "의사 밀리슨의 물자 1")) {
            $this->startQuest($player, "Orgen_3");
        } elseif (!$this->isQuest($player->getName(), "촌장의 지인")) {
            $this->startQuest($player, "Orgen_4");
        } else {
            $player->addTitle(" ", "내 마을을 살려줘서 정말 고맙네..!", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 리만 /////////////////////////////////////////////////////////

    public function Milison(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Milison_1") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } else {
                $player->addTitle(" ", "덕분에 환자들을 치료할 수 있었습니다.", 10, 30, 10);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if ($this->udata[$player->getName()]["퀘스트 진행중..."] == "Milison_1") {
                if (!isset($this->monster->idata[$player->getName()]["붉은 손수건"]) || $this->monster->idata[$player->getName()]["붉은 손수건"] < 100) {
                    $this->giveupQuest($player);
                } else {
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 진행중..."]);
                    $this->monster->idata[$player->getName()]["붉은 손수건"] -= 100;
                }
            } elseif (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Milison") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "의사 밀리슨의 물자 1")) {
            $player->addTitle(" ", "저 환자에게는 붕대로 일단 피를 멈춰주시고요..\n잠시만요 바빠서 일반진료는 다음에 와주시겠습니까?", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "의사 밀리슨의 물자 2")) {
            $this->startQuest($player, "Milison_1");
        } elseif (!$this->isQuest($player->getName(), "용병들의 걱정 1")) {
            $this->startQuest($player, "Milison_2");
        } else {
            $player->addTitle(" ", "덕분에 환자들을 치료할 수 있었습니다.", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 정령 /////////////////////////////////////////////////////////

    public function Karen(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Karen_1") {
                if (!isset($this->monster->idata[$player->getName()]["불꽃화살"]) || $this->monster->idata[$player->getName()]["불꽃화살"] < 50) {
                    $this->giveupQuest($player);
                } else {
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
                    $this->monster->idata[$player->getName()]["불꽃화살"] -= 50;
                }
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Karen_3") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } else {
                $player->addTitle(" ", "모험가님 덕에 마을을 지켰습니다.", 10, 30, 10);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Karen") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "용병들의 걱정 1")) {
            $player->addTitle(" ", "붉은 칼의 무리들을 무찌를때가 얼마 남지 않았어.", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "용병들의 걱정 2")) {
            $this->startQuest($player, "Karen_1");
        } elseif (!$this->isQuest($player->getName(), "나그네의 정찰")) {
            $this->startQuest($player, "Karen_2");
        } elseif (!$this->isQuest($player->getName(), "나그네의 보고")) {
            $player->addTitle(" ", "모험가님 덕분인지 붉은 칼의 무리들이 약해졌습니다.", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "돌파")) {
            $this->startQuest($player, "Karen_3");
        } else {
            $player->addTitle(" ", "모험가님 덕에 마을을 지켰습니다.", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 똘이 /////////////////////////////////////////////////////////

    public function Giro(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Giro_1") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Giro_2") {
                if (!isset($this->monster->idata[$player->getName()]["화염 마도서"]) || $this->monster->idata[$player->getName()]["화염 마도서"] < 40) {
                    $this->giveupQuest($player);
                } else {
                    $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
                    $this->monster->idata[$player->getName()]["화염 마도서"] -= 40;
                }
            } else {
                $player->addTitle(" ", "감사합니다..", 10, 30, 10);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Giro") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "나그네의 정찰")) {
            $player->addTitle(" ", "뭔 주술사들이 이렇게 많아..", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "나그네의 퇴로 1")) {
            $this->startQuest($player, "Giro_1");
        } elseif (!$this->isQuest($player->getName(), "나그네의 퇴로 2")) {
            $this->startQuest($player, "Giro_2");
        } elseif (!$this->isQuest($player->getName(), "나그네의 보고")) {
            $this->startQuest($player, "Giro_3");
        } else {
            $player->addTitle(" ", "감사합니다..", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 주모 /////////////////////////////////////////////////////////

    public function Riemann(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Riemann_1") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Riemann_2") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } else {
                $player->addTitle(" ", "덕분에 엄청난 발견을 했어요!", 10, 30, 10);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Riemann") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "촌장의 지인")) {
            $player->addTitle(" ", "저걸 어떻게 들어가지..", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "호수의 비밀")) {
            if ($this->util->getLevel($player->getName()) < 60) {
                $player->addTitle(" ", "정령의 형상이 60레벨이나 하다니;;\n적어도 §c60§f레벨이 필요하겠군..", 10, 30, 10);
                return;
            }
            $this->startQuest($player, "Riemann_1");
        } elseif (!$this->isQuest($player->getName(), "호수로 가는 길 1")) {
            $this->startQuest($player, "Riemann_2");
        } elseif (!$this->isQuest($player->getName(), "호수로 가는 길 2")) {
            $this->startQuest($player, "Riemann_3");
        } else {
            $player->addTitle(" ", "덕분에 엄청난 발견을 했어요!", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 막쇠 /////////////////////////////////////////////////////////

    public function SpiritA(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "SpiritA_1") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "SpiritA_2") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "SpiritA_3") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } else {
                $player->addTitle(" ", "감사합니다.", 10, 30, 10);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "SpiritA") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "호수로 가는 길 2")) {
            $player->addTitle(" ", "...", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "호수의 숨겨진 진실")) {
            $this->startQuest($player, "SpiritA_1");
        } elseif (!$this->isQuest($player->getName(), "되찾으려는 호수")) {
            $this->startQuest($player, "SpiritA_2");
        } elseif (!$this->isQuest($player->getName(), "호수 쟁탈전")) {
            $this->startQuest($player, "SpiritA_3");
        } elseif (!$this->isQuest($player->getName(), "도움을 청하는 외침")) {
            $this->startQuest($player, "SpiritA_4");
        } else {
            $player->addTitle(" ", "감사합니다.", 10, 30, 10);
        }
    }

    ///////////////////////////////////////////////////////// 이방 /////////////////////////////////////////////////////////

    public function Ddol(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Ddol_1") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Ddol") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "도움을 청하는 외침")) {
            $player->addTitle(" ", "으아악! 살려줘!!", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "마을이 이상해요!")) {
            if ($this->util->getLevel($player->getName()) < 70) {
                $player->addTitle(" ", "모험가들이 다 도망갔어요..흑흑..\n§c70§f레벨이 안된다고 포기하시더라고요..", 10, 30, 10);
                return;
            }
            $this->startQuest($player, "Ddol_1");
        } else {
            $player->addTitle(" ", "감사합니다!", 10, 30, 10);
        }
    }

    public function Jumo(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Jumo_1") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Jumo_2") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Jumo") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "마을이 이상해요!")) {
            $player->addTitle(" ", "이러다간 내 주막이..", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "주막 사수 작전")) {
            $this->startQuest($player, "Jumo_1");
        } elseif (!$this->isQuest($player->getName(), "마을의 숨겨진 비밀")) {
            $this->startQuest($player, "Jumo_2");
        } elseif (!$this->isQuest($player->getName(), "막쇠의 부름")) {
            $this->startQuest($player, "Jumo_3");
        } else {
            $player->addTitle(" ", "고맙네..", 10, 30, 10);
        }
    }

    public function Makshoe(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            if ($this->udata[$player->getName()]["퀘스트 완료!"] == "Makshoe_1") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            } elseif ($this->udata[$player->getName()]["퀘스트 완료!"] == "Makshoe_3") {
                $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 완료!"]);
            }
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Makshoe") !== false) {
                if ($this->udata[$player->getName()]["퀘스트 진행중..."] == "Makshoe_2") {
                    if (!isset($this->monster->idata[$player->getName()]["호랑이 탈"]) || $this->monster->idata[$player->getName()]["호랑이 탈"] < 20 || !isset($this->monster->idata[$player->getName()]["여우의 탈"]) || $this->monster->idata[$player->getName()]["여우의 탈"] < 20) {
                        $this->giveupQuest($player);
                    } else {
                        $this->monster->idata[$player->getName()]["호랑이 탈"] -= 20;
                        $this->monster->idata[$player->getName()]["여우의 탈"] -= 20;
                        $this->clearQuest($player, $this->udata[$player->getName()]["퀘스트 진행중..."]);
                    }
                } else {
                    $this->giveupQuest($player);
                }
            }
        } else if (!$this->isQuest($player->getName(), "마을의 숨겨진 비밀")) {
            $player->addTitle(" ", "들키진 않겠지...", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "막쇠의 고발")) {
            $this->startQuest($player, "Makshoe_1");
        } elseif (!$this->isQuest($player->getName(), "마을 이방의 증언")) {
            $player->addTitle(" ", "고맙네!", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "막쇠의 결심")) {
            $this->startQuest($player, "Makshoe_2");
        } elseif (!$this->isQuest($player->getName(), "사또의 비밀")) {
            $this->startQuest($player, "Makshoe_3");
        } else {
            $player->addTitle(" ", "고맙네..", 10, 30, 10);
        }
    }

    public function Ibang(Player $player) {
        if (isset($this->udata[$player->getName()]["퀘스트 듣는중..."]))
            return;
        else if (isset($this->udata[$player->getName()]["퀘스트 완료!"])) {
            return;
        } else if (isset($this->udata[$player->getName()]["퀘스트 진행중..."])) {
            if (stripos($this->udata[$player->getName()]["퀘스트 진행중..."], "Ibang") !== false)
                $this->giveupQuest($player);
        } else if (!$this->isQuest($player->getName(), "막쇠의 고발")) {
            $player->addTitle(" ", "흐음.....", 10, 30, 10);
        } elseif (!$this->isQuest($player->getName(), "마을 이방의 증언")) {
            $this->startQuest($player, "Ibang_1");
        } else {
            $player->addTitle(" ", "고맙네..", 10, 30, 10);
        }
    }

    public function Sound(Player $player) {
        $pk = new LevelSoundEventPacket();
        $pk->sound = 79;
        $pk->pitch = 1;
        $pk->extraData = -1;
        $pk->isBabyMob = false;
        $pk->disableRelativeVolume = false;
        $pk->position = $player->asVector3();
        $player->sendDataPacket($pk);
    }

    public function job(Player $player) {
        $form = $this->ui->SimpleForm(function (Player $player, array $data) {
            if (!is_numeric($data[0])) $this->job($player);
            if ($data[0] == 0) $this->check($player, "나이트");
            if ($data[0] == 1) $this->check($player, "아처");
            if ($data[0] == 2) $this->check($player, "위자드");
            if ($data[0] == 3) $this->check($player, "프리스트");
        });
        $form->setTitle("레츠 기릿!");
        $form->setContent("직업을 선택하시게!");
        $form->addButton("§l나이트");
        $form->addButton("§l아처");
        $form->addButton("§l위자드");
        $form->addButton("§l프리스트");
        $form->sendToPlayer($player);
    }

    public function check(Player $player, string $job) {
        $this->j[$player->getName()] = $job;
        $form = $this->ui->ModalForm(function (Player $player, array $data) {
            if ($data[0] == true) {
                $player->addTitle("{$this->j[$player->getName()]}(으)로 전직하셨습니다!", "축하드립니다!");
                $this->util->setJob($player->getName(), $this->j[$player->getName()]);
                if ($this->util->getJob($player->getName()) == "나이트") {
                    $item = $this->equipments->getEquipment("견습용 검", 1);
                } elseif ($this->util->getJob($player->getName()) == "아처") {
                    $item = $this->equipments->getEquipment("견습용 활", 1);
                } elseif ($this->util->getJob($player->getName()) == "위자드") {
                    $item = $this->equipments->getEquipment("견습용 스태프", 1);
                } elseif ($this->util->getJob($player->getName()) == "프리스트") {
                    $item = $this->equipments->getEquipment("견습용 스태프", 1);
                }
                foreach ($item as $key => $value) {
                    $player->getInventory()->addItem($value);
                }
                $this->udata[$player->getName()]["클리어"]["레츠 기릿!"] = "true";
                $this->save();
                unset($this->j[$player->getName()]);
            } else {
                unset($this->j[$player->getName()]);
                $this->job($player);
            }
        });
        $form->setTitle("레츠 기릿!");
        $form->setContent("\n§f정말로 [ {$job} ]을(를) 선택하시겠습니까?");
        $form->setButton1("§l[예]");
        $form->setButton2("§l[아니오]");
        $form->sendToPlayer($player);
    }
}
