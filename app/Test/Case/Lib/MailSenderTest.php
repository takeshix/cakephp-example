<?php
App::uses('MailSender', 'Lib');
App::uses('TwigEmail', 'TwigView.Lib');
// App::uses('AbstractTransport', 'Network/Email');
App::uses('DebugTransport', 'Network/Email');

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-05-31 at 23:25:37.
 */
class MailSenderTest extends CakeTestCase //PHPUnit_Framework_TestCase
{
	/**
	 * @var MailSender
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	public function setUp()
	{
		// EMail クラスの mock を作成
		// $this->mail = $mail = $this->getMock('CakeEmail', array('transportClass'));
		$this->mail = $mail = $this->getMockBuilder('TwigEmail')
			->disableOriginalConstructor() // TwigEmail の場合
			->setMethods(array("transportClass"))
			->getMock();
		$mail
			->expects($this->any())
			->method('transportClass')
			->will($this->returnValue(new DebugTransport()));
		$mail->config("default");
		// TwigEmail の場合必要
		$klass = new ReflectionClass('TwigEmail');
		$prop = $klass->getProperty("_appCharset");
		$prop->setAccessible(true);
		$prop->setValue($mail, Configure::read('App.encoding'));

		// _mailer の返却オブジェクトを mock に差し替える
		$this->object = $this->getMock('MailSender', array('_mailer'));
		$this->object
			->expects($this->any())
			->method('_mailer')
			->will($this->returnValue($mail));
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	public function tearDown()
	{
	}

	/**
	 * @covers MailSender::send
	 * @todo   Implement testSend().
	 */
	public function testSend()
	{
		$this->object->send();

		$this->assertEquals(array(
			'konno@coosy.co.jp' => 'konno@coosy.co.jp', 
		), $this->mail->to());
		$this->assertEquals('test', $this->mail->subject());
		$this->assertNotEmpty($this->mail->message(TwigEmail::MESSAGE_TEXT));
		$this->assertEmpty($this->mail->message(TwigEmail::MESSAGE_HTML));
	}
}