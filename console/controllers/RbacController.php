<?php


namespace console\controllers;


use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $createProduct = $auth->createPermission('createProduct');
        $createProduct->description = 'Create a product';
        $auth->add($createProduct);

        $updateProduct = $auth->createPermission('updateProduct');
        $updateProduct->description = 'Update product';
        $auth->add($updateProduct);

        $createOrder = $auth->createPermission('createOrder');
        $createOrder->description = 'Create a order';
        $auth->add($createOrder);

        $updateOrder = $auth->createPermission('updateOrder');
        $updateOrder->description = 'Update order';
        $auth->add($updateOrder);

        $customer = $auth->createRole('customer');
        $auth->add($customer);
        $auth->addChild($customer, $createOrder);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createProduct);
        $auth->addChild($admin, $updateProduct);
        $auth->addChild($admin, $updateOrder);
        $auth->addChild($admin, $customer);

        $auth->assign($admin, 1);
    }

}