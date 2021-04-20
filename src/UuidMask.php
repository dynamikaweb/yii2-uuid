<?php

namespace dynamikaweb\uuid;

class UuidMask extends \yii\widgets\MaskedInput
{
    public $mask = \Ramsey\Uuid\Validator\GenericValidator::VALID_PATTERN;
}