<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
	protected $fillable = ['status'];
	
	public function approved(){
		$this->generateCustomIDAndStatus();
	}
	
	public function generateCustomID(){
		return md5("$this->id $this->update_at");
	}
	
	public function generateCustomIDAndStatus(){
		$this->status = 'approved';
		$this->customid = $this->generateCustomID();
		$this->save();
	}
	
	public function InShoppingCart(){
		return $this->hasMany("App\InShoppingCart");
	}
	
	public function products(){
		return $this->belongsToMany('App\Product', 'in_shopping_carts');
	}
	
	public function order(){
		return $this->hasOne('App\Order')->first();
	}
	
	public function productsSize(){
		return $this->products()->count();
	}
	
	public function total(){
		return $this->products()->sum('pricing');
	}
	
	public function totalUSD(){
		return $this->products()->sum('pricing') / 100;
	}
	
	public static function findOrCreateBySessionID($shopping_cart_id){
		if($shopping_cart_id){
			//busca carrito de compra
			return ShoppingCart::findBySession($shopping_cart_id);
		}else{
			return ShoppingCart::createWithoutSession();
		}
	}
	
	public static function findBySession($shopping_cart_id){
		return ShoppingCart::find($shopping_cart_id);
	}
	
	public static function createWithoutSession(){
		return ShoppingCart::create([
			'status' => 'inclompleted'
		]);
		
	}
}
