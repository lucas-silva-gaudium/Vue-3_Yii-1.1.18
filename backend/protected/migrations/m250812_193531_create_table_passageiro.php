<?php

class m250812_193531_create_table_passageiro extends CDbMigration
{
	public function up()
	{
		$this->createTable('passageiro', array(
			'id' => 'pk',
			'nome' => 'string NOT NULL',
			'nascimento' => 'date NOT NULL',
			'email' => 'string  NOT NULL',
			'telefone' => 'string  NOT NULL',
			'status' => "ENUM('A','I') NOT NULL DEFAULT 'A'",
			'data_hora_status' => 'datetime NOT NULL',
			'obs' => 'VARCHAR(200) DEFAULT NULL',
		));
	}

	public function down()
	{
		$this->dropTable('passageiro');
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
