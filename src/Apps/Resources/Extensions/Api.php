<?php
namespace Apps\Resources\Extensions;

class Api
{
    public $custom;

    public function __construct()
    {

    }

    public function initialize()
    {

        return "Hello Api";
    }

    public function payment($app)
    {

        echo "Hello Payment Gateway";
    }

    public function paymentSuccess($app)
    {

        echo "Hello After Payment Successful!";
    }

    public function beforeRun()
    {
        echo "before ";

    }

    public function run()
    {
        echo "Run Api";
    }

    public function afterRun()
    {
        echo "after ";
    }
}
