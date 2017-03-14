<?php

/**
 * This is the model class for table "entreprise".
 *
 * The followings are the available columns in table 'entreprise':
 * @property integer $id_entreprise
 * @property string $nom_entreprise
 * @property integer $nombre_employes
 * @property integer $recherche_employes
 * @property string $mail_entreprise
 * @property string $telephone_entreprise
 * @property integer $id_adresse
 *
 * The followings are the available model relations:
 * @property AvisEntreprise[] $avisEntreprises
 * @property EmployeAvisCritere[] $employeAvisCriteres
 * @property Adresse $idAdresse
 * @property Travaille[] $travailles
 */
class Entreprise extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'entreprise';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_employes, recherche_employes, id_adresse', 'numerical', 'integerOnly'=>true),
			array('nom_entreprise', 'length', 'max'=>45),
			array('mail_entreprise', 'length', 'max'=>70),
			array('telephone_entreprise', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_entreprise, nom_entreprise, nombre_employes, recherche_employes, mail_entreprise, telephone_entreprise, id_adresse', 'safe', 'on'=>'search'),
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
			'AvisEntreprises' => array(self::HAS_MANY, 'AvisEntreprise', 'id_entreprise'),
			'AmployeAvisCriteres' => array(self::HAS_MANY, 'EmployeAvisCritere', 'id_entreprise'),
			'Adresse' => array(self::BELONGS_TO, 'Adresse', 'id_adresse'),
			'Travaille' => array(self::HAS_MANY, 'Travaille', 'id_entreprise'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_entreprise' => 'Id de l\'entreprise',
			'nom_entreprise' => 'Nom de l\'entreprise',
			'nombre_employes' => 'Nombre d\'employés',
			'recherche_employes' => 'Recherche employés',
			'mail_entreprise' => 'Mail',
			'telephone_entreprise' => 'Telephone',
			'id_adresse' => 'Id adresse',
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

		$criteria->compare('id_entreprise',$this->id_entreprise);
		$criteria->compare('nom_entreprise',$this->nom_entreprise,true);
		$criteria->compare('nombre_employes',$this->nombre_employes);
		$criteria->compare('recherche_employes',$this->recherche_employes);
		$criteria->compare('mail_entreprise',$this->mail_entreprise,true);
		$criteria->compare('telephone_entreprise',$this->telephone_entreprise,true);
		$criteria->compare('id_adresse',$this->id_adresse);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



	public function AfficheTelephone($tel,$carEspacement=" ")
	{
		/**
		* AfficheTelephone : Place un caractère (carEspacement) tout les 2 chiffres.
		* @tel : numéro de téléphone de l'entreprise
		* @carEspacement : caractère à placer entre chaque 2 chiffres
		* return : une chaine de caractère (res) contenant le numéro de téléphone près à être
		* 			affiché
		*/

		$res ="";

		for($i=0; $i<=10; $i++)
		{
			// On ajoute "carEspacement" tous les 2 chiffres.
			if($i%2==0)
			{
				$res .= substr($tel, $i, 2);
				$res .= $carEspacement;
			}
		}
		$res = substr($res, 0, -2); // Suppression de l'espace ajouté à la fin de la boucle

		return($res);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Entreprise the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
