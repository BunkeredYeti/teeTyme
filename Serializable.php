<?php
interface Serializable{
	/* Methods */
	public function serialize();
	public function unserialize($serialized);
}
?>