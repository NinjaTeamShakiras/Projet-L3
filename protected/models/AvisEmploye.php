<?php

/**
 * This is the model class for table "avis_employe".
 *
 * The followings are the available columns in table 'avis_employe':
 * @property integer $id_avis_employe
 * @property integer $note_generale
 * @property datetime $date_creation
 * @property integer $nb_signalements
 * @property integer $id_employe
 * @property integer $id_utilisateur
 *
 * The followings are the available model relations:
 * @property Employe $idEmploye
 * @property Utilisateur $idUtilisateur
 * @property EmployeAvisCritere[] $employeAvisCriteres
 */
class AvisEmploye extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'avis_employe';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('note_generale_avis, date_creation, nb_signalements, id_employe, id_utilisateur', 'required'),
			array('note_generale_avis, nb_signalements, id_employe, id_utilisateur', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_avis_employe, note_generale, date_creation, nb_signalements, id_employe, id_utilisateur', 'safe', 'on'=>'search'),
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
			'idEmploye' => array(self::BELONGS_TO, 'Employe', 'id_employe'),
			'idUtilisateur' => array(self::BELONGS_TO, 'Utilisateur', 'id_utilisateur'),
			'employeAvisCriteres' => array(self::HAS_MANY, 'EmployeAvisCritere', 'id_avis_employe'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_avis_employe' => 'Id Avis Employe',
			'note_generale_avis' => 'Note Generale',
			'date_creation' => 'Date Creation',
			'nb_signalements' => 'Nb Signalements',
			'id_employe' => 'Id Employe',
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

		$criteria->compare('id_avis_employe',$this->id_avis_employe);
		$criteria->compare('note_generale_avis',$this->note_generale);
		$criteria->compare('date_creation',$this->date_creation,true);
		$criteria->compare('nb_signalements',$this->nb_signalements);
		$criteria->compare('id_employe',$this->id_employe);
		$criteria->compare('id_utilisateur',$this->id_utilisateur);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AvisEmploye the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public static function afficher_avis($objet)
	{

		$entreprise_obj = entreprise::get_entreprise_by_id_utilisateur($objet->id_utilisateur);

		if( is_a( $objet, __CLASS__ ) && !is_null( $entreprise_obj ) )
		{
			print
			(
				'<div style="border: solid 1px #298dcd; margin: 2% 0%; padding: 1%;" >
					<p>Note : ' . $objet->note_generale_avis  . '<p>
					<p>Par : ' . $entreprise_obj->nom_entreprise . '</p>
				</div>'

			);
		}
		else 
		{
			throw new InvalidArgumentException("Le paramètre de la fonction ''afficher_avis()'' n'est pas du type '" . __CLASS__ . "'");
		}
	}


	/*		Fonction pour afficher les critères de notation d'un employé
			Paramètres : Aucun paramètre n'est requis
			Return : Void
	*/
	public static function afficher_criteres_notation_employe()
	{
		/*		Affichage des critères de notations 		*/
		foreach ( CriteresNotationEmploye::model()->findAll() as $key => $value )
		{
			print(	'<div class="row">
						<div>' . $value->nom_critere_employe . '</div>' );
			if( $value->critere_note )
				AvisEmploye::afficher_barre_notation( $value->id_critere_employe . '_note' );
			else
				AvisEmploye::afficher_textearea( $value->id_critere_employe .'_text' );
			print(	'</div>' );
		}
	}

	/*		Fonction pour afficher la barre de notation d'un avis employé 		*/
	public static function afficher_barre_notation($nom_str)
	{
		print( '<div class="barre-notation-employe">' );
		for( $i = 0; $i <= 10; $i++ ) {
			print( '<label for="' . $nom_str . '_' . $i . '" style="display : inline-block;" >' . $i . '</label>' );
			print( '	<input type="radio" name="' . $nom_str . '" value="note_' . $i . '"> ' );
		}
		print( '</div>' );
		
	}

	public  static function afficher_textearea( $nom_str )
	{
		print( '<textarea class="' . $nom_str . '" placeholder="Votre texte..."></textarea>' );
	}
}
