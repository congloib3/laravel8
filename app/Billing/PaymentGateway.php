<?php
    namespace App\Billing;
    use Illuminate\Support\Str;

    class PaymentGateway{

        private $currency;

        public function __construct($currency){
            $this->currency = $currency;
        }
        public function charge($amout){
            return [
                'amount' => $amout,
                'confirmation' => Str::random(),
                'currency' => $this->currency
            ];
        }
    }
?>
