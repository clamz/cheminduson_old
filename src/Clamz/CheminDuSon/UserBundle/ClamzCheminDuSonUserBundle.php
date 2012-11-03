<?php

namespace Clamz\CheminDuSon\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ClamzCheminDuSonUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
