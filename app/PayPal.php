<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PaypalPayment;

class PayPal extends Model
{
	private $_apiContext;
	private $shopping_cart;
	private $_ClientId 		= 'AXAyU8E6uDzKmQB7zIt54AsAifkIQ_U4AQWkBOiYoWoyq6dirWlsmJbbuK72N3iLtuWixGUMtiLuuZy2';
	private $_ClientSecret 	= 'EHiAnkC_FzbZWsqwbOEcec9h3cH1hUtNsvxCkmTZGCSw5FaNJklPP6_qVCSoi5D_sDxUrO3rP84c0y1V';
	
	public function __construct($shopping_cart)
	{
		$this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);
		$config = config('paypal_payment');
		$flatConfig = array_dot($config);
		$this->_apiContext->setConfig($flatConfig);
		$this->shopping_cart = $shopping_cart;
	}
	
	public function generate()
	{
		$payment = \PaypalPayment::payment()
		->setIntent('sale')
		->setPayer($this->payer())
		->setTransactions([$this->transaction()])
		->setRedirectUrls($this->redirectURLs());

		try {
			$payment->create($this->_apiContext);
			
		} catch (\Exception $e) {
			dd($e);
			exit(1);
		}
		
	return $payment;
	}
	
	// Devuelve toda la información del pago.
	public function payer()
	{
		return \PaypalPayment::payer()
		->setPaymentMethod('paypal');
	}

	public function redirectURLs()
	{
		$baseURL = url('/');
		return \PaypalPayment::redirectUrls()
		->setReturnUrl($baseURL.'/payment/store')
		->setCancelUrl($baseURL.'/carrito');
	}

	// Devuelve toda la información de la transaccion
	public function transaction()
	{
		return \PaypalPayment::transaction()
		->setAmount($this->amount())
		->setItemList($this->items())
		->setDescription('Tu compra en Laravel Ecommerce')
		->setInvoiceNumber(uniqid());
		
	}

	public function items()
	{
		$items = [];
		$products = $this->shopping_cart->products()->get();
		foreach ($products as $product) {
			array_push($items, $product->paypalItem());
		}
		return \PaypalPayment::itemList()->setItems($items);
	}

	public function amount()
	{
		return \PaypalPayment::amount()
		->setCurrency('USD')
		->setTotal($this->shopping_cart->totalUSD());
	}
	
	public function execute($paymentId, $payerId)
	{
		$payment = \PaypalPayment::getById($paymentId, $this->_apiContext);
		$execution = \PaypalPayment::PaymentExecution()
				->setPayerId($payerId);
	
		return $payment->execute($execution, $this->_apiContext);

		
	}
}
