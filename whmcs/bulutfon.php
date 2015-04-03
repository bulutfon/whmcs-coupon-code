 <?php
 
 define("CLIENTAREA",true);
 //define("FORCESSL",true); // Uncomment to force the page to use https://
 
require("init.php");

$ca = new WHMCS_ClientArea();

$ca->setPageTitle("Bulutfon Kupon Kodunuz");

$ca->addToBreadCrumb('index.php',$whmcs->get_lang('globalsystemname'));
$ca->addToBreadCrumb('bulutfon.php','Bulutfon Kupon Kodunuz');

$ca->initPage();
 
$ca->requireLogin(); 
 
if ($ca->isLoggedIn()) {
    // Bulutfon indirim kuponlarının bulunduğu json dosyasının yolunu
    // bu kısımdan belirtmeniz gerekir. Dizinin internet üzerinden
    // erişilemediğinden emin olmanız gerekir örneğin cPanel bir sunucu
    // üzerinde public_html gerisinde bir dizine bu dosyayı göndermeli
    // ve dosyayı yazılabilir olarak bırakmalısınız.
    $file = "/json/dosyasi/dizinini/belirtin/bulutfon.json";
    
    $code = false;
    
    if (file_exists($file))
    {
        $userkey =false;

        $ca->assign('message',false);

        $content = file_get_contents($file);

        $array = json_decode($content);

        if(count($array)!=0)
        {
            $pointer = false;

            $id = false;

            foreach($array as $key=>$value)
            {
                if($value->userid=="null"){ $userkey = $value->key; $id=$key;}
                
                if($value->userid==$clientsdetails['id'])
                {
                    $userkey = $value->key;

                    $pointer = true;

                    break;
                }
            }
                
            if(!$pointer){
                if($userkey==false)
                {
                    $ca->assign('message',"Maalesef bütün Bulutfon kodları tükendi.");
                }else{
                    $array[$id]->userid = $clientsdetails['id'];

                    file_put_contents($file,json_encode($array));
                }               
            } 
                
        }else {

            $ca->assign('message',"Maalesef bütün Bulutfon kodları tükendi.");

        }

    }
    $ca->assign('userkey',$userkey);
 } 
// Bu kısımda bulutfon için yapmış olduğunuz bir tema var ise bunu belirtemniz gerekir
// özel bir whmcs teması kullanıyorsanız bir alt sayfanın tpl dosyasını clone ederek
// editleyebilirsiniz.
$ca->setTemplate('bulutfon');

$ca->output();
 
?>