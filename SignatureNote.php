<?php

require_once 'Signature.php';

enum Color: string
{
    public const RED = 'red';
    public const GREEN = 'green';
}

class SignatureNote implements Signature
{
    public string $name;
    public string $phoneOne;
    public string $phoneTwo;
    public string $emailOne;
    public string $emailTwo;
    public string $color;

    public function __construct(
        string $name,
        string $phoneOne,
        string $phoneTwo,
        string $emailOne,
        string $emailTwo,
        string $color
    ) {
        $this->name = $name;
        $this->phoneOne = $phoneOne;
        $this->phoneTwo = $phoneTwo;
        $this->emailOne = $emailOne;
        $this->emailTwo = $emailTwo;
        $this->color = $color;
    }

    public function getSignature(): string
    {
        echo '<div style="text-align: left;">-----------</div>';
        return '<div style="color: ' . $this->color . '; line-height: 0.3; text-decoration:none;">
        <p>С Уважением,</p>
        <p>' . $this->name . '</p>
        <p>Тел:</p>
        <p><a style="color: ' . $this->color . '; text-decoration: none;" href="tel: ' . $this->phoneOne . '"> ' . $this->formatPhoneOne() . ' </a></p>
        <p><a style="color: ' . $this->color . '; text-decoration: none;" href="tel: ' . $this->phoneTwo . '"> ' . $this->formatPhoneTwo() . '</a></p>
        <br>
        <p>E-Mail:</p>
        <p><a style="color: ' . $this->color . '; text-decoration: none" href="mailto: ' . $this->emailOne . '"> ' . $this->emailOne . ' </a></p>
        <p><a style="color: ' . $this->color . '; text-decoration: none" href="mailto: ' . $this->emailTwo . '"> ' . $this->emailTwo . '</a></p>
        <br>
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

$signature1 = new SignatureNote(
    'Брутов А.А.',
    '375295038183',
    '375295038184',
    'mjbcaepio@gmail.com',
    'caepioman@gmail.com',
    Color::RED
);
$signature2 = new SignatureNote(
    'Брутов А.А.',
    '375295038183',
    '375295038184',
    'mjbcaepio@gmail.com',
    'caepioman@gmail.com',
    Color::GREEN
);
print_r($signature1->getSignature());
print_r($signature2->getSignature());
