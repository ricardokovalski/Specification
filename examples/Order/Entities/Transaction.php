<?php

declare(strict_types=1);

namespace RicardoKovalski\Examples\Order\Entities;

final class Transaction
{
    public function __construct(
        public readonly Order $order,
        public readonly string $type,
        public readonly float $total,
    ) {
    }
}
