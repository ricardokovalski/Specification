<?php

declare(strict_types=1);

namespace RicardoKovalski\Examples\Order\Entities;

final class Order
{
    public function __construct(
        public readonly string $status,
        public readonly float $totalItems,
        public readonly float $total,
        public readonly float $discount,
        public readonly float $freight,
        public readonly string $origin,
        public readonly \DateTimeImmutable $createdAt,
        public readonly ?\DateTimeInterface $paidAt = null,
        public readonly ?\DateTimeInterface $refundAt = null,
    ) {
    }
}
