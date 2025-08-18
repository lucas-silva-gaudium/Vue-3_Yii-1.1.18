<?php

/**
 * This is the model class for table "corrida".
 *
 * The followings are the available columns in table 'corrida':
 * @property integer $id
 * @property integer $passageiro_id
 * @property integer $motorista_id
 * @property string $status
 * @property string $origem_endereco
 * @property string $origem_latitude
 * @property string $origem_longitude
 * @property string $destino_endereco
 * @property string $destino_latitude
 * @property string $destino_longitude
 * @property string $tarifa
 * @property string $previsao_chegada_destino
 * @property string $data_hora_inicio
 * @property string $data_hora_finalizacao
 *
 * The followings are the available model relations:
 * @property Motorista $motorista
 * @property Passageiro $passageiro
 */
class Corrida extends CActiveRecord
{
	public $passageiro_nome;
	public $motorista_nome;
	public $data_inicio;
	public $data_fim;


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'corrida';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('passageiro_id, status, origem_endereco, origem_latitude, origem_longitude, destino_endereco, destino_latitude, destino_longitude, data_hora_inicio', 'required'),
			array('passageiro_id, motorista_id', 'numerical', 'integerOnly' => true),
			array('origem_latitude, origem_longitude, destino_latitude, destino_longitude, tarifa', 'numerical'),
			array('status, origem_endereco, destino_endereco', 'length', 'max' => 255),
			array('previsao_chegada_destino, data_hora_finalizacao', 'safe'),
			array('id, passageiro_id, motorista_id, status, origem_endereco, origem_latitude, origem_longitude, destino_endereco, destino_latitude, destino_longitude, tarifa, previsao_chegada_destino, data_hora_inicio, data_hora_finalizacao, passageiro_nome, motorista_nome, data_inicio, data_fim', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'motorista' => array(self::BELONGS_TO, 'Motorista', 'motorista_id'),
			'passageiro' => array(self::BELONGS_TO, 'Passageiro', 'passageiro_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'passageiro_id' => 'Passageiro',
			'motorista_id' => 'Motorista',
			'status' => 'Status',
			'origem_endereco' => 'Origem Endereco',
			'origem_latitude' => 'Origem Latitude',
			'origem_longitude' => 'Origem Longitude',
			'destino_endereco' => 'Destino Endereco',
			'destino_latitude' => 'Destino Latitude',
			'destino_longitude' => 'Destino Longitude',
			'tarifa' => 'Tarifa',
			'previsao_chegada_destino' => 'Previsao Chegada Destino',
			'data_hora_inicio' => 'Data Hora Inicio',
			'data_hora_finalizacao' => 'Data Hora Finalizacao',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->with = array('passageiro', 'motorista');

		$criteria->compare('t.id', $this->id);
		$criteria->compare('t.status', $this->status, true);
		$criteria->compare('passageiro.nome', $this->passageiro_nome, true);
		$criteria->compare('motorista.nome', $this->motorista_nome, true);

		if (!empty($this->data_inicio)) {
			$criteria->addCondition('t.data_hora_inicio >= :data_inicio');
			$criteria->params[':data_inicio'] = $this->data_inicio . ' 00:00:00';
		}
		if (!empty($this->data_fim)) {
			$criteria->addCondition('t.data_hora_inicio <= :data_fim');
			$criteria->params[':data_fim'] = $this->data_fim . ' 23:59:59';
		}

		$criteria->order = "CASE t.status WHEN 'Em andamento' THEN 1 ELSE 2 END, t.data_hora_inicio DESC";

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Corrida the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
