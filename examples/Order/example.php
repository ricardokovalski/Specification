<?php

declare(strict_types=1);

use RicardoKovalski\Examples\Order\Entities\Order;
use RicardoKovalski\Examples\Order\Entities\Transaction;
use RicardoKovalski\Examples\Order\Specifications\OrderAlreadyRefundedSpec;
use RicardoKovalski\Examples\Order\Specifications\OrderPendentSpec;
use RicardoKovalski\Examples\Order\Specifications\OrderWithApiSourceAlreadyPaidSpec;
use RicardoKovalski\Examples\Order\Specifications\TransactionCreditCardSpec;

require __DIR__ . '/../../vendor/autoload.php';

$orderRefund = new Order(
    status: 'refund',
    totalItems: 500.00,
    total: 499.49,
    discount: 3.50,
    freight: 2.99,
    origin: 'api',
    createdAt: new \DateTimeImmutable('2022-01-07 12:58:35'),
    paidAt: new \DateTime('2022-01-08 22:56:45'),
    refundAt: new \DateTime('2022-01-09 04:34:21')
);

$transaction1 = new Transaction(
    order: $orderRefund,
    type: 'cartao',
    total: 499.49
);

$orderPaidApi = new Order(
    status: 'paid',
    totalItems: 297.98,
    total: 290.47,
    discount: 13.50,
    freight: 5.99,
    origin: 'api',
    createdAt: new \DateTimeImmutable('2022-01-07 15:15:17'),
    paidAt: new \DateTime('2022-01-09 22:56:45')
);

$transaction2 = new Transaction(
    order: $orderPaidApi,
    type: 'cartao',
    total: 290.47
);

$orderPaidCheckout = new Order(
    status: 'paid',
    totalItems: 297.98,
    total: 290.47,
    discount: 13.50,
    freight: 5.99,
    origin: 'checkout',
    createdAt: new \DateTimeImmutable('2023-01-10 09:45:36'),
    paidAt: new \DateTime('2022-01-13 21:17:56')
);

$transaction3 = new Transaction(
    order: $orderPaidCheckout,
    type: 'cartao',
    total: 290.47
);

$transactionCreditCardSpec = new TransactionCreditCardSpec($transaction3);
$orderAlreadyRefundedSpec = new OrderAlreadyRefundedSpec();
$orderPendentSpec = new OrderPendentSpec();
$orderWithApiSourceAlreadyPaidSpec = new OrderWithApiSourceAlreadyPaidSpec();

$result = $transactionCreditCardSpec
    ->and($orderAlreadyRefundedSpec->not())
    ->and($orderPendentSpec->not())
    ->and($orderWithApiSourceAlreadyPaidSpec)
    ->isSatisfiedBy($orderPaidCheckout);

echo "<pre>";
var_dump($result);
