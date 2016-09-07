<?php

class MyNamespace_Test_GreetingController extends Mage_Core_Controller_Front_Action
{

    public function viewAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

}