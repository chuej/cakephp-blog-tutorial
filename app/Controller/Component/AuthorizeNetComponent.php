<?php
/**
 * The AuthorizeNet PHP SDK. Include this file in your project.
 *
 * @package AuthorizeNet
 */
require dirname(__FILE__) . '/lib/shared/AuthorizeNetRequest.php';
require dirname(__FILE__) . '/lib/shared/AuthorizeNetTypes.php';
require dirname(__FILE__) . '/lib/shared/AuthorizeNetXMLResponse.php';
require dirname(__FILE__) . '/lib/shared/AuthorizeNetResponse.php';
require dirname(__FILE__) . '/lib/AuthorizeNetAIM.php';
require dirname(__FILE__) . '/lib/AuthorizeNetARB.php';
require dirname(__FILE__) . '/lib/AuthorizeNetCIM.php';
require dirname(__FILE__) . '/lib/AuthorizeNetSIM.php';
require dirname(__FILE__) . '/lib/AuthorizeNetDPM.php';
require dirname(__FILE__) . '/lib/AuthorizeNetTD.php';
require dirname(__FILE__) . '/lib/AuthorizeNetCP.php';

if (class_exists("SoapClient")) {
    require dirname(__FILE__) . '/lib/AuthorizeNetSOAP.php';
}
/**
 * Exception class for AuthorizeNet PHP SDK.
 *
 * @package AuthorizeNet
 */
class AuthorizeNetComponent extends Object
{
	private $transaction=null;

	function transaction($amount,$card_num,$exp_date,$ch_auth_val=null) {
		if($this->trans==null) {
			echo 'Authorize.Net merchant undefined!';
			return;
		}
		else{
			$this->trans->amount = $amount;
			$this->trans->card_num = $card_num;
			$this->trans->exp_date = $exp_date;
			if($ch_auth_val!=null){
				$this->trans->cardholder_authentication_value = $ch_auth_val;
			}
			return $this->trans->authorizeAndCapture();
		}
	}

	function merchant($loginid=null,$transkey=null) {
		$this->trans = new AuthorizeNetAIM($loginid,$transkey);
	}
}
