<?php
class Obj implements Serializable {
	private $data;
	public function __construct(){
		$this->data = 'My Private Data';
	}
	public function serialize(){
		$this->data = serialize($this->data);
	}
	public function unserialize($data){
		$this->data = unserialize($data);
	}
	public function getData(){
		return $this->data;
	}
	public function __sleep(){
		echo '<br>Serializable start<br>';
	}
	public function __wakeup(){
		echo '<br>Unserializable done<br>';
	}
}
$obj = new Obj();
echo $obj->getData()."1<br>";
$obj->serialize();
echo $obj->getData()."2<br>";
$obj->unserialize($obj->getData());
echo $obj->getData()."3<br>";


?>
