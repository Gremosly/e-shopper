<?php

class Router
{

	private $routes;

	public function __construct()
	{
		$routesPath=ROOT.'/config/routes.php';
		$this->routes=include($routesPath);
	}

	//returns request URL string
	private function getURI()
	{
		if(!empty($_SERVER['REQUEST_URI'])){
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run()
	{
		// Получить строку запроса
		$uri=$this->getURI();


		// Проверить наличие такого запросов в  routes.php
		foreach ($this->routes as $uriPattern => $path){

			// Если есть совпадение, определить какой контроллер
			// и  action обрабатывают запрос
			if(preg_match("~$uriPattern~", $uri)){

				// Получаем внутренний путь из внешнего согласно правилу
				$internalRoute=preg_replace("~$uriPattern~", $path, $uri);
				
				
				$segments=explode('/', $internalRoute);
				

				$controllerName=array_shift($segments)."Controller";
				$controllerName=ucfirst($controllerName);

				$actionName="action".ucfirst(array_shift($segments));

				$paramaters=$segments;


				// Подключить файл класса контролера
				$controllerFile=ROOT.'/controllers/'.
							$controllerName.'.php';

				if(file_exists($controllerFile)){
					include_once($controllerFile);
				}

				// Создать обьект, вызвать метод(т.е.action)
				$controllerObject=new $controllerName;

				$result=call_user_func_array(array($controllerObject,$actionName), $paramaters);


				if($result != null){
					break;
				}
			}
		}
	}


	
}



?>