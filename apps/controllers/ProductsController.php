<?php
namespace Apps\Controllers;

use Cygnite\Input;
use Cygnite\Application;
use Cygnite\Helpers\Url;
use Cygnite\AbstractBaseController;
use Cygnite\Libraries\Form;
use Cygnite\Helpers\Assets;
use Cygnite\Libraries\Validator;
use Apps\Models\ShoppingProducts;

class ProductsController extends AbstractBaseController
{
    /**
    * --------------------------------------------------------------------------
    * The Default Controller
    *--------------------------------------------------------------------------
    *  This controller respond to uri beginning with welcomeuser and also
    *  respond to root url like "home/index"
    *
    * Your GET request of "home/form" will respond like below -
    *
    *      public function formAction()
    *     {
    *            echo "Cygnite : Hellow ! World ";
    *     }
    * Note: By default cygnite doesn't allow you to pass query string in url, which
    * consider as bad url format.
    *
    * You can also pass parameters into the function as below-
    * Your request to  "home/form/2134" will pass to
    *
    *      public function action_form($id = ")
    *      {
    *             echo "Cygnite : Your user Id is $id";
    *      }
    * In case if you are not able to access parameters passed into method
    * directly as above, you can also get the uri segment
    *  echo Url::segment(3);
    *
    * That's it you are ready to start your awesome application with Cygnite Framework.
    *
    */

    private $author = 'Sanjoy Dey';

    private $country = 'India';

    //protected $layout = 'layout.main';

    protected $templateEngine = true;

    //protected $templateExtension = '.html.twig';

    protected $autoReload = true;

    protected $twigDebug = true;

    /*
    * Your constructor.
    * @access public
    *
    */
    public function __construct()
    {
        parent::__construct();
    }

    /**
    * Default method for your controller. Render welcome page to user.
    * @access public
    *
    */
    public function indexAction()
    {
        $products = array();
        $products = ShoppingProducts::fetchAll(
            array(
                'orderBy' => 'id desc',
                /*'paginate' => array(
                    'limit' => Url::segment(3)
                )*/
            )
        );
		
        $this->render('index')->with(
            array(
                'products' => $products,
                'links' => ShoppingProducts::createLinks(),
                'title' => '',
                'baseUrl' => Url::getBase(),
                'pageNumber' => Url::segment(3),
                'styles' => array(
                              'table' => Assets::addStyle('webroot/css/cygnite/table.css'),
                            ),
                'buttonAttributes' => array(
                                'primary' => array('class' => 'btn btn btn-info'),
                                'delete' => array('class' => 'btn btn-danger'),
                ),
            )
        );

    }

    public function typeAction($id = null)
    {
        $input = Input::getInstance(
            function ($instance) {
                return $instance;
            }
        );

        //echo Url::segment(4);
        $errors = '';
        if ($input->hasPost('btnSubmit') == true) {
            //show($input->except('btnSubmit')->post());
            $validator = null;
            $validator = Validator::instance(
                $input,
                function ($validate) {
                    $validate->addRule('product_type', 'required|min:5')
                             ->addRule('name', 'required|is_string')
                             ->addRule('price', 'required|is_int');

                    return $validate;
                }
            );

            if ($validator->run()) {

                if ($id == null || $id == '') {
                    $product = new ShoppingProducts;
                } else {
                    $product = ShoppingProducts::find($id);
                }

                $postArray = $input->except('btnSubmit')->post();

                $product->product_type = $postArray['product_type'];
                $product->name = $postArray['name'];
                $product->price = $postArray['price'];

                if ($product->save()) {
                    Url::redirectTo('products/index/'.Url::segment(4));
                } else {
                    //echo "Error occured while saving data.";
                    Url::redirectTo('products/index/'.Url::segment(4));
                    exit;
                }
            } else {
                //validation error here
                $errors = $validator->getErrors();
            }
        }

        $form = null;

        if (isset($id) && $id !== null) {
            $product = array();
            $product = ShoppingProducts::find($id);
            $form = $this->generateForm($product, Url::segment(4));
            $form->errors = $errors;
            $this->editProduct($id, $form);
        } else {
            $form = $this->generateForm();
            $form->errors = $errors;
            $this->addProduct($form);
        }
    }

    private function editProduct($id, $form)
    {
        // Since our all all logic is in controller
        // You can also use same view page for create and update
        $this->render('update')->with(array(
                'registration' => $form->getForm(),
                'validation_errors' => $form->errors,
                'baseUrl' => Url::getBase(),
                'buttonAttributes' => array(
                    'primary' => array('class' => 'btn primary', 'style' => 'border:1px solid #888;'),
                    'delete' => array('class' => 'btn danger'),
                ),
            )
        );
    }

    public function showAction($id)
    {

        $product = ShoppingProducts::find($id);

        $this->render('view')->with(array(
                'product' => $product,
                'pageNumber' => Url::segment(4),
                'baseUrl' => Url::getBase(),
                'buttonAttributes' => array(
                    'primary' => array('class' => 'btn primary', 'style' => 'border:1px solid #888;'),
                    'delete' => array('class' => 'btn danger'),
                ),
            )
        );
    }

    private function addProduct($form)
    {
        // Since our all all logic is in controller
        // You can also use same view page for create and update
        $this->render('create')->with(array(
                'registration' => $form->getForm(),
                'validation_errors' => $form->errors,
                'baseUrl' => Url::getBase(),
                'buttonAttributes' => array(
                    'primary' => array('class' => 'btn primary', 'style' => 'border:1px solid #888;'),
                    'delete' => array('class' => 'btn danger'),
                ),
            )
        );

    }

    private function generateForm($product = array(), $pageNumber = '')
    {
        //show($product);
        $id = (isset($product->id)) ? $product->id : '';
        $form = Form::instance()
            ->open(
                'users',
                array(
                    'method' => 'post',
                    'action' => Url::sitePath('products/type/'.$id.'/'.$pageNumber),
                    'role' => 'form',
                    'style' => 'width:500px;margin-top:35px;float:left;'
                )
            )
            ->addElement('label', 'Product Type', array(
                    'class' => 'col-sm-2 control-label',
                    'style' => 'width:37.667%;'
                )
            )
            ->addElement('text', 'product_type' , array(
                    'value' => (isset($product->product_type)) ? $product->product_type : '',
                    'class' => 'form-control'))
            ->addElement('label', 'Name', array('class' => 'col-sm-2 control-label'))
            ->addElement('text', 'name', array(
                    'value' => (isset($product->name)) ? $product->name : '',
                    'class' => 'form-control'))
            ->addElement('label', 'Price', array('class' => 'col-sm-2 control-label'))
            ->addElement('text', 'price', array(
                    'value' => (isset($product->price)) ? $product->price : '',
                    'class' => 'form-control'))
            ->addElement('submit', 'btnSubmit', array(
                    'value' => 'Save',
                    'class' => 'btn btn-primary',
                    'style' => 'margin-top:15px;'
                )
            )
            ->close()
            ->createForm();

        return $form;

    }

    public function deleteAction($id)
    {
        $product = new ShoppingProducts();
        if ($product->trash($id) == true) {
            Url::redirectTo('products/');
            exit;
        } else {
            echo "Error Occured";exit;
        }
    }

}//End of your products controller
