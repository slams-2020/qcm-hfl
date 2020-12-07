<?php
return array(
	"siteUrl"=>"http://127.0.0.1:8090/",
	"database"=>array(
			"default"=>array(
					"type"=>"mysql",
					"dbName"=>"qcm-hfl",
					"serverName"=>"127.0.0.1",
					"port"=>3306,
					"user"=>"root",
					"password"=>"",
					"options"=>array(),
					"cache"=>false,
					"wrapper"=>"Ubiquity\\db\\providers\\pdo\\PDOWrapper"
					),
			"qcm"=>array(
					"wrapper"=>"Ubiquity\\db\\providers\\pdo\\PDOWrapper",
					"type"=>"mysql",
					"dbName"=>"qcm",
					"serverName"=>"127.0.0.1",
					"port"=>3306,
					"options"=>array(),
					"user"=>"root",
					"password"=>"",
					"cache"=>false
					)
			),
	"sessionName"=>"s5fc8b6f693765",
	"namespaces"=>array(),
	"templateEngine"=>"Ubiquity\\views\\engine\\Twig",
	"templateEngineOptions"=>array(
			"cache"=>false
			),
	"test"=>false,
	"debug"=>true,
	"logger"=>function (){return new \Ubiquity\log\libraries\UMonolog(array (
  'host' => '127.0.0.1',
  'port' => 8090,
  'sessionName' => 's5fc8b6f693765',
)['sessionName'],\Monolog\Logger::INFO);},
	"di"=>array(
			"@exec"=>array("jquery"=>function ($controller){
						return \Ubiquity\core\Framework::diSemantic($controller);
					})
			),
	"cache"=>array(
			"directory"=>"cache/",
			"system"=>"Ubiquity\\cache\\system\\ArrayCache",
			"params"=>array()
			),
	"mvcNS"=>array(
			"models"=>"models",
			"controllers"=>"controllers",
			"rest"=>""
			),
	"isRest"=>function (){
			return \Ubiquity\utils\http\URequest::getUrlParts()[0]==="rest";
		}
	);