<?php

/**
 * This is the model class for table "motorista".
 *
 * The followings are the available columns in table 'motorista':
 * @property integer $id
 * @property string $nome
 * @property string $nascimento
 * @property string $email
 * @property string $telefone
 * @property string $placa_veiculo
 * @property string $status
 * @property string $data_hora_status
 * @property string $obs
 */
class Motorista extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'motorista';
	}

	/**
	 * Validador customizado para o campo 'nome'.
	 * Verifica se o nome tem pelo menos duas palavras com 3+ caracteres cada.
	 * Esta função é chamada pela regra 'validarNomeCompleto' em rules().
	 */
	public function validarNomeCompleto($attribute, $params)
	{
		$palavras = explode(' ', $this->nome);
		$palavras = array_filter($palavras); // Remove itens vazios

		if (count($palavras) < 2) {
			$this->addError($attribute, 'O nome deve ter no mínimo duas palavras.');
			return;
		}

		foreach ($palavras as $palavra) {
			if (strlen(trim($palavra)) < 3) {
				$this->addError($attribute, 'Cada palavra no nome deve ter no mínimo 3 caracteres.');
				return;
			}
		}
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('nome, nascimento, email, telefone, placa_veiculo, status', 'required'),

			// Validações de formato e tamanho
			array('email', 'email', 'message' => 'O formato do e-mail é inválido.'),
			array('status', 'in', 'range' => array('A', 'I')),
			array('obs', 'length', 'max' => 200),

			// Validação customizada para a placa do veículo (formato antigo OU Mercosul)
			array(
				'placa_veiculo',
				'match',
				'pattern' => '/^([A-Z]{3}-\d{4}|[A-Z]{3}\d[A-Z]\d{2})$/',
				'message' => 'Placa do veículo deve estar no formato AAA-9999 ou AAA9A99.'
			),

			// Validação customizada para o nome (reutilizando a mesma lógica do Passageiro)
			array('nome', 'validarNomeCompleto'),

			// Regra 'safe' para a funcionalidade de busca no admin
			array('id, nome, nascimento, email, telefone, placa_veiculo, status, data_hora_status, obs', 'safe', 'on' => 'search'),
		);
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
			'placa_veiculo' => 'Placa Veiculo',
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
		$criteria->compare('placa_veiculo', $this->placa_veiculo, true);
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
	 * @return Motorista the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
