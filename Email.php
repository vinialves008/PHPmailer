<?php 
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;

/**
* 
*/
class Email extends PHPMailer
{
	private $contato = 'Formatech 2018';
	private $username = "formatechmailer@gmail.com";
	private $password = "email2018";

	function __construct()
	{
		$this->isSMTP();
		$this->SMTPDebug = 0;
		$this->Host = "smtp.gmail.com";
		$this->Port = 587;
		$this->SMTPSecure = 'tls';
		$this->SMTPAuth = true;
		$this->Username = $this->username;
		$this->Password = $this->password;
		$this->setFrom($this->username, $this->contato);
		$this->AltBody = 'Seu email não oferece suporte ao email enviado';
	}

	public function enviar($data = array())
	{
		if(is_array($data['emailsend'])){
			foreach ($data['emailsend'] as $key => $value) {
				$this->addAddress($value);
			}
		}else{
			$this->addAddress($data['emailsend']);
		}
		$this->Subject = $data['subject'];
		$this->msgHTML(file_get_contents($data['contents'].'.html'), __DIR__);
		
		return $this->send();
	}
}
 ?>