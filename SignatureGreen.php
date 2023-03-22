<?php
require_once 'SignatureRed.php';

class SignatureGreen implements Signature
{
    public string $emailOne;
    public string $emailTwo;

    public function __construct(string $emailOne, string $emailTwo)
    {
        $this->emailOne = $emailOne;
        $this->emailTwo = $emailTwo;
    }

    public function getSignature(): string
    {
        return '<div style="color: ' . Color::GREEN . '; line-height: 0.3">
        <p>E-Mail:</p>
        <p><a style="color: ' . Color::GREEN . '; text-decoration: none" href=""> ' . $this->emailOne . ' </a></p>
        <p><a style="color: ' . Color::GREEN . '; text-decoration: none" href=""> ' . $this->emailTwo . '</a></p>
        </div>';
    }
}
