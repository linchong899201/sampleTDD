<?php 

use \Enlog\Handler\MemoryHandler;

class MemoryHandlerTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var $handler \Enlog\Handler\MemoryHandler
	 */
	protected $handler;
	public function setUp()
	{
		$this->handler = new MemoryHandler();
	}

	public function testImplementsHandlerInterface()
	{
		$this->assertInstanceOf('\Enlog\Handler\HandlerInterface',$this->handler);
	}

	public function testWriteToInternal()
	{
		$this->handler->write('Tue, 07 Nov 2017 10:28:38 +0800','Hello World!');
		$this->assertInternalType('array',$this->handler->getEntries());
		$this->assertCount(1,$this->handler->getEntries());
		$this->assertEquals(array('[Tue, 07 Nov 2017 10:28:38 +0800] Hello World!'),$this->handler->getEntries());

		$this->handler->write('Sat, 15 Sep 2017 10:28:38 +0800','Hello World again!');
		$this->assertCount(2,$this->handler->getEntries());
		$this->assertEquals(
			array(
				'[Tue, 07 Nov 2017 10:28:38 +0800] Hello World!',
				'[Sat, 15 Sep 2017 10:28:38 +0800] Hello World again!'
			),$this->handler->getEntries());
	}
}

 ?>