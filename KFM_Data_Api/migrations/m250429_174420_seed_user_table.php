<?php

use yii\db\Migration;

class m250429_174420_seed_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $time = time();
        $this->batchInsert('{{%user}}', 
            ['username', 'auth_key', 'password_hash', 'email', 'status', 'created_at', 'updated_at'], [
            [
                'admin',
                Yii::$app->security->generateRandomString(),
                Yii::$app->security->generatePasswordHash('admin123'),
                'admin@example.com',
                10,
                $time,
                $time,
            ],
            [
                'user',
                Yii::$app->security->generateRandomString(),
                Yii::$app->security->generatePasswordHash('user123'),
                'user@example.com',
                10,
                $time,
                $time,
            ],
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%user}}', ['username' => ['admin', 'user']]);
    }
}

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250429_174420_seed_user_table cannot be reverted.\n";

        return false;
    }
    */
