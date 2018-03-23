<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');
    }

    protected function _initConfig()
    {
      $config = new Zend_Config($this->getOptions(),true);
      Zend_Registry::set('application',$config);
      return $config;
    }

    /**
     * @return Zend_View
     */
    public function _initView()
    {
        $view = new Zend_View();

        $view->addHelperPath(
            APPLICATION_PATH . '/../vendor/cgsmith/zf1-recaptcha-2/src/Cgsmith/View/Helper',
            'Cgsmith\\View\\Helper\\'
        );

        Zend_Controller_Action_HelperBroker::addHelper(new Zend_Controller_Action_Helper_ViewRenderer($view));

        return $view;
    }
}
