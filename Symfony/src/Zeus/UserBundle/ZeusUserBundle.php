<?php

namespace Zeus\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ZeusUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
