<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$rsGroups = CGroup::GetList(($by="id"), ($order="asc")); // выбираем группы
while($ar_users = $rsGroups->GetNext()) :
    $arrGrouplist[]=['ID'=> $ar_users['ID'], 'NAME'=>$ar_users['NAME']];
endwhile;

foreach ($arrGrouplist as $key) :
	$flag = 0;
	$active = CUser::GetList(($by="ID"), ($order="ASC"),
	           array(
	                'ACTIVE' => 'Y',
					'GROUPS_ID' => $key['ID']
	            )
	        );

	while($arUser = $active->Fetch()) {
	    $flag++;
	}

	$arrGrouplist[]=['ID'=> $key['ID'], 'NAME'=>$key['NAME'], 'NUM_ACTIVE'=>$flag];

endforeach;

foreach ($arrGrouplist as $groups) :
	if ($groups['NUM_ACTIVE'] != 0 ) :
		?>
			<p>
				<? if ($arResult['USR_ID'] == 'Y'): ?>
				<i>[<?=$groups['ID']?>]</i>
				<?endif;?> 
				<?=$groups['NAME']?> (активных: <?=$groups['NUM_ACTIVE']?>)</p>
		<?
	endif;
endforeach;

?>