<?php
namespace Apps\Components\Form;

use Cygnite\FormBuilder\Form;
use Cygnite\Common\UrlManager\Url;

class ProductForm extends Form
{

    private $model;

    public $errors;

    public function __construct($object = null)
    {
        $this->model = $object;
    }

    /**
     *  Build form and return object
     * @return Registration
     */
    public function buildForm()
    {
        $id = (isset($this->model->id)) ? $this->model->id : '';

        $this->open(
                    'product', array(
                    'method' => 'post',
                    'action' => Url::sitePath('product/type/' . $id . '/' . $this->segment),
                    'role' => 'form',
                    'style' => 'width:500px;margin-top:35px;float:left;'
                        )
                ) ->addElement('label', 'Name', array('class' => 'col-sm-2 control-label'))
                ->addElement('text', 'name', array( 'value' => (isset($this->model->name)) ? $this->model->name : '', 'class' => 'form-control'))
				->addElement('label', 'Description', array( 'class' => 'col-sm-2 control-label', 'style' => 'width:37.667%;' ) )
                ->addElement('text', 'description', array( 'value' => (isset($this->model->description)) ? $this->model->description : '', 'class' => 'form-control'))
                ->addElement('label', 'Price', array('class' => 'col-sm-2 control-label'))
                ->addElement('text', 'price', array(
                    'value' => (isset($this->model->price)) ? $this->model->price : '',
                    'class' => 'form-control'))
                ->addElement('submit', 'btnSubmit', array('value' => 'Save', 'class' => 'btn btn-primary', 'style' => 'margin-top:15px;'))
                ->close()
                ->createForm();

        return $this;
    }

    /**
     * Render form
     * @return type
     */
    public function render()
    {
        return $this->getForm();
    }
}