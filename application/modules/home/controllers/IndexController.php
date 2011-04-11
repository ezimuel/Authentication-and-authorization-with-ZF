<?php

class Home_IndexController extends Zend_Controller_Action
{

	private $options;
	
	/**
	 * Init
	 * 
	 * @see Zend_Controller_Action::init()
	 */
    public function init()
    {
        $this->_options= $this->getInvokeArg('bootstrap')->getOptions();
    }

    /**
     * Index
     */
    public function indexAction()
    {
        // @todo Add the home page action
    }
	/**
     * Menu
     */
    public function menuAction()
    {
        // @todo Add the menu page action
    }
}

