<?php

namespace Transejecutivos\Validators;

use \Phalcon\Validation\Message;
use \Phalcon\Validation\Validator;
use \Phalcon\Validation\ValidatorInterface;

class SpaceValidator extends Validator implements ValidatorInterface {
    public function validate(\Phalcon\Validation $validator, $attribute) {
        //$message = $validator->getOption('message');
        $value  = $validator->getValue($attribute);

        $value2 = \trim($value);
        
        if (empty($value2)) {
            $this->appendMessage(
                $message,
                $attribute,
                "SpaceValidator"
            );
            return false;
        }
        return true;
    }

}