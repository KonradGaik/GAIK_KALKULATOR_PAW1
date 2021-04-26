<?php 

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

class CalcCtrl{
private $msgs;
private $form;
private $result;

public function __construct(){
$this->msgs = new Messages();
$this->form = new CalcForm();
$this->result = new CalcResult();
}

public function getParams(){
$this -> form->x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
$this -> form->y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
$this -> form->z = isset($_REQUEST['z']) ? $_REQUEST['z'] : null;
$this -> form->period_of_time = isset($_REQUEST['period_of_time']) ? $_REQUEST['period_of_time'] : null; //per = period_of_time
}

public function validate(){
    if (! (isset ( $this->form->x ) && isset ( $this->form->y ) && isset ( $this->form->z )&& isset ( $this->form->period_of_time ))){
return false;
    }
    if($this->form->x==""){
        $this->msgs->addError('Nie podano kwoty kredytu.');
    }

    if ($this->form->y==""){
        $this->msgs->addError('Nie podano czasu trwania kredytu.');}

    if  ($this->form->z==""){
        $this->msgs->addError('Nie podano oprocentowania kredytu.');
    }
        if(! $this->msgs->isError()){
            if(!is_numeric($this->form->x)){
                $this->msgs->addError('Kwota kredytu nie jest liczba calkowita. ');}
                if(!is_numeric($this->form->x)){
                    $this->msgs->addError('Czas trwania kredytu nie jest liczba calkowita. ');}
                    if(!is_numeric($this->form->z)){
                        $this->msgs->addError('Oprocentowanie kredytu nie jest liczba calkowita.');
                    }    
            }
            return $this->msgs->isError();
        }
    


public function process(){
$this ->getParams();
if($this->validate()){
$this->form->x = isset($_REQUEST['x']) ? $_REQUEST ['x'] :null;
$this->form->y = isset($_REQUEST['y']) ? $_REQUEST ['y'] :null;
$this->form->z = isset($_REQUEST['z']) ? $_REQUEST ['z'] :null;
$this->form->period_of_time = isset($_REQUEST['period_of_time']) ? $_REQUEST ['period_of_time'] :null;
$this->msgs->addInfo('Parametry poprawne.');
}

//obliczanie
switch($this->form->period_of_time){
case 'years';
$this->result->result = (($this->form->x)*(1+($this->form->z))*((($this->form->y)/12)/100))/($this->form->y);
$this->result->time = 'Roczna ';
$this->result->interest = ($this->form->x)*(1+(($this->form->z)*($this->form->y)/100)-($this->form->x)) ;
break;

case 'months';
$this->result->result = ($this->form->x)*((1+($this->form->z))*(($this->form->y)/12)/100);
$this->result->time = 'Miesieczna ';
$this->result->interest = ($this->form->x*(1+($this->form->z*($this->form->y/(12))))-$this->form->x);
break;
}

}

$database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'name',
	'server' => 'localhost',
	'username' => 'host',
	'password' => '',
 
	// [optional]
	'charset' => 'utf8mb4',
	'collation' => 'utf8mb4_polish_ci',
	'port' => 8080,
 
	// [optional] Table prefix
	'prefix' => 'PREFIX_',
 
	// [optional] Enable logging (Logging is disabled by default for better performance)
	'logging' => true,
 
	// [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
	'option' => [
		PDO::ATTR_CASE => PDO::CASE_NATURAL
	]
]);
 
$database->insert("account", [
	"user_name" => "foo",
	"email" => "foo@bar.com"
]);


public function generateView(){    
    {global $conf;	
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Kalkulator');
		$smarty->assign('page_description','Kalkulator kredytowy w PHP');
		$smarty->assign('page_header','Obiekty w PHP');
				
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/CalcView.html');
	}
}
}

?>