<?php

namespace Lesson5\Exercise5a {
    const Food = "Food";

    abstract class Expense
    {
        private $cost;
        private $date;

        function __construct($cost, $date)
        {
            $this->cost = $cost;
            $this->date = $date;
        }

        static function ofFood(float $cost, \DateTime $date): Validation
        {
            return applyValidations(
                self::validateFoodIsBelowCap($cost, Food),
                self::validateDateCannotBeInTheFuture($date)
            ) (function($cost, $date) {
                return new FoodExpense($cost, $date);
            });
        }

        static function validateDateCannotBeInTheFuture(\DateTime $date): Validation
        {
            try {
                if ($date > new \DateTime("now")) {
                    return new Left("Date cannot be in the future");
                }
                return new Right($date);
            } catch (\Exception $e) {
                return new Left("Invalid date format. Please use dd-mm-yyyy");
            }
        }

        static function validateFoodIsBelowCap(float $cost, string $type): Validation
        {
            switch($type) {
                case Food:
                    // TODO
                    // food expense can not be above 25 euros
                    
                    break;
                default:
                    return new Right($cost);
            }
        }
    }

    final class FoodExpense extends Expense {}
    final class TravelExpense extends Expense {}
    final class AccommodationExpense extends Expense {}
    final class OtherExpense extends Expense {}

    const _ = __NAMESPACE__ . "\\IGNORED";

    const applyValidations = __NAMESPACE__ . "\\applyValidations";
    function applyValidations(Validation ...$validations): callable
    {
        return function($f) use ($validations): Validation {

            $lefts = array_filter($validations, function (Validation $v) { return $v->isLeft(); });

            if (count($lefts)) {
                return new Left(array_map(function(Left $v) { return $v->fold(identity)(_); }, $lefts));
            }

            return new Right(call_user_func_array($f, array_map(function(Right $v) { return $v->fold(_)(identity); }, $validations)));
        };
    }

    const identity = __NAMESPACE__ . "\\identity";
    function identity($x)
    {
        return $x;
    }

    abstract class Validation
    {
        private $value;

        final public function __construct($value)
        {
            $this->value = $value;
        }

        public function map($f): Validation
        {
            return $this->isLeft() ? new Left($this->value) : new Right($f($this->value));
        }

        public function flatMap($f): Validation
        {
            return $this->isLeft() ? new Left($this->value) : $f($this->value);
        }

        public function fold($fe)
        {
            if ($this->isLeft())
                return function($fa) use ($fe) { return $fe($this->value); };
            else
                return function($fa) { return $fa($this->value); };
        }

        public function isRight(): bool
        {
            return $this instanceof Right;
        }

        public function isLeft(): bool
        {
            return $this instanceof Left;
        }
    }

    final class Right extends Validation {}
    final class Left extends Validation {}
}