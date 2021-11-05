<?php

namespace dynamikaweb\uuid;

class UuidMask extends \yii\widgets\MaskedInput
{
    public $mask = ['HHHHHHHH-HHHH-HHHH-HHHH-HHHHHHHHHHHH'];
    public $definitions = ['H' => ['validator' => '[0-9A-Fa-f]']];
}
