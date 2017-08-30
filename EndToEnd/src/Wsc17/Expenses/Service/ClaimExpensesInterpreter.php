<?php

namespace Wsc17\Expenses\Service;

use Wsc17\Expenses\Domain\ExpenseRepository;

final abstract ClaimExpensesInterpreter
{
    static function add(float $cost, \DateTime $date): Reader
    {
        return new Reader(function(ExpenseRepository $repository) use ($expense) {
            $on = match(Expense::valid($cost, $date)); switch(true) {
                case ($on(Right($expense))): return $repository->store($expense);
                case ($on(Left($listOfErrors))): return $listOfErrors;
            }
        });
    }

    static function claim(ExpenseSheet $es): Reader
    {
        // TODO
    }

    static function approve(UnpaidClaim $c): Reader
    {
        // TODO
    }

    static function reject(UnpaidClaim $c): Reader
    {
        // TODO
    }

    static function pay(ApprovedClaim $c): Reader
    {
        // TODO
    }
}