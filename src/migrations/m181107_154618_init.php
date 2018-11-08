<?php

use yii\db\Migration;

/**
 * Class m181107_154618_init
 */
class m181107_154618_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // Category
        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull()->comment('Question status'),
            'created' => $this->integer()->notNull()->comment('Created timstamp'),
            'updated' => $this->integer()->notNull()->comment('Updated timstamp'),
            'answered' => $this->integer()->null()->comment('Answer timestamp'),
            'name' => $this->string()->notNull()->comment('Author name'),
            'email' => $this->string()->notNull()->comment('Author email'),
            'phone' => $this->string()->null()->comment('Author phone'),
            'body' => $this->text()->notNull()->comment('Question body'),
            'answer' => $this->text()->null()->comment('Answer body'),
        ], $tableOptions);

        $this->createIndex('idx-question-status', '{{%question}}', 'status');
        $this->createIndex('idx-question-created', '{{%question}}', 'created');
        $this->createIndex('idx-question-updated', '{{%question}}', 'updated');
        $this->createIndex('idx-question-answered', '{{%question}}', 'answered');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%question}}');
    }

}
