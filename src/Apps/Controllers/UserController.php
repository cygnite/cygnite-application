<?php
namespace Apps\Controllers;

use Cygnite\Mvc\Controller\AbstractBaseController;

/**
 * This file is generated by Craft Console
 * You may alter code to fit your needs.
 */

class UserController extends AbstractBaseController
{
    protected $layout = 'layouts.base';

    protected $templateEngine = false;

    /**
     * Your constructor.
     *
     * @access public
     *
     */
    public function __construct()
    {
    
    }

    /**
     * List all data of resource.
     *
     */
    public function getIndexAction()
    {
        //
        echo "Hi! " . __FUNCTION__;
    }


    /**
     * Display the form for creating new resource.
     *
     */
    public function getNewAction()
    {
        //
        echo "Hi! " . __FUNCTION__;

    }


    /**
     * Creating a resource and save into database.
     *
     */
    public function postCreateAction()
    {
        //
        echo "Hi! " . __FUNCTION__;

    }


    /**
     * Display specific information into the page.
     *
     * @param  int $id
     */
    public function getShowAction($id)
    {
        //
        echo "Hi! $id " . __FUNCTION__;

    }


    /**
     * Display specific information into the form to edit.
     *
     * @param  int $id
     */
    public function getEditAction($id)
    {
        //
        echo "Hi! $id   " . __FUNCTION__;

    }


    /**
     * Update specific resource into database
     *
     * @param  int $id
     */
    public function putUpdateAction($id)
    {
        //
        echo "Hi! $id   " . __FUNCTION__;

    }


    /**
     * Delete specific resource from database
     *
     * @param  int $id
     */
    public function deleteAction($id)
    {
        //

        echo "Hi! $id   " . __FUNCTION__;
    }
}