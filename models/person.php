<?php
	class Person extends AppModel{
		var $name='Person';
		var $useTable="people";
		/*
			openid:		weixin openid
			output:		person with the same openid
		*/
		function find_person_by_openid($openid){
			return $this->find('first', array('conditions'=>array('Person.id'=>$openid)));
		}

		/*
			id:		the only id for person in the database;
			output:	person with the same id
		*/
		function find_person_by_id($id){
			return $this->find('all', array('conditions'=>array('Person.id'=>$id)));
		}

		/*
			tel:	person tellphone number
			output: person with the same tel-number
		*/
		function find_person_by_tel($tel){
			$p = $this->find('first', array('conditions'=>array('Person.tel'=>$tel)));
			return $p['Person'];
		}

		/*	personid: 	the only id for person in the database;
			output:		the person's company
			*/
		function find_company_by_person($personid){
			$p = $this->find('first', array('conditions'=> array('Person.id' => $personid)));
			return $p['Person']['belongs'];
		}

		/*	personid:	the only id for person in the database;
			output:		the person's direct department
		*/
		function find_department_by_person($personid){
			$p = $this->find('first', array('conditions'=> array('Person.id' => $personid)));
			return $p['Person']['belongs'];
		}


		/*	departmentid:	the only id for company in the database;
			output:			people belongs to this company;
		*/
		function find_people_by_department_id($departmentid){
			return $this->find('all', array('conditions'=> array('Person.belongs'=>$departmentid)));
		}

		/*
			fuzzy search
			name:		stuff name
			output:		array of people whose name including 'name'
		*/
		function search_people_by_name($name){
			$query = 'select * from people as Person where name like "%';
			$query = $query.$name;
			$query = $query.'%"';
			return $this->query($query);
		}
	}
?>