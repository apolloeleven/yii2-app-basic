<?php

use yii\db\Migration;

/**
 * Class m180330_123743_create_insert_migration_for_test_users
 */
class m180330_123743_create_insert_migration_for_test_users extends Migration
{
    /**
     * @return bool|void
     * @author Saiat Kalbiev <kalbievich11@gmail.com>
     */
    public function safeUp()
    {
        try {
            $accessToken = \Yii::$app->security->generateRandomString(32);
            $password = Yii::$app->security->generatePasswordHash('somerandompassword');
        } catch (\yii\base\Exception $e) {

        }

        $this->insert('{{%user}}',[
            'username' => 'webmaster',
            'password_hash' => $password,
            'access_token' => $accessToken,
            'email' => 'johndoe@johndoe.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'middle_name' => '',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    public function safeDown()
    {
    }

}
