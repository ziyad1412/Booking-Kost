<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
    public function getTransactionDataFromSession();

    //save transaction data to session
    public function saveTransactionDataToSession($data);

    //save transaction
    public function saveTransaction($data);
}
