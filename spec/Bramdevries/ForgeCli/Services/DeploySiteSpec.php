<?php

namespace spec\Bramdevries\ForgeCli\Services;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DeploySiteSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bramdevries\ForgeCli\Services\DeploySite');
    }

}
