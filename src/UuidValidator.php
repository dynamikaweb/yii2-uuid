<?php

namespace dynamikaweb\uuid;

class UuidValidator extends \yii\validators\RegularExpressionValidator
{
    const PATTERN_V1 = '/^[0-9A-F]{8}(-?)[0-9A-F]{4}(-?)[1][0-9A-F]{3}(-?)[89AB][0-9A-F]{3}(-?)[0-9A-F]{12}$/i';
    const PATTERN_V2 = '/^[0-9A-F]{8}(-?)[0-9A-F]{4}(-?)[2][0-9A-F]{3}(-?)[89AB][0-9A-F]{3}(-?)[0-9A-F]{12}$/i';
    const PATTERN_V3 = '/^[0-9A-F]{8}(-?)[0-9A-F]{4}(-?)[3][0-9A-F]{3}(-?)[89AB][0-9A-F]{3}(-?)[0-9A-F]{12}$/i';
    const PATTERN_V4 = '/^[0-9A-F]{8}(-?)[0-9A-F]{4}(-?)[4][0-9A-F]{3}(-?)[89AB][0-9A-F]{3}(-?)[0-9A-F]{12}$/i';
    const PATTERN_V5 = '/^[0-9A-F]{8}(-?)[0-9A-F]{4}(-?)[5][0-9A-F]{3}(-?)[89AB][0-9A-F]{3}(-?)[0-9A-F]{12}$/i';
    
    public $pattern = V4_PATTERN;
}
