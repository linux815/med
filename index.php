<?php /**
 * Главный входной файл, в котором подгружаются все классы.
 * ================
 * $_GET['c'] - содержит имя загружаемого контроллера.
 */error_reporting (E_ALL ^ E_NOTICE); // Для Unixdate_default_timezone_set('Asia/Krasnoyarsk');include_once('include/class_view.php');include_once('include/class_page.php');include_once('include/class_login.php');include_once('include/class_editpage.php');include_once('include/class_addpage.php');include_once('include/class_vozvrat.php');
include_once('include/class_otrabotka.php');include_once('include/class_editprotocol.php');include_once('include/class_editprotocol2.php');include_once('include/class_printlist.php');include_once('include/class_protocol.php');include_once('include/class_printpriz.php');include_once('include/class_zaloby.php');include_once('include/class_find.php');include_once('include/class_reg.php');include_once('include/class_regkons.php');include_once('include/class_control.php');include_once('include/class_printgaloba.php');include_once('include/class_obsledovanie.php');include_once('include/class_edit_obsledovanie.php');include_once('include/class_mail.php');include_once('include/class_editsablon.php');include_once('include/class_sablon.php');include_once 'include/class_dolg.php';include_once 'include/class_settings.php';include_once 'include/class_findprotocol.php';include_once 'include/class_vozvrat_osp.php';include_once 'include/class_printvozvrat.php';include_once 'include/class_mail2.php';include_once 'include/class_vipiska.php';include_once 'include/class_editstate.php';include_once 'include/class_print_table.php';// Если $_GET['c'] равен имени нашего контроллера, то загружаем данный класс.switch (@$_GET['c']){case 'editpage':	$controller = new C_EditPage();	break;	case 'page':	$controller = new C_Page();	break;	case 'editstate':
	$controller = new C_EditState();
	break;	case 'auth':	$controller = new C_Auth();		break;	case 'addpage':	$controller = new C_AddPage();		break;		case 'vozvrat':	$controller = new C_Vozvrat();	break;case 'otrabotka':	$controller = new C_Otrabotka();	break;		case 'editprotocol':	$controller = new C_EditProtocol();	break;case 'printlist':	$controller = new C_PrintList();	break;	case 'protocol':	$controller = new C_Protocol();	break;		case 'printpriz':	$controller = new C_PrintPriz();	break;case 'printgaloba':
	$controller = new C_PrintGaloba();
	break;
case 'print_table':
	$controller = new C_Print_Table();
	break;	case 'editprotocol2':	$controller = new C_EditProtocol2();	break;	case 'zaloby':	$controller = new C_Zaloby();	break;	case 'find':	$controller = new C_Find();	break;	case 'reg':	$controller = new C_Reg();	break;	case 'regkons':
	$controller = new C_RegKons();
	break;	case 'control':	$controller = new C_Control();	break;	case 'obsledovanie':
	$controller = new C_Obsledovanie();
	break;	case 'edit_obsledovanie':	$controller = new C_EditObsledovanie();	break;	case 'mail':
	$controller = new C_Mail();
	break;case 'mail2':
	$controller = new C_Mail2();
	break;	case 'vipiska':
	$controller = new C_Vipiska();
	break;case 'editsablon':	$controller = new C_EditSablon();	break;		case 'sablon':	$controller = new C_Sablon();	break;case 'dolg':
	$controller = new C_Dolg();
	break;case 'settings':
	$controller = new C_Settings();
	break;	case 'findprotocol':
	$controller = new C_FindProtocol();
	break;	case 'vozvrat_osp':
	$controller = new C_VozvratOsp();
	break;	case 'printvozvrat':
	$controller = new C_PrintVozvrat();
	break;	default:		$controller = new C_View();}$controller->Request();