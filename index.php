<?php 
 * Главный входной файл, в котором подгружаются все классы.
 * ================
 * $_GET['c'] - содержит имя загружаемого контроллера.
 */
include_once('include/class_otrabotka.php');
	$controller = new C_EditState();
	break;	
	$controller = new C_PrintGaloba();
	break;
case 'print_table':
	$controller = new C_Print_Table();
	break;	
	$controller = new C_RegKons();
	break;	
	$controller = new C_Obsledovanie();
	break;	
	$controller = new C_Mail();
	break;
	$controller = new C_Mail2();
	break;	
	$controller = new C_Vipiska();
	break;
	$controller = new C_Dolg();
	break;
	$controller = new C_Settings();
	break;	
	$controller = new C_FindProtocol();
	break;	
	$controller = new C_VozvratOsp();
	break;	
	$controller = new C_PrintVozvrat();
	break;	