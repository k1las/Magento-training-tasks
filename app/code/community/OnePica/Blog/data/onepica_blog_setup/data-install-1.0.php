<?php
/**
 * Magento Enterprise Edition
 * NOTICE OF LICENSE
 * This source file is subject to the Magento Enterprise Edition End User License Agreement
 * that is bundled with this package in the file LICENSE_EE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.magento.com/license/enterprise-edition
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Mage
 * @package     Mage_Admin
 * @copyright   Copyright (c) 2006-2015 X.commerce, Inc. (http://www.magento.com)
 * @license     http://www.magento.com/license/enterprise-edition
 */

/**
 * Save administrators group role and rules
 */
$newsModerRole = Mage::getModel('admin/role')->setData(array(
        'parent_id' => 0,
        'tree_level' => 1,
        'sort_order' => 0,
        'role_type' => 'G',
        'user_id' => 0,
        'role_name' => 'Blog moderators',
        'gws_websites' => 1,
        'gws_store_groups' => 1,
))->save();

$roleResources = array('all' => 'deny',
        'admin/system' => 'allow',
        'admin/system/acl' => 'deny',
        'admin/system/store' => 'deny',
        'admin/system/adminnotification' => 'deny',
        'admin/system/api' => 'deny',
        'admin/system/cache' => 'deny',
        'admin/system/config' => 'allow',
        'admin/system/config/admin' => 'deny',
        'admin/system/config/advanced' => 'deny',
        'admin/system/config/api' => 'deny',
        'admin/system/config/carriers' => 'deny',
        'admin/system/config/catalog' => 'deny',
        'admin/system/config/cataloginventory' => 'deny',
        'admin/system/config/checkout' => 'deny',
        'admin/system/config/cms' => 'deny',
        'admin/system/config/configswatches' => 'deny',
        'admin/system/config/contacts' => 'deny',
        'admin/system/config/content_staging' => 'deny',
        'admin/system/config/currency' => 'deny',
        'admin/system/config/customer' => 'deny',
        'admin/system/config/design' => 'deny',
        'admin/system/config/dev' => 'deny',
        'admin/system/config/downloadable' => 'deny',
        'admin/system/config/enterprise_catalogpermissions' => 'deny',
        'admin/system/config/enterprise_giftregistry' => 'deny',
        'admin/system/config/enterprise_invitation' => 'deny',
        'admin/system/config/enterprise_reward' => 'deny',
        'admin/system/config/general' => 'deny',
        'admin/system/config/giftcard' => 'deny',
        'admin/system/config/giftcardaccount' => 'deny',
        'admin/system/config/google' => 'deny',
        'admin/system/config/index_management' => 'deny',
        'admin/system/config/logging' => 'deny',
        'admin/system/config/moneybookers' => 'deny',
        'admin/system/config/newsletter' => 'deny',
        'admin/system/config/blog_options' => 'allow',
        'admin/system/config/oauth' => 'deny',
        'admin/system/config/payment' => 'deny',
        'admin/system/config/payment_services' => 'deny',
        'admin/system/config/paypal' => 'deny',
        'admin/system/config/persistent' => 'deny',
        'admin/system/config/promo' => 'deny',
        'admin/system/config/reports' => 'deny',
        'admin/system/config/rss' => 'deny',
        'admin/system/config/sales' => 'deny',
        'admin/system/config/sales_email' => 'deny',
        'admin/system/config/sales_pdf' => 'deny',
        'admin/system/config/sendfriend' => 'deny',
        'admin/system/config/shipping' => 'deny',
        'admin/system/config/sitemap' => 'deny',
        'admin/system/config/system' => 'deny',
        'admin/system/config/tax' => 'deny',
        'admin/system/config/test_options' => 'deny',
        'admin/system/config/trans_email' => 'deny',
        'admin/system/config/web' => 'deny',
        'admin/system/config/wishlist' => 'deny',
        'admin/system/convert' => 'deny',
        'admin/system/crypt_key' => 'deny',
        'admin/system/currency' => 'deny',
        'admin/system/design' => 'deny',
        'admin/system/email_template' => 'deny',
        'admin/system/enterprise_logging' => 'deny',
        'admin/system/enterprise_staging' => 'deny',
        'admin/system/extensions' => 'deny',
        'admin/system/index' => 'deny',
        'admin/system/myaccount' => 'deny',
        'admin/system/order_statuses' => 'deny',
        'admin/system/tools' => 'deny',
        'admin/system/variable' => 'deny',
        'admin/onepica_blog' => 'allow',
);

foreach ($roleResources as $key => $value) {
    Mage::getModel('admin/rules')->setData(array(
            'role_id' => $newsModerRole->getId(),
            'resource_id' => $key,
            'privileges' => null,
            'assert_id' => 0,
            'role_type' => 'G',
            'permission' => $value
    ))->save();
}

$date = date('Y-m-d H:i:s', time());

$user = Mage::getModel('admin/user')->setData(array(
        'firstname' => 'Blog',
        'lastname' => 'Moderator',
        'email' => uniqid().'blog1.moderator@gmail.com',
        'username' => uniqid().'blogModerator',
        'password' => 'password',
        'created' => $date,
        'modified' => $date,
        'logdate' => null,
        'lognum' => 0,
        'reload_acl_flg' => 0,
        'is_active' => 1,
        'extra' => 'N;',
        'rp_token' => null,
        'rp_token_created_at' => null,
        'failures_num' => 0,
        'first_failure' => null,
        'lock_expires' => null
))->save();

Mage::getModel('admin/role')->setData(array(
        'parent_id' => $newsModerRole->getId(),
        'tree_level' => 2,
        'sort_order' => 0,
        'role_type' => 'U',
        'user_id' => $user->getId(),
        'role_name' => $user->getLastname()
))->save();
