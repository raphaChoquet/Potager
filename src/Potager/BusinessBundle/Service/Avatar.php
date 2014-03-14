<?php

namespace Potager\BusinessBundle\Service;

class Avatar 
{
	protected $url;
	protected $kernel;

	public function __construct($kernel)
	{
		$this->kernel = $kernel;
	}

	public function getAvatar($faction = null)
	{	
		$this->url = $this->kernel->getRootDir() . '/../web/bundles/potagerbusiness/images/faction/';
		$avatars = array();
		/* ouverture du repertoire de nom "photos" */
		$pointeur=opendir($this->url);

		/* on regarde le contenu pointé par $pointeur, nom par nom */
		while ($entree = readdir($pointeur)) {
			if ($entree !== "." && $entree !== "..") {
				if (!isset($faction) || stripos($entree, $faction->getName()) !== false) {
					$avatars[] = 'bundles/potagerbusiness/images/faction/' . $entree;
				}
			}
		}

		/* fermeture du repertoire repere par $pointeur */
		closedir($pointeur);

		return $avatars;
	}
}

/*
	$avatarManager = $this->get('potager_business.avatar');
	$avatars = $avatarManager->getAvatar($factions[0]);
*/