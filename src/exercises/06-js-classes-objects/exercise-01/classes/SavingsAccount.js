// class SavingsAccount extends BankAccount {
//     protected $interestRate;

//     public function __construct($num, $name, $bal, $rate) {
//         parent::__construct($num, $name, $bal);
//         $this->interestRate = $rate;
//     }

//     // Override __toString() to include interest rate
//     public function __toString() {
//         $rate = $this->interestRate * 100;
//         return "Savings Account: {$this->number}, Name: {$this->name}, " .
//                "Balance: €{$this->balance}, Interest: {$rate}%";
//     }
// }
import BankAccount from './BankAccount.js';

class SavingsAccount extends BankAccount {
    constructor(number, name, balance, interestRate) {
        super(number, name, balance);
        this.interestRate = interestRate;
    }

    toString() {
        return `Savings Account: ${this.number}, Name: ${this.name}, ` +
               `Balance: €${this.balance}, Interest: ${this.interestRate * 100}%`;
    }
}

export default SavingsAccount;