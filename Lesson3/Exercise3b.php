<?php

namespace Lesson3\Exercise3b {

    abstract class Either {}

    final class Right extends Either
    {
        private $value;

        public function __construct($value)
        {
            $this->value = $value;
        }
    }

    final class Left extends Either
    {
        private $value;

        public function __construct($value)
        {
            $this->value = $value;
        }
    }

    function eitherDivBy(int $divisor): \Closure
    {
        return function(int $dividend) use ($divisor): Either {
            // TODO: Exercise 3b
            // Write the implementation
        };
    }

}