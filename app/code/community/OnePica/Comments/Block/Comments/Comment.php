<?php

/**
 * Class OnePica_Comments_Block_Comments_Comment
 */
class OnePica_Comments_Block_Comments_Comment extends Mage_Core_Block_Template
{
    /**Comments model
     *
     * @var OnePica_Comments_Model_Comments
     */
    private $model;

    /**Set model
     * @param OnePica_Comments_Model_Comments $model
     * @return OnePica_Comments_Block_Comments_Comment
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**Get model
     * @return OnePica_Comments_Model_Comments
     */
    public function getModel()
    {
        return $this->model;
    }
}
