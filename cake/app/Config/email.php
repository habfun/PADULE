<?php
/**
 * This is email configuration file.
 *
 * Use it to configure email transports of Cake.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 2.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * In this file you set up your send email details.
 *
 * @package       cake.config
 */
/**
 * Email configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * transport => The name of a supported transport; valid options are as follows:
 *		Mail 		- Send using PHP mail function
 *		Smtp		- Send using SMTP
 *		Debug		- Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email.  Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * from =>
 * The origin email. See CakeEmail::from() about the valid values
 *
 */
class EmailConfig {

	public $default = array(
		'transport' => 'Smtp',
		'from' => 'padule@padule.me',
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	public $smtp = array(
		'transport' => 'Smtp',
		'from' => array('site@localhost' => 'My Site'),
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => false,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $fast = array(
		'from' => 'padule@padule.me',
		'sender' => null,
		'to' => null,
		'cc' => null,
		'bcc' => 'padule@outlook.com',
		'replyTo' => 'padule@outlook.com',
		'readReceipt' => null,
		'returnPath' => null,
		'messageId' => true,
		'subject' => 'PADULE 仮登録完了メール',
		'message' => null,
		'headers' => null,
		'viewRender' => null,
		'template' => false,
		'layout' => false,
		'viewVars' => null,
		'attachments' => null,
		'emailFormat' => null,
		'transport' => 'Smtp',
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $regist = array(
		'from' => 'padule@padule.me',
		'sender' => null,
		'to' => null,
		'cc' => null,
		'bcc' => 'padule@outlook.com',
		'replyTo' => 'padule@outlook.com',
		'subject' => '【アカウント発行のお知らせ】Padule事務局',
		'sendAs' => 'text',
		'template' => 'regist',
	);

	public $complete = array(
		'from' => 'padule@padule.me',
		'sender' => null,
		'to' => null,
		'cc' => null,
		'bcc' => 'padule@outlook.com',
		'replyTo' => 'padule@outlook.com',
		'subject' => 'メール文⑸　【面接日程が調整されました】Padule事務局',
		'sendAs' => 'text',
		'template' => 'regist',
	);
}
