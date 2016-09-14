<?php

/**
 * Class OnePica_Blog_Adminhtml_BlogController
 */
class OnePica_Blog_Adminhtml_BlogController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Index Action
     */
    public function indexAction()
    {
        $this->_initAction()->renderLayout();
    }

    /**
     * New Action
     */
    public function newAction()
    {
        $this->_forward('edit');
    }

    /**
     * Edit Action
     */
    public function editAction()
    {
        $this->_initAction();
        $id = $this->getRequest()->getParam('id', null);
        $model = Mage::getModel('onepica_blog/post');

        if ($id) {
            $model->load((int)$id);
            if ($model->getId()) {
                $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
                if ($data) {
                    $model->setData($data)->setId($id);
                }
            } else {
                Mage::getSingleton('adminhtml/session')->addError($this->__('Post info does not exist'));
                $this->_redirect('*/*/');
            }
            Mage::register('post_tags', $model->getRelatedTags());
        }
        Mage::register('posts_data', $model);

        $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
        $this->renderLayout();
    }

    /**
     * Save Action
     */
    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        if ($data) {
            $model = Mage::getModel('onepica_blog/post');
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }
            $model->setData($data);
            Mage::getSingleton('adminhtml/session')->setFormData($data);
            try {
                if ($id) {
                    $model->setId($id);
                }

                if (empty($model->getStartPublishing())) {
                    $model->setStartPublishing(0);
                }

                if (empty($model->getEndPublishing())) {
                    $model->setEndPublishing(0);
                }

                $model->save();
                if (!$model->getId()) {
                    throw new Mage_Core_Exception($this->__('Error saving post info'));
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                        $this->__('Post info was successfully saved.'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);

                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/');
                }
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                if ($model && $model->getId()) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/');
                }
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('No data found to save'));
        $this->_redirect('*/*/');
    }

    /**
     * Delete Action
     */
    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                $model = Mage::getModel('onepica_blog/post');
                $model->setId($id);
                $model->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The post info has been deleted.'));
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find the post info to delete.'));
        $this->_redirect('*/*/');
    }

    /**
     * Initialize action
     * Here, we set the breadcrumbs and the active menu
     *
     * @return Mage_Adminhtml_Controller_Action
     */
    protected function _initAction()
    {
        $this->loadLayout()
                // Make the active menu match the menu config nodes (without 'children' inbetween)
                ->_setActiveMenu('onepica_blog/blog')
                ->_title($this->__('Blog'))->_title($this->__('OnePica'));

        return $this;
    }

    /**Is allowed
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
    }
}
