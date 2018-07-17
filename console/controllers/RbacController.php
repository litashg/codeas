<?php

namespace console\controllers;

use yii\console\Controller;
use Yii;
/**
 * This class cares commands for RBAC
 */
class RbacController extends Controller
{
    /**
     * This command create RBAC roles
     */
    public function actionRoles()
    {
        $admin = Yii::$app->authManager->createRole('admin');
        $admin->description = 'Admin';
        Yii::$app->authManager->add($admin);

        $author = Yii::$app->authManager->createRole('author');
        $author->description = 'Author';
        Yii::$app->authManager->add($author);

        $user = Yii::$app->authManager->createRole('user');
        $user->description = 'User';
        Yii::$app->authManager->add($user);

        $banned_user = Yii::$app->authManager->createRole('banned_user');
        $banned_user->description = 'Banned user';
        Yii::$app->authManager->add($banned_user);

        echo "Roles created";
        exit();
    }

    public function actionPermissions()
    {
       
    }

}
