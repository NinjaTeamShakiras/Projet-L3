<?php

/**
 * This is the model class for table "avis_entreprise".
 *
 * The followings are the available columns in table 'avis_entreprise':
 * @property integer $id_avis_entreprise
 * @property integer $note_generale_avis
 * @property datetime $date_creation
 * @property integer $nb_signalements
 * @property integer $id_entreprise
 * @property integer $id_utilisateur
 *
 * The followings are the available model relations:
 * @property Entreprise $idEntreprise
 * @property Utilisateur $idUtilisateur
 * @property EntrepriseAvisCritere[] $entrepriseAvisCriteres
 */
class AvisEntreprise extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'avis_entreprise';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('note_generale_avis_entreprise, date_creation, nb_signalements, id_entreprise, id_utilisateur', 'required'),
			array('note_generale_avis_entreprise, nb_signalements, id_entreprise, id_utilisateur', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_avis_entreprise, note_generale_avis_entreprise, date_creation, nb_signalements, id_entreprise, id_utilisateur', 'safe', 'on'=>'search'),
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
			'idEntreprise' => array(self::BELONGS_TO, 'Entreprise', 'id_entreprise'),
			'idUtilisateur' => array(self::BELONGS_TO, 'Utilisateur', 'id_utilisateur'),
			'entrepriseAvisCriteres' => array(self::HAS_MANY, 'EntrepriseAvisCritere', 'id_avis_entreprise'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_avis_entreprise' => 'Id Avis Entreprise',
			'note_generale_avis_entreprise' => 'Note Generale Avis',
			'date_creation' => 'Date Creation',
			'nb_signalements' => 'Nb Signalements',
			'id_entreprise' => 'Id Entreprise',
			'id_utilisateur' => 'Id Utilisateur',
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

		$criteria->compare('id_avis_entreprise',$this->id_avis_entreprise);
		$criteria->compare('note_generale_avis_entreprise',$this->note_generale_avis);
		$criteria->compare('date_creation',$this->date_creation,true);
		$criteria->compare('nb_signalements',$this->nb_signalements);
		$criteria->compare('id_entreprise',$this->id_entreprise);
		$criteria->compare('id_utilisateur',$this->id_utilisateur);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AvisEntreprise the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	/* 		Affiche un avis d'une entreprise 		*/
	public static function afficher_avis( $objet )
	{

		$employe_obj = employe::get_employe_by_id_utilisateur($objet->id_utilisateur);

		if( is_a( $objet, __CLASS__ ) && !is_null( $employe_obj ) )
		{
			print
			(
				'<div style="border: solid 1px #298dcd; margin: 2% 0%; padding: 1%;" >
					<p>Note : ' . $objet->note_generale_avis_entreprise  . '<p>
					<p>Par : ' . $employe_obj->nom_employe . '</p>
				</div>'

			);
		}
		else 
		{
			throw new InvalidArgumentException("Le paramètre de la fonction ''afficher_avis()'' n'est pas du type '" . __CLASS__ . "'");
		}
	}


}
