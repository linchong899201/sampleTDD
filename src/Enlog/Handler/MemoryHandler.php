<?php 

namespace Enlog\Handler;

class MemoryHandler implements HandlerInterface
{
	protected $store = array();

	public function write($timestamp, $message)
	{
		$this->store[] = sprintf('[%s] %s', $timestamp,$message);
	}

	public function getEntries()
	{
		return $this->store;
	}

}


 ?>