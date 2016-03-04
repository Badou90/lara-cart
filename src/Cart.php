<?php

namespace Badou\Cart;

class Cart {
    protected $session;

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function content()
    {
        return 'content';
    }
}
