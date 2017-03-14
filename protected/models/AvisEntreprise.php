<?php

/**
 * This is the model class for table "avis_entreprise".
 *
 * The followings are the available columns in table 'avis_entreprise':
 * @property integer $id_avis_entreprise
 * @property integer $note_generale
 * @property string $commentaire_avis_entreprise
 * @property integer $id_entreprise
 * @property integer $id_utilisateur
 *
 * The followings are the available model relations:
 * @property Utilisateur $idUtilisateur
 * @property Entreprise $idEntreprise
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
			array('note_generale, id_entreprise, id_utilisateur', 'numerical', 'integerOnly'=>true),
			array('commentaire_avis_entreprise', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_avis_entreprise, note_generale, commentaire_avis_entreprise, id_entreprise, id_utilisateur', 'safe', 'on'=>'search'),
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
			'idUtilisateur' => array(self::BELONGS_TO, 'Utilisateur', 'id_utilisateur'),
			'idEntreprise' => array(self::BELONGS_TO, 'Entreprise', 'id_entreprise'),
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
			'note_generale' => 'Note Generale',
			'commentaire_avis_entreprise' => 'Commentaire Avis Entreprise',
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
		$criteria->compare('note_generale',$this->note_generale);
		$criteria->compare('commentaire_avis_entreprise',$this->commentaire_avis_entreprise,true);
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


	public static function afficher_avis($objet)
	{

		$employe_obj = Employe::get_employe_by_id_utilisateur($objet->id_utilisateur);

		if( is_a( $objet, __CLASS__ ) )
		{
			print
			(
				'<div>
					<p>Note : ' . $objet->note_generale  . '<p>
					<p>Commentaire : ' . $objet->commentaire_avis_entreprise  . '<p>
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
