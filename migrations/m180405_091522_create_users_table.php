<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m180405_091522_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey()->unique(),
            'login' => $this->string(45)->notNull()->unique(),
            'password' => $this->string(45)->notNull(),
            'referer' => $this->string(45)->notNull(),
        ]);

        $this->alterColumn('users', 'id', $this->bigInteger(11).' NOT NULL AUTO_INCREMENT');

        $this->createIndex("referer_index", "users", "referer");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
        $this->dropIndex("referer_index", "users");
    }
}
