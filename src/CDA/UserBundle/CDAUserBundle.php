<?php

namespace CDA\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CDAUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
