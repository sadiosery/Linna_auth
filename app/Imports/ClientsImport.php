<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToModel
{
    /*
     @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'code' => null,
            '_name'     => $row['nom'],
            'category' => null,
            'tel1' => null, 
            'tel2' => null,
            'email' => null,
            'website' => null,
            'address' => null,
            'city' => null,
            'country' => null,
            'township' => null,
            '_district' => null,
            'payment_mode' => null,
            'notes' => null,
            'conditions' => null,
            'e_document' => 'no',
            'account_type'    => 'client', 
            'legal_id' => null,
            'current_balance' => $row['solde'],
            'balance_date' => $row['date'],
            'bank_name' => null,
            'bank_account' => null,
            'corp_id' => 1,
            'user_id' => 1
        ]);
    }
}
