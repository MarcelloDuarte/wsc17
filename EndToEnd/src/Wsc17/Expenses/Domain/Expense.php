<?php

namespace Wsc17\Expenses\Domain;

abstract class Expense {
    static function valid(float $cost, \DateTime $date, string $type): Validation
    {
        return applyValidations(
            self::validateFoodIsBelowCap($cost, $type),
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
            case Food: return $cost > 25.0 ? new Left("nope") : new Right($cost);
            default:
                return $cost <= 0 ?
                    new Left("Amount of expense has to be positive") :
                    new Right($cost);
        }
    }
}