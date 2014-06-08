<?php
namespace Apps\Controllers;

use Cygnite\Application;
use Cygnite\Common\Input;
use Cygnite\FormBuilder\Form;
use Cygnite\AssetManager\Asset;
use Cygnite\Validation\Validator;
use Apps\Models\ShoppingProducts;
use Cygnite\Common\UrlManager\Url;
use Apps\Components\Form\Registration;
use Cygnite\Mvc\Controller\AbstractBaseController;

/**
 * Product Controller - Sample Crud Application
 */

class ProductsController extends AbstractBaseController
{
    // Plain php layout
    protected $layout = 'layout.base';

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
        $products = ShoppingProducts::all(
            array(
                'orderBy' => 'id desc',
                /*'paginate' => array(
                    'limit' => Url::segment(3)
                )*/
            )
        );

        $this->render('index', array(
                                                'products' => $products,
                                                'links' => ShoppingProducts::createLinks(),
                                                'title' => 'Cygnite Framework - Crud Application'
        ));

    }

    /**
     *
     */
    public function typeAction($id = null)
    {
        $input = Input::make();

        $errors = '';
        if ($input->hasPost('btnSubmit') == true) {

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

            // Run validation if fail get errors
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
            // Update the product
            $product = array();
            $product = ShoppingProducts::find($id);
            $form = new Registration($product, Url::segment(4));
            $form->errors = $errors;
            $this->editProduct($id, $form);
        } else {
            //Add a new Product
            $form = new Registration();
            $form->errors = $errors;
            $this->addProduct($form);
        }
    }

    /**
     * Add a new Product view page
     * @param type $form
     */
    private function addProduct($form)
    {
        // Since our all all logic is in controller
        // We can also use same view page for create and update
        $this->render('create', array(
                                                'form' => $form->buildForm()->render(),
                                                'validation_errors' => $form->errors,
                                               'title' => 'Add a new Product'
        ));
    }

    /**
     * Call update view page
     * @param type $id
     * @param type $form
     */
    private function editProduct($id, $form)
    {
        // Since our all all logic is in controller
        // You can also use same view page for create and update
        $this->render('create', array(
                                                'form' => $form->buildForm()->render(),
                                                'validation_errors' => $form->errors,
                                               'title' => 'Update the Product'
        ));
    }

    /**
     *  Display product details
     * @param type $id
     */
    public function showAction($id)
    {
        $product = ShoppingProducts::find($id);

        $this->render('view', array(
                                                'product' => $product,
                                                'title' => 'Show the Product'
        ));
    }

    /**
     *  Delete product using id
     *
     * @param type $id
     */
    public function deleteAction($id)
    {
        $product = new ShoppingProducts();
        if ($product->trash($id) == true) {
            Url::redirectTo('products/');
        } else {
            echo "Error Occured";exit;
        }
    }

}//End of your products controller
