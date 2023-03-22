<?php
require_once 'Signature.php';
require_once 'SignatureGreen.php';

enum Color: string
{
    const RED = 'red';
    const GREEN = 'green';
}

class SignatureRed implements Signature
{
    public string $name;
    public string $phoneOne;
    public string $phoneTwo;


    public function __construct(string $name, string $phoneOne, string $phoneTwo)
    {
        $this->name = $name;
        $this->phoneOne = $phoneOne;
        $this->phoneTwo = $phoneTwo;
    }

    public function getSignature(): string
    {
        echo '<div style="text-align: left;">-----------</div>';
        return '<div style="color: ' . Color::RED . '; line-height: 0.3; text-decoration:none;">
        <p>С Уважением,</p>
        <p>' . $this->name . '</p>
        <p>Тел:</p>
        <p><a style="color: ' . Color::RED . '; text-decoration: none;" href=""> ' . $this->formatPhoneOne() . ' </a></p>
        <p><a style="color: ' . Color::RED . '; text-decoration: none" href=""> ' . $this->formatPhoneTwo() . '</a></p>
        <br>
        </div>';
    }

    public function formatPhoneNumber($number): array|string|null
    {
        $number = preg_replace("/\D/", "", $number);
        if (strlen($number) == 11) {
            return preg_replace("/([0-9]{3})([0-9]{2})([0-9]{3})([0-9]{2})([0-9]{2})/", "+$1 ($2) $3-$4-$5", $number);
        } else {
            return preg_replace("/([0-9]{3})([0-9]{2})([0-9]{3})([0-9]{2})([0-9]{2})/", "+$1 ($2) $3-$4-$5", $number);
        }
    }

    public function formatPhoneOne(): string
    {
        return $this->formatPhoneNumber($this->phoneOne);
    }

    public function formatPhoneTwo(): string
    {
        return $this->formatPhoneNumber($this->phoneTwo);
    }
}

$signature1 = new SignatureRed(
    'Брутов А.А.',
    '375295038183',
    '375295038184',
);
$signature2 = new SignatureGreen(
    'aa@aa.com',
    'bb@bb.com',
);
print_r($signature1->getSignature());
print_r($signature2->getSignature());
