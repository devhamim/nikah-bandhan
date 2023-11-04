<?php
	
	/*
		
		Walletmix Gateway Payment Controller
		
		By: Walletmix
		
		www.walletmix.com
		
	*/
	
	
	
	class Walletmix_Gateway_PaymentController extends Mage_Core_Controller_Front_Action {
		
		// The redirect action is triggered when someone places an order
		
		public function redirectAction() {
			
			$this->loadLayout();
			
			$block = $this->getLayout()->createBlock('Mage_Core_Block_Template','gateway',array('template' => 'gateway/redirect.phtml'));
			
			$this->getLayout()->getBlock('content')->append($block);
			
			$this->renderLayout();
			
		}
		
		
		
		// The response action is triggered when your gateway sends back a response after processing the customer's payment
		
		public function responseAction() {
			
			
			
			if($this->getRequest()->isPost()) {
				
				$server = Mage::getSingleton('core/session')->getWalletmixServer(); // true server2 and false server1
				$merchant_id = Mage::getStoreConfig('payment/gateway/merchant_id',Mage::app()->getStore()); 

				
				if($server){//server2
					

					$wmx_username = Mage::getStoreConfig('payment/gateway/wmx_username',Mage::app()->getStore()); 
					$wmx_password = Mage::getStoreConfig('payment/gateway/wmx_password',Mage::app()->getStore());  
					$access_app_key = Mage::getStoreConfig('payment/gateway/wmx_app_key',Mage::app()->getStore());  


					
					$recheck_url = "https://epay.walletmix.com/check-payment";

					$encodeValue = base64_encode($wmx_username.':'.$wmx_password);
					$auth = 'Basic '.$encodeValue;
					
					$params = array(
						"wmx_id" => $merchant_id ,
						"authorization" => $auth ,
						"access_app_key" => $access_app_key,
					);
					
					$previous_token = Mage::getSingleton('core/session')->getWalletmixToken();
					
					
					
					if(isset($_POST['merchant_txn_data'])){
						
						$merchant_txn_data = json_decode($_POST['merchant_txn_data']);
						$token = $merchant_txn_data->token;
						$txn_status = $merchant_txn_data->txn_status;
						
						
						
						if(	$token === $previous_token) {
							
							$params['token'] = $token;
							
							
							$encodedResponse = Mage::helper("gateway")->httpPost($recheck_url,$params);
							
							$response = json_decode($encodedResponse);
							
							$orderId = $response->merchant_order_id;

							$merchat_currency = strtoupper($response->merchant_currency);
							

							
							
							$order = Mage::getModel('sales/order');
							
							$order->loadByIncrementId($orderId);
							
							$amount = number_format( $order->getBaseGrandTotal(), 2, '.', '' );

							$currency = $order->order_currency_code;
							$currency = strtoupper($currency);

							
							if(	($response->wmx_id == $params['wmx_id']) ){
								
								if(	($currency == $merchat_currency) && ($response->txn_status == '1000') &&  ($response->merchant_req_amount >= $amount)){
									
									//update 
									$order->setState(Mage_Sales_Model_Order::STATE_PROCESSING, true, 'Your Order is now processing.');
									
									$order->sendNewOrderEmail();
									
									$order->setEmailSent(true);
									
									$order->save();
									
									Mage::getSingleton('checkout/session')->unsQuoteId();
									
									Mage_Core_Controller_Varien_Action::_redirect('checkout/onepage/success', array('_secure'=>true));
									
									
								}
								else{
									
									// cancel order
									$order->cancel()->setState(Mage_Sales_Model_Order::STATE_CANCELED, true, 'Your Order is Cancelled.')->save();
									
									Mage_Core_Controller_Varien_Action::_redirect('checkout/onepage/failure', array('_secure'=>true));
									
								}
							}
							else{

								echo 'Merchant ID Mismatch';
							}
						}
						else{
								echo 'token mismatch';
						}
						
					}
					else{
						echo 'try to direct access';
					}
					
					
				}
				else{// server1
					
					
					
					
					
					if (isset($_POST['pay_status'])) {
						$status = $_POST['pay_status'];
						$txn_id = $_POST['txn_id'];    
					}
					$message = '';
					
		        	// $merchant_id = "WMX54f1b4d3294d7";
					$merchant_id = base64_encode($merchant_id);
					
					$response = file_get_contents('http://walletmix.com/api/?merchant_id='.$merchant_id.'&txn_id='.$txn_id);
					
		        	// echo $response.'<br>';
					$response_decode = json_decode($response);
					$status_code = $response_decode->status_code;
					$status_message = $response_decode->status_message;
					$merchant_id = $response_decode->merchant_id;
					$transaction_time = $response_decode->transaction_time;
					
					$orderId = $_POST['mer_txnid'];
					
					
					$order = Mage::getModel('sales/order');


					$order->loadByIncrementId($orderId);
					
					
					
					if($status_code == "0000"){
						
						$order->setState(Mage_Sales_Model_Order::STATE_PROCESSING, true, $this->getMessage());
						
						$order->sendNewOrderEmail();
						
						$order->setEmailSent(true);
						
						$order->save();
						
						Mage::getSingleton('checkout/session')->unsQuoteId();
						
						Mage_Core_Controller_Varien_Action::_redirect('checkout/onepage/success', array('_secure'=>true));
						
					}
					
					else {
						
						// There is a problem in the response we got
						
						$order->cancel()->setState(Mage_Sales_Model_Order::STATE_CANCELED, true, $this->getMessage())->save();
						
						Mage_Core_Controller_Varien_Action::_redirect('checkout/onepage/failure', array('_secure'=>true));
						
					}
					
				}
				
			}
			else
				Mage_Core_Controller_Varien_Action::_redirect('');
			
		}
		
		
		
		// The cancel action is triggered when an order is to be cancelled
		
		public function cancelAction() {
			
			if (Mage::getSingleton('checkout/session')->getLastRealOrderId()) {
				
				$order = Mage::getModel('sales/order')->loadByIncrementId(Mage::getSingleton('checkout/session')->getLastRealOrderId());
				
				if($order->getId()) {
					
					// Flag the order as 'cancelled' and save it
					
					
					
				}
				
			}
			
		}
		
		
		
		private function getMessage(){
			
			$message='';
			
			$messageArray=array(
			
			'Payment status'=>$_POST['pay_status'],
			
			'Walletmix Transaction ID'=>$_POST['walletmix_txnid'],
			
			'Your Oder id'=>$_POST['mer_txnid'],
			
			'Currency merchant'=>$_POST['currency_merchant'],
			
			'Currency walletmix'=>$_POST['currency'],
			
			'Currency conversion rate'=>$_POST['convertion_rate'],
			
			'Receiveable amount after Walletmix service'=>$_POST['store_amount'],
			
			'Payment date'=>$_POST['pay_time'],
			
			'Bank Transaction ID'=>$_POST['bank_txn'],
			
			'Card number'=>$_POST['card_number'],
			
			'Card name'=>$_POST['card_name'],
			
			'Card type'=>$_POST['card_type'],
			
			'Customer IP addresss'=>$_POST['ip_address'],
			
			'Currency charged in BDT'=>$_POST['walletmix_service_charge_bdt'],
			
			'Reason'=>$_POST['reason']
			
			);
			
			
			
			foreach($messageArray as $k=>$v){
				
				$message .= $k."=".$v."\n";
				
			}
			
			
			
			$message = nl2br(strip_tags($message));
			
			return $message;
			
		}
		
		
		
	}	