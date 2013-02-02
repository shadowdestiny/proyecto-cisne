﻿<?php

/**
 * This is the model class for table "public.usuarios".
 *
 * The followings are the available columns in table 'public.usuarios':
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $apellido
 * @property integer $cedula
 * @property string $pass
 * @property string $fregistro
 * @property string $facceso
 */
class Usuarios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'public.usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cedula, pass', 'required'),
			array('cedula', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido', 'length', 'max'=>50),
			array('pass', 'length', 'max'=>100),
			array('facceso', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_usuario, nombre, apellido, cedula, pass, fregistro, facceso', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'Identificacion del Usuario',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'cedula' => 'Cédula',
			'pass' => 'Contraseña',
			'fregistro' => 'Fecha de Registro',
			'facceso' => 'Fecha de Acceso',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('cedula',$this->cedula);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('fregistro',$this->fregistro,true);
		$criteria->compare('facceso',$this->facceso,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}