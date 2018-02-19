<?php

namespace BonPlan\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BonPlanUserBundle extends Bundle
{
    public function getParent(){
        return "FOSUserBundle";
    }
}
