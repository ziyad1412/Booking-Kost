<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Room;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function getTransactionDataFromSession()
    {
        return session()->get('transaction');
    }

    // Save transaction data to session
    public function saveTransactionDataToSession($data)
    {
        $transaction = session()->get('transaction', []);

        //foreach
        foreach ($data as $key => $value) {
            $transaction[$key] = $value;
        }

        session()->put('transaction', $transaction);
    }

    // Save transaction
    public function saveTransaction($data)
    {
        $room = Room::find($data['room_id']);

        $data = $this->prepareTransactionData($data, $room);

        $transaction = Transaction::create($data);

        session()->forget('transaction');

        return $transaction;
    }

    private function prepareTransactionData($data, $room)
    {
        $data['code'] = $this->generateTransactionCode();
        $data['payment_status'] = 'pending';
        //date
        $data['transaction_date'] = now();

        $total = $this->calculateTotalAmount($room->price_per_month, $data['duration']);
        $data['total_amount'] = $this->calculatePaymentAmount($total, $data['payment_method']);

        return $data;
    }

    private function generateTransactionCode()
    {
        return 'NGKBWA' . rand(100000, 999999);
    }

    private function calculateTotalAmount($pricePerMonth, $duration)
    {
        $subTotal = $pricePerMonth * $duration;
        $tax = $subTotal * 0.11;
        $insurance = $subTotal * 0.01;
        return $subTotal + $tax + $insurance;
    }

    private function calculatePaymentAmount($total, $paymentMethod)
    {
        return $paymentMethod === 'full_payment' ? $total : $total * 0.3;
    }
}
