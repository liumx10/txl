<?php
	class Group extends AppModel{
		var $name='Group';

		/*
		apartmentid:		the only id for department in the database
		output:				sub department of the department with the same id
		*/
		function find_subgroup_by_id($departmentid){
			return $this->find("all", array('conditions'=>array("Group.belongs"=>$departmentid)));
		}

		/*
		departmentid:		the only id for department in the database
		output:				father department
		*/
		function find_father_by_id($departmentid){
			$d = $this->find("first", array('conditions'=>array("Group.id"=>$departmentid)));
			return $d['Group']['belongs'];
		}

		/*
		departmentid:		the only id for department in the database
		output:				company id
		*/
		function find_company_by_id($departmentid){
			$d = $this->find("first", array('conditions'=>array("Group.id"=>$departmentid)));
			return $d['Group']['belongs'];
		}
		
		/*
		fuzzy search 
		name:		department name
		output:		all department in this company whose name including the 'name'
		*/
		function search_group_by_name($name){
			return $this->query("");
		}
	}
?>