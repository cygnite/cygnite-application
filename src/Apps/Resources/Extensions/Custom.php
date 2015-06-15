<?php
namespace Apps\Resources\Extensions;

class Custom implements CustomInterface
{
    public function initialize()
    {
        return "Hello Container";
    }
}
