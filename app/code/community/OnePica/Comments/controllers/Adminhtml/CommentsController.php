<?php

/**
 * Class OnePica_Comments_Adminhtml_IndexController
 */
class OnePica_Comments_Adminhtml_CommentsController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Index Action
     */
    public function indexAction()
    {
        $this->_initAction()->renderLayout();
    }

    /**
     * Edit Action
     */
    public function editAction()
    {
        $this->_initAction();
        $id = $this->getRequest()->getParam('id', null);
        $model = Mage::getModel('comments/comments');

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
        }
        Mage::register('comment_data', $model);

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
            $model = Mage::getModel('comments/comments');
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
                $model->save();
                if (!$model->getId()) {
                    throw new Mage_Core_Exception($this->__('Error saving comment info'));
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                        $this->__('Comment info was successfully saved.'));
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
     * Delete action
     */
    public function deleteAction()
    {
        $this->_massaction('setDelFlg', 1, 'comment(s) was deleted!');
    }

    /**
     * Approve action
     */
    public function approveAction()
    {
        $this->_massaction('setStatus', 1, 'comment(s) was approved!');
    }

    /**
     * Reject action
     */
    public function rejectAction()
    {
        $this->_massaction('setStatus', 0, 'comment(s) was rejected!');
    }

    /**Massaction
     *
     * @param string $setter
     * @param mixed  $value
     * @param string $successMessage
     */
    private function _massaction($setter, $value, $successMessage)
    {
        if ($this->getRequest()->get('id')) {
            $model = Mage::getModel('comments/comments')->load($this->getRequest()->get('id'));
            $model->$setter($value);
            $model->save();
            Mage::getSingleton('core/session')->addSuccess($successMessage);
        } else {
            $collection = Mage::getModel('comments/comments')->getCollection()->filterByIds($this->getRequest()->get('ids'));
            foreach ($collection as $item) {
                $item->$setter($value);
                $item->save();
            }
            Mage::getSingleton('core/session')->addSuccess($collection->count() . ' ' . $successMessage);
        }
        $this->_redirect('*/*/index');
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
                ->_setActiveMenu('onepica_blog/blog')
                ->_title($this->__('Comments'))->_title($this->__('OnePica'));

        return $this;
    }
}
