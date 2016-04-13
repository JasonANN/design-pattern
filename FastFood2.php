<?php

class Product
{
    private $_name;
    private $_account;

    public function __construct()
    {
        $this->_name = null;
        $this->_account = 0;
    }

    public function addFood($food)
    {
        $this->_name = $food;
    }

    public function addAccount($account)
    {
        $this->_account = $this->_account + $account;
    }
}

abstract class foodBuilder
{
    protected $_product;
    protected $_food;
    protected $_account;

    public function __construct()
    {
        $this->_product = new Product();
    }

    public abstract function setMeal();
    public abstract function setAccount();
    public abstract function getResult();
}

class hamburgerBuilder extends  foodBuilder
{
    protected $_food = 'hamburger';
    protected $_account = '50';

    public function setMeal()
    {
        $this->_product->addFood($this->_food);
    }

    public function setAccount()
    {
        $this->_product->addAccount($this->_account);
    }

    public function getResult()
    {
        return $this->_product;
    }
}

class cokeBuilder extends foodBuilder
{
    protected $_food = 'coke';
    protected $_account = '20';

    public function setMeal()
    {
        $this->_product->addFood($this->_food);
    }

    public function setAccount()
    {
        $this->_product->addAccount($this->_account);
    }

    public function getResult()
    {
        return $this->_product;
    }
}

class CashierDirector
{
    public function build(foodBuilder $builder)
    {
        $builder->setMeal();
        $builder->setAccount();
        return $builder->getResult();
    }
}

$director = new CashierDirector();
print_r($director->build(new hamburgerBuilder));
print_r($director->build(new cokeBuilder));








