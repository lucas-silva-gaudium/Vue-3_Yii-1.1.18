<?php

/**
 * This is the model class for table "passageiro".
 *
 * The followings are the available columns in table 'passageiro':
 * @property integer $id
 * @property string $nome
 * @property string $nascimento
 * @property string $email
 * @property string $telefone
 * @property string $status
 * @property string $data_hora_status
 * @property string $obs
 */
class Passageiro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'passageiro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, nascimento, email, telefone, status', 'required'),
			array('email', 'email', 'message' => 'O formato do e-mail é inválido.'),
			array('status', 'in', 'range' => array('A', 'I')),
			array('telefone', 'match', 'pattern' => '/^\+\d{2}-\d{2}-\d{8,9}$/', 'message' => 'O formato do telefone é inválido'),
			array('obs', 'length', 'max' => 200, 'message' => 'A mensagem deve ter no máximo 200 caractéres.'),
			array('nome', 'validateName'),
			array('id, nome, nascimento, email, telefone, status, data_hora_status, obs', 'safe', 'on' => 'search')

		);
	}

	public function validateName($attribute, $params): void
	{
		$arrayNomes = explode(' ', $this->nome);
		$arrayNomes = array_filter($arrayNomes);

		$isLessTwoNames = count($arrayNomes) < 2;

		if ($isLessTwoNames) {
			$this->addError($attribute, 'O nome deve ter no mínimo duas palavras.');
			return;
		}
		foreach ($arrayNomes as $currentNome) {
			$qtdChar = strlen($currentNome);
			if ($qtdChar < 3) {
				$this->addError($attribute, 'Cada nome deve der no mínimo 3 caractéres.');
				return;
			}
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'nascimento' => 'Nascimento',
			'email' => 'Email',
			'telefone' => 'Telefone',
			'status' => 'Status',
			'data_hora_status' => 'Data Hora Status',
			'obs' => 'Obs',
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
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('nome', $this->nome, true);
		$criteria->compare('nascimento', $this->nascimento, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('telefone', $this->telefone, true);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('data_hora_status', $this->data_hora_status, true);
		$criteria->compare('obs', $this->obs, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Passageiro the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
