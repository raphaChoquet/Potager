<?php

namespace Potager\FrontBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PotagerFrontBundle extends Bundle
{
	public function getParent()
	{
    return 'FOSUserBundle';
	}
}
