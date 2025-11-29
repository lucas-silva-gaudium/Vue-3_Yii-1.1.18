<?php

class m250815_125235_create_table_motorista extends CDbMigration
{
	public function up()
	{
		$this->createTable('motorista', array(
			'id' => 'pk',
			'nome' => 'string NOT NULL',
			'nascimento' => 'date NOT NULL',
			'email' => 'string NOT NULL',
			'telefone' => 'string NOT NULL',
			'placa_veiculo' => 'string NOT NULL',
			'status' => "CHAR(1) NOT NULL",
			'data_hora_status' => 'datetime NOT NULL',
			'obs' => 'VARCHAR(200) NULL',
		));
	}

	public function down()
	{
		$this->dropTable('motorista');
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
