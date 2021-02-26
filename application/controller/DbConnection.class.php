<?php

class DbConnection
{

	protected $db_name = 'singlevendor';
	protected $db_admin = 'admin';
	protected $db_customer = 'customer';
	protected $db_pass = '1234';
	protected $db_host = 'localhost';

	public function connect()
	{

		$connect_db = new mysqli($this->db_host, $this->db_admin, $this->db_pass, $this->db_name);

		if (mysqli_connect_errno()) {
			printf("Connection failed: %s\ ", mysqli_connect_error());
			exit();
		} else {
			//print("connected successfully");
		}
		return $connect_db;
	}
	public function connect1()
	{

		$connect_db1 = new mysqli($this->db_host, $this->db_customer, $this->db_pass, $this->db_name);

		if (mysqli_connect_errno()) {
			printf("Connection failed: %s\ ", mysqli_connect_error());
			exit();
		} else {
			//print("connected successfully");
		}
		return $connect_db1;
	}
}
