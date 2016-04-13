<?php

class Product
{
    static public $obj = null;
    private $_mealConstruct;
    private $_account;

    public function __construct()
    {
        $this->_mealConstruct = [];
        $this->_account = 0;
    }

    static public function getInstance()
    {
        if (is_null(self::$obj)) {
            self::$obj = new self;
        }

        return self::$obj;
    }

    public function addFood($food)
    {
        array_push($this->_mealConstruct, $food);
    }

    public function addAccount($account)
    {
        $this->_account = $this->_account + $account;
    }

    public function getResult()
    {
        return ['set' => $this->_mealConstruct, 'total' => $this->_account];
    }
}

abstract class foodBuilder
{
    protected $_food;
    protected $_account;
    public abstract function setMeal();
    public abstract function setAccount();
    public abstract function getResult();
}

class hamburgerBuilder extends  foodBuilder
{
    private $_product;
    protected $_food = 'hamburger';
    protected $_account = '50';

    public function __construct()
    {
        $this->_product = Product::getInstance();
    }

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
    private $_product;
    protected $_food = 'coke';
    protected $_account = '20';

    public function __construct()
    {
        $this->_product = Product::getInstance();
    }

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
        return $this->_product->getResult();
    }
}


class ProductDirector
{
    public function build(foodBuilder $builder)
    {
        $builder->setMeal();
        $builder->setAccount();
        return $builder->getResult();
    }
}

$director = new ProductDirector();
$director->build(new hamburgerBuilder);

var_dump($director->build(new cokeBuilder));








