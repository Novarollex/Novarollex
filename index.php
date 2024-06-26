<?php
    header('Content-Type: text/html; charset=utf-8');
// подключаемся к API
require_once("vendor/autoload.php");
// создаем переменную бота
$token = "7450254999:AAFMPwBwsumKqDwQ7x3iM3sreGMnsUoD3jo";
$bot = new \TelegramBot\Api\Client($token);

$bot->command('start', function ($message) use ($bot) {
	$answer = 'Добро пожаловать!';	
	$bot->sendMessage($message->getChat()->getId(), $answer);	
});

// помощь
$bot->command('help', function ($message) use ($bot) {	
	$answer = 'Команды: /help - помощь';
	$bot->sendMessage($message->getChat()->getId(), $answer);	
});


$bot->command('keyb', function ($message) use ($bot) {
$keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(array(array("Курс валют","Конвертер валют")),true); // true for one-time keyboard
$Message="Hello";
$bot->sendMessage($message->getChat()->getId(), $Message, null, false, null, $keyboard);
});

$bot->on(function($Update) use ($bot) {
	$message = $Update->getMessage();	
	$mtext = $message->getText();	
	if (mb_stripos($mtext,"Курс валют") !== false) {
		$bot->sendMessage($message->getChat()->getId(), "USD: 86.04, EUR: 93.3, CNY: 11.8");	
	}else if((mb_stripos($mtext,"USD") !== false) || (mb_stripos($mtext,"CNY") !== false) || (mb_stripos($mtext,"EUR") !== false)) {

	    $space = strpos($mtext," ");
	    //Во что конвертить
	    $after = substr($mtext,$space+1,3);
	    
	    //До "во что конвертить"
	    $befr = substr($mtext,0,$space);
	    
	    //Из чего конвертить
	    $aft = substr($befr,strlen($befr)-3,strlen($befr));
	    
	    //Кол-во денег
	    $money = substr($befr,0,-3);
	    
	    $USD = "USD";
	    $EUR = "EUR";
	    $CNY = "CNY";
	    $RUB = "RUB";
	    
	   if($after == $EUR){
	       if($aft == $USD){$curs = 0.93103; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(),$money." Долларов в евро: ".round($itog,2)." евро.");}else
	       if($aft == $EUR){$curs = 1; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(), $money." Евро в евро: ".round($itog,2)." евро.");}else
	       if($aft == $RUB){$curs = 0.011224; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(), $money." Рублей в евро: ".round($itog,2)." евро.");}else 
	       if($aft == $CNY){$curs = 0.128241; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(), $money." Юаней в евро: ".round($itog,2)." евро.");}}else 
	   if($after == $USD){
	       if($aft == $USD){$curs = 1; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(), $money." Долларов в долларах: ".round($itog,2)." долларов.");}else
	       if($aft == $EUR){$curs = 1.07; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(), $money." Евро в долларах: ".round($itog,2)." долларов.");}else
	       if($aft == $RUB){$curs = 0.012102; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(), $money." Рублей в долларах: ".round($itog,2)." долларов.");}else 
	       if($aft == $CNY){$curs = 0.137741; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(), $money." Юаней в долларах: ".round($itog,2)." долларов.");}}else
	   if($after == $CNY){
	       if($aft == $USD){$curs = 0.137741; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(), $money." Долларов в юанях: ".round($itog,2)." юаней.");}else
	       if($aft == $EUR){$curs = 7.8; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(), $money." Евро в юанях: ".round($itog,2)." юанях.");}else 
	       if($aft == $RUB){$curs = 0.089564; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(), $money." Рублей в юанях: ".round($itog,2)." юанях.");}else 
	       if($aft == $CNY){$curs = 1; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(), $money." Юаней в юанях: ".round($itog,2)." юанях.");}}else
	   if($after == $RUB){
	       if($aft == $USD){$curs = 82.63; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(), $money." Долларов в рублях: ".round($itog,2)." рублей.");}else
	       if($aft == $EUR){$curs = 89.09; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(), $money." Евро в рублях: ".round($itog,2)." рублей.");}else 
	       if($aft == $RUB){$curs = 1; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(), $money." Евро в рублях: ".round($itog,2)." рублей.");}else 
	       if($aft == $CNY){$curs = 11.17; $itog = $money * $curs; $bot->sendMessage($message->getChat()->getId(), $money." Юаней в рублях: ".round($itog,2)." рублей.");}};
}}, function($message) use ($name) {	
	return true; // когда тут true - команда проходит	
});
// запускаем обработку
$bot->run();
?>