<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); 
$arComponentDescription = array(
	"NAME" => "Кол-во активных пользователей",
	"DESCRIPTION" =>"Выводим группы пользователей и кол-во активных в ней",
	"PATH" => array(
		"ID" => "svk_components",
		"NAME" =>"SVK_COMPONENTS",
		"CHILD" => array(
			"ID" => "curactive",
			"NAME" =>"Пользователи"
			)
		),
	);
?>