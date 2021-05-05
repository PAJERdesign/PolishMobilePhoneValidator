<?php

namespace PAJERdesign\PolishMobilePhoneValidator\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * @author Robert Pajer
 */
class MobilePhoneValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!is_scalar($value) && !(is_object($value) && method_exists($value, '__toString'))) {
            throw new UnexpectedTypeException($value, 'string');
        }

        if (null === $value || '' === $value) {
            return;
        }

        if (mb_strlen($value, 'UTF-8') < 9) {
            $this->context->buildViolation($constraint->lengthMessage)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->setCode(MobilePhone::LENGTH_ERROR)
                ->addViolation();
        }

        $phoneNumberPattern = '/^(450|451|452|453|454|455|456|457|458|459|500|501|502|503|504|505|506|507|508|509|510|511|512|513|514|515|516|517|518|519|530|531|532|533|534|535|536|537|538|539|570|571|572|573|574|575|576|577|578|579|600|601|602|603|604|605|606|607|608|609|660|661|662|663|664|665|666|667|668|669|690|691|692|693|694|695|696|697|698|699|720|721|722|723|724|725|726|727|728|729|730|731|732|733|734|735|736|737|738|739|780|781|782|783|784|785|786|787|788|789|790|791|792|793|794|795|796|797|798|799|880|881|882|883|884|885|886|887|888|889)/';

        if (!preg_match($phoneNumberPattern, $value)) {
            $this->context->buildViolation($constraint->invalidNumberMessage)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->setCode(MobilePhone::INVALID_NUMBER_ERROR)
                ->addViolation();
        }
    }
}
