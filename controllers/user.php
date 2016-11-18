<?php

class User extends Controller {

	public function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('role');
		
		if ($logged == false || $role != 'owner') {
			Session::destroy();
			header('location: ../login');
			exit;
		}
			
	}
	
	public function index() 
	{	
		$this->view->userList = $this->model->userList(); //function userlist is user_model
		$this->view->render('user/index'); // Renders the user/index in views
	}

	public function create() 
	{
		$data = array();
		$data['login'] = $_POST['login']; 
		$data['password'] = md5($_POST['password']);
		$data['role'] = $_POST['role'];
		
		// @TODO: Do your error checking!
		
		$this->model->create($data);
		header('location: ' . URL . 'user'); // Refreshes page
	}

	public function edit($id) 
	{
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('user/edit');
	}

	public function edit_Save($id) 
	{	
		$data = array();
		$data['id'] = $id;
		$data['login'] = $_POST['login'];
		$data['password'] = md5($_POST['password']);
		$data['role'] = $_POST['role'];
		
		// @TODO: Do your error checking!
		
		$this->model->editSave($data);
		header('location: ' . URL . 'user'); // Refreshes page
	}

	public function delete($id) 
	{
		$this->model->delete($id);
		header('location: ' . URL . 'user'); // Refreshes page
	}
	
	

}