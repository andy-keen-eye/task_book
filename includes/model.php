<?php

    /**
     * PDO-connection
     *
     * @return obj PDO
     */
    function pdoConnection($db_user, $db_pass, $database)
    {
        $dbh = new \PDO('mysql:host=localhost;dbname='.$database.';charset=utf8', $db_user, $db_pass);
        return ($dbh);
    }


    function select_page_data($dbh, $start, $limit, $sort_by, $sort_direction)
    {
        $smtp = $dbh->prepare("SELECT * FROM users ORDER BY ".$sort_by." ".$sort_direction." LIMIT ".$start.", ".$limit);
        $smtp->execute();

        $result_data = $smtp->fetchAll();
        return $result_data;
    }

    function insert_new_task($dbh, $name, $email, $task)
    {
        $sql = "INSERT INTO users (
				name,
				email,
				task) VALUES (
				:name,
				:email,
				:task)";
			$smtp = $dbh->prepare($sql);
			//execute sql-statement
			$smtp->execute(array(
				'name' => $name,
				'email' => $email,
				'task' => $task));
        return;
    }

    function select_admin($dbh, $admin_name, $password)
    {
        $smtp = $dbh->prepare('SELECT * FROM administrators WHERE name = :name');
        $smtp->execute(array('name' => $admin_name));
        $result_data = $smtp->fetchAll();

        return $result_data;
    }

    function select_task_data($dbh, $id)
    {
        $smtp = $dbh->prepare("SELECT * FROM users WHERE id = :id");
        $smtp->execute(array('id' => $id));

        $result_data = $smtp->fetchAll();
        return $result_data;
    }

    function edit_task($dbh, $id, $task, $status)
    {
        $sql = "UPDATE users SET
	        task = :task,
	        status = :status
	        WHERE id = :id";
		$smtp = $dbh->prepare($sql);
		$smtp->execute(array(
		    'task' => $task,
		    'status' => $status,
		    'id' => $id
		    ));
        return;
    }

    //for inserting admin data into db once
    function insert_admin($dbh, $name, $password)
    {
        $sql = "INSERT INTO administrators (
			name,
			hash) VALUES (
			:name,
			:hash)";
		$smtp = $dbh->prepare($sql);
		//execute sql-statement
		$smtp->execute(array(
			'name' => $name,
			'hash' => $password));
        return;
    }

    //filling the users table
    function insert_users($dbh, $name, $email, $task)
    {
		$sql = "INSERT INTO users (
			name,
			email,
			task) VALUES (
			:name,
			:email,
			:task)";
		$smtp = $dbh->prepare($sql);
		//execute sql-statement
		$smtp->execute(array(
			'name' => $name,
			'email' => $email,
			'task' => $task));
        return;
    }