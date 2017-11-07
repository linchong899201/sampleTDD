<?php 

namespace Enlog;

use \Enlog\Handler\HandlerInterface;

class Logger
{
	protected $handlers = array();

	public function registerHandler($name, HandlerInterface $handler)
	{
		$this->handlers[$name] = $handler;
	}

	public function getHandlers($name)
	{
		return $this->handlers[$name];
	}

	public function log($message)
	{
		$date = date('r');
		foreach($this->handlers as $handler) {
			$handler->write($date,$message);
		}
	}
}

 ?>