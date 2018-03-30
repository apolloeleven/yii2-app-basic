<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\User;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;
use yii\helpers\VarDumper;

class UserController extends Controller
{
    public $username;
    public $password;

    /**
     * @param string $actionID
     * @return array|string[]
     * @author Saiat Kalbiev <kalbievich11@gmail.com>
     */
    public function options($actionID)
    {
        return ['username', 'password'];
    }

    /**
     * @return array
     * @author Saiat Kalbiev <kalbievich11@gmail.com>
     */
    public function optionAliases()
    {
        return [
            'u' => 'username',
            'p' => 'password'
        ];
    }

    /**
     * @author Saiat Kalbiev <kalbievich11@gmail.com>
     */
    public function actionAddUser()
    {
        if(!$this->password || !$this->username) {
            Console::output("Could not process data. Both username and password should be provided. Try entering [-u and -p]");
            return;
        }

        if (!$this->confirm("User with username `{$this->username}` and password `{$this->password}` will be created. Are you sure you want to continue?")) {
            return;
        }

        $user = new User();
        $user->username = $this->username;
        $user->setPassword($this->password);

        if($user->validate() && $user->save()) {
            Console::output("User has been successfully created");
        } else {
            Console::output("Error has happened while creating user. Errors: " . VarDumper::dumpAsString($user->errors));
        }
    }
}
