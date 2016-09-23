<?php

/**
 * Class OnePica_Comments_IndexController
 */
class OnePica_Comments_IndexController extends Mage_Core_Controller_Front_Action
{
    /**Config helper
     *
     * @var OnePica_Comments_Helper_Config
     */
    private $configHelper;

    /**Customer session
     *
     * @var Mage_Customer_Model_Session
     */
    private $customerSession;

    /**PreDispatch
     *
     * @return OnePica_Comments_IndexController
     */
    public function preDispatch()
    {
        $this->configHelper = Mage::helper('comments/config');
        if (!$this->configHelper->enableComments()) {
            $this->_forward(404);
        }
        parent::preDispatch();
        $this->customerSession = Mage::getSingleton('customer/session');

        return $this;
    }

    /**
     * New action
     */
    public function newAction()
    {
        if (!$this->customerSession->isLoggedIn() && $this->configHelper->loginRequired()) {
            $this->_forward(404);
        }
        $request = $this->getRequest();

        if ($request->isPost()) {
            $status = $this->configHelper->autoApprove();
            $model = Mage::getModel('comments/comments')->setData($request->getPost());
            $model->setStatus($status);
            if (!$this->configHelper->loginRequired() && $this->customerSession->isLoggedIn()) {
                $model->setCustomerId($this->customerSession->getId());
                $model->setName('');
            }
            if ($this->configHelper->loginRequired() && $this->customerSession->isLoggedIn()) {
                $model->setCustomerId($this->customerSession->getId());
                $model->setName('');
            }
            if (!$this->configHelper->loginRequired() && !$this->customerSession->isLoggedIn()) {
                $model->setCustomerId(0);
            }
            $model->save();
            if ($model->getId()) {
                $message = 'Comment was added!';
                if (!$status) {
                    $message = 'Your comment has been sent for moderation!';
                }
                Mage::getSingleton('core/session')->addSuccess($this->__($message));
                $this->_redirect('blog/index/view', array('id' => $model->getPostId()));
            } else {
                Mage::getSingleton('core/session')->addError($this->__('Error!'));
            }
        }
    }

    /**
     * Load action
     */
    public function loadAction()
    {
        if ($this->getRequest()->isAjax()) {
            $this->loadLayout();
            $this->getResponse()->setBody($this->getLayout()->getBlock('load.comments')->toHtml());
        }
    }
}
