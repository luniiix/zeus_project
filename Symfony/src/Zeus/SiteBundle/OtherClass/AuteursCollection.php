<?php

namespace Zeus\SiteBundle\OtherClass;

class AuteursCollection {
	
	private $auteurs = array();
	
	public function getAuteurs()
	{
		return $this->auteurs;
	}
	
	public function setAuteurs(array $auteurs)
	{
		$this->auteurs = $auteurs;
	}
}

?>