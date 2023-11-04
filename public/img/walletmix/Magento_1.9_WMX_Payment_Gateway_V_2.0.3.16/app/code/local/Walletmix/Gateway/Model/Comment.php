<?php



class Walletmix_Gateway_Model_Comment

{

public function getCommentText(){ 

        

		//$home_url = Mage::helper('core/url')->getHomeUrl();
		$pattern='/index.php\//';
		$home_url=preg_replace($pattern,'',Mage::getBaseUrl());

		return '<span style="background-color:#454545;color:#fff; padding:5px 10px;">'.$home_url.'</span><br/>copy this url and mail to support@walletmix.com.';

} 



}