<?php

namespace Badou\Cart;

class Cart {
    protected $session;
    protected $instance;

    public function __construct($session)
    {
        $this->session = $session;
        $this->instance = 'cart';
    }

    public function instance($instance = null)
    {
        $this->instance = $instance;
        return $this;
    }

    public function content()
    {
        return $this->session->has($this->getInstance()) ? $this->session->get($this->getInstance()) : new \Illuminate\Support\Collection;
    }

    public function clear()
    {
        $cart = $this->content();
        $cart->forget($this->getInstance());
    }

    public function add($item, $qty)
    {
        $cart = $this->content();

        if($cart->has($item->id))
            $cart = $this->addItem($item, $qty + $this->getItem($item->id)->qty);
        else
            $cart = $this->addItem($item, $qty);

        $this->updateCart($cart);
    }

    public function update($row, $qty)
    {
        $cart = $this->content();
        $item = $cart->get($row);
        $item->qty = $qty;

        $cart->put($row, $item);
        $this->updateCart($cart);

        return [
            'total' => $this->getTotal(),
            'item' => $item->userPrice * $item->qty,
        ];
    }

    public function remove($item)
    {
        $cart = $this->content();
        $cart->forget($item->id);
    }

    public function getTotal()
    {
        $cart = $this->content();
        $total = 0;

        foreach($cart as $row)
        {
            $total += $row->userPrice * $row->qty;
        }

        return $total;
    }

    protected function addItem($item, $qty)
    {
        $cart = $this->content();

        $item->qty = $qty;
        $cart->put($item->id, $item);

        return $cart;
    }

    protected function getInstance()
    {
        return 'laracart'.$this->instance;
    }

    protected function getItem($id)
    {
        $cart = $this->content();
        return $cart->get($id);
    }

    protected function updateCart($cart)
    {
        return $this->session->set($this->getInstance(), $cart);
    }
}
