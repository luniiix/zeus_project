<?php

namespace Zeus\SiteBundle\OtherClass;

class EditeursCollection {
	
	private $editeurs = array();
	
	public function getEditeurs()
	{
		return $this->editeurs;
	}
	
	public function setEditeurs(array $editeurs)
	{
		$this->editeurs = $editeurs;
	}
}

?>