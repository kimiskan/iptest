<?
//Пролог без отображения для использования классов и функций битрикса
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
/**
 * Функция получения экземпляра класса
 */
function GetEntityDataClass($HlBlockId) {
    if (empty($HlBlockId) || $HlBlockId < 1)
    {
        return false;
    }
    $hlblock = HLBT::getById($HlBlockId)->fetch();   
    $entity = HLBT::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    return $entity_data_class;
}
//Получаем данные ajax
$ip = $_POST['ip'];
//Регулярное выражение $ip
$regip = '/^(25[0-5]|2[0-4][0-9]|[0-1][0-9]{2}|[0-9]{2}|[0-9])(\.(25[0-5]|2[0-4][0-9]|[0-1][0-9]{2}|[0-9]{2}|[0-9])){3}$/';
$check = preg_match($regip, $ip);
//Передаем ip ресурсру для получения местоположения
$homepage = file_get_contents('http://ip-api.com/json/'.$ip.'?lang=ru');
if ($check){
    $json_str = json_decode($homepage, true);
	if ($json_str["status"] = 'success'):
?> <div class="alert alert-primary" role="alert"> 
		<ul>
			<li>Страна: <?=$json_str["country"]?></li>
			<li>Город: <?=$json_str["city"]?></li>
			<li>IP <?=$json_str["query"]?></li>
		</ul>
	</div> 
<?
	endif;
}  

//Записываем массив данных в hl блок
$date_serv = date( "d.m.Y H:i:s" ); 		//Дата сервера
$ip_client = $_SERVER['REMOTE_ADDR'];		//Получаем IP клиента
const MY_HL_BLOCK_ID = 4;
CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass(MY_HL_BLOCK_ID);
$result = $entity_data_class::add(array(
		'UF_CITY'       => $json_str["city"],
		'UF_COUNRTY'	=> $json_str["country"],
		'UF_IP'	 		=> $json_str["query"],
		'UF_CHECK'      => $json_str["status"],
		'UF_DATE'		=> $date_serv,
		'UF_IP_CLIENT'	=> $ip_client
   ));

//Получаем все элементы из 4 блока
$rsData = $entity_data_class::getList(array(
   'select' => array('*')
));
?>
<div class="table-responsive">
	<table class="table">
	  <thead>
		<tr>
		  <th scope="col">№</th>
		  <th scope="col">IP формы</th>
		  <th scope="col">Дата записи</th>
		  <th scope="col">Страна</th>
		  <th scope="col">Город</th>
		  <th scope="col">IP клиента</th>
		</tr>
	  </thead>
	  <tbody>
<?
$i = 1;
while($el = $rsData->fetch()){
?>
    <tr>
      <th scope="row"><?echo $i;?></th>
      <td><?echo $el['UF_IP'];?></td>
      <td><?echo $el['UF_DATE'];?></td>
      <td><?echo $el['UF_COUNRTY'];?></td>
      <td><?echo $el['UF_CITY'];?></td>
      <td><?echo $el['UF_IP_CLIENT'];?></td>
    </tr>
<?
$i++;
};
?>
	  </tbody>
	</table>
</div>




