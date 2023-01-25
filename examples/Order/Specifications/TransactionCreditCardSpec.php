<?php

declare(strict_types=1);

namespace RicardoKovalski\Examples\Order\Specifications;

use RicardoKovalski\Examples\Order\Entities\Transaction;
use RicardoKovalski\SpecPattern\CompositeSpecification;

final class TransactionCreditCardSpec extends CompositeSpecification
{
    public function __construct(
        public readonly Transaction $transaction
    ) {}

    public function isSatisfiedBy($candidate): bool
    {
        return $this->transaction->type === 'cartao' &&
            $this->transaction->total === $candidate->total;
    }
}
