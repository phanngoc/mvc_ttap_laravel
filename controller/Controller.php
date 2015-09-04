<?php

class Controller
{
	protected $_controller;
	protected $_view;
	
	public function __construct()
	{
		$this->_controller = ucwords(__CLASS__);
	}
	
	protected function _setView($viewName)
	{
		$this->_view = new View(HOME . DS . 'view' . DS . $viewName . '.tpl');
	}
}
