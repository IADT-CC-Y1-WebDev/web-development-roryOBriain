// class BankAccount {
//     protected $number;
//     protected $name;
//     protected $balance;

//     public function __construct($num, $name, $bal) {
//         $this->number = $num;
//         $this->name = $name;
//         $this->balance = $bal;
//     }

//     public function __toString() {
//         return "Account: {$this->number}, Name: {$this->name}, Balance: €{$this->balance}";
//     }
// }

class BankAccount {
    constructor(number, name, balance) {
        this.number = number;
        this.name = name;
        this.balance = balance;
    }

    toString() {
        return `Account: ${this.number}, Name: ${this.name}, Balance: €${this.balance}`;
    }

}

export default BankAccount;