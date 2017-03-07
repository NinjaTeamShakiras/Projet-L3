<?php

/**
 * This is the model class for table "criteres_notation_employe".
 *
 * The followings are the available columns in table 'criteres_notation_employe':
 * @property integer $id_critere_employe
 * @property string $nom_critere_employe
 * @property integer $critere_note_employe
 *
 * The followings are the available model relations:
 * @property EmployeAvisCritere[] $employeAvisCriteres
 */
class CriteresNotationEmploye extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'criteres_notation_employe';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('critere_note_employe', 'numerical', 'integerOnly'=>true),
			array('nom_critere_employe', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_critere_employe, nom_critere_employe, critere_note_employe', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'EmployeAvisCriteres' => array(self::HAS_MANY, 'EmployeAvisCritere', 'id_critere_notation_employe'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_critere_employe' => 'Id Critere Employe',
			'nom_critere_employe' => 'Nom Critere Employe',
			'critere_note_employe' => 'Critere Note Employe',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id_critere_employe',$this->id_critere_employe);
		$criteria->compare('nom_critere_employe',$this->nom_critere_employe,true);
		$criteria->compare('critere_note_employe',$this->critere_note_employe);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CriteresNotationEmploye the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
