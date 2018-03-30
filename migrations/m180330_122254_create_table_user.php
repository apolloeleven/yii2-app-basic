<?php

use yii\db\Migration;

/**
 * Class m180330_122254_create_table_user
 */
class m180330_122254_create_table_user extends Migration
{
    /**
     * @return bool|void
     * @author Saiat Kalbiev <kalbievich11@gmail.com>
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}',[
            'id' => $this->primaryKey(),
            'username' => $this->string(32),
            'password_hash' => $this->string(255),
            'auth_key' => $this->string(32),
            'access_token' => $this->string(40),
            'email' => $this->string(255),
            'first_name' => $this->string(255),
            'last_name' => $this->string(255),
            'middle_name' => $this->string(255),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11)
        ]);
    }

    /**
     * @return bool|void
     * @author Saiat Kalbiev <kalbievich11@gmail.com>
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
