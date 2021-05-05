<?php

namespace PAJERdesign\PolishMobilePhoneValidator\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Robert Pajer
 */
class MobilePhone extends Constraint
{
    public const LENGTH_ERROR = '2a0039fb-01b9-43aa-8140-37057083932f';
    public const INVALID_NUMBER_ERROR = '7611b63f-4ff2-44ca-959a-51fb7385f703';

    protected static $errorNames = [
        self::LENGTH_ERROR => 'LENGTH_ERROR',
        self::INVALID_NUMBER_ERROR => 'INVALID_NUMBER_ERROR',
    ];

    public $lengthMessage = 'This value should have exactly 9 characters';
    public $invalidNumberMessage = 'This value is not a valid Polish mobile number';
}
