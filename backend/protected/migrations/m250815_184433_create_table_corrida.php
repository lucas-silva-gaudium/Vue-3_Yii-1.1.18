<?php

class m250815_184433_create_table_corrida extends CDbMigration
{
	public function up()
	{
		$this->createTable('corrida', array(
			'id' => 'pk',
			'passageiro_id' => 'int NOT NULL',
			'motorista_id' => 'int NULL',
			'status' => 'string NOT NULL',

			'origem_endereco' => 'string NOT NULL',
			'origem_latitude' => 'decimal(10, 8) NOT NULL',
			'origem_longitude' => 'decimal(11, 8) NOT NULL',

			'destino_endereco' => 'string NOT NULL',
			'destino_latitude' => 'decimal(10, 8) NOT NULL',
			'destino_longitude' => 'decimal(11, 8) NOT NULL',

			'tarifa' => 'decimal(10, 2) NULL',
			'previsao_chegada_destino' => 'datetime NULL',
			'data_hora_inicio' => 'datetime NOT NULL',
			'data_hora_finalizacao' => 'datetime NULL',
		));

		$this->addForeignKey('fk_corrida_passageiro', 'corrida', 'passageiro_id', 'passageiro', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_corrida_motorista', 'corrida', 'motorista_id', 'motorista', 'id', 'SET NULL', 'CASCADE');
	}

	public function down()
	{
		$this->dropForeignKey('fk_corrida_passageiro', 'corrida');
		$this->dropForeignKey('fk_corrida_motorista', 'corrida');

		$this->dropTable('corrida');
	}
}
