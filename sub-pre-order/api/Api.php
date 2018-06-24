<?php

class API {

    private $connect = '';

    function __construct()
    {
        $this->database_connection();
    }

    function database_connection()
    {
        $this->connect = new PDO("mysql:host=localhost;dbname=sub_pre_order_db", "root", "");
    }

    function fetech_all()
    {
        $query = "SELECT * FROM orders WHERE is_deleted = 0 ORDER BY id";
        $statement = $this->connect->prepare($query);

        if ($statement->execute()) {
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }

            return $data;
        }
    }

    function insert()
    {
        if (isset($_POST["fullname"])) {
            $form_data = array(
                ':date' => $_POST["date"],
                ':time' => $_POST["time"],
                ':fullname' => $_POST["fullname"],
                ':bread' => $_POST["bread"],
                ':sauce' => $_POST["sauce"],
                ':sandwich_type' => $_POST["sandwich_type"],
                ':cheese' => $_POST["cheese"],
                ':veggies' => $_POST["veggies"],
                ':isDeleted' => 0
            );

            $query = "INSERT INTO orders (date, time, fullname, bread, sauce, sandwich_type, cheese, veggies, is_deleted) VALUES (:date, :time, :fullname, :bread, :sauce, :sandwich_type, :cheese, :veggies, :isDeleted)";
            $statement = $this->connect->prepare($query);

            if ($statement->execute($form_data)) {
                $data[] = array(
                    'success' => '1'
                );
            } else {
                $data[] = array(
                    'success' => '0'
                );
            }

            return $data;
        }
    }

    function fetch_single($id)
    {
        $query = "SELECT * FROM orders WHERE id = '" . $id . "'";
        $statement = $this->connect->prepare($query);

        if ($statement->execute()) {
            foreach ($statement->fetchAll() as $row) {
                $data['date'] = $row['date'];
                $data['time'] = $row['time'];
                $data['fullname'] = $row['fullname'];
                $data['bread'] = $row['bread'];
                $data['sauce'] = $row['sauce'];
                $data['sandwich_type'] = $row['sandwich_type'];
                $data['cheese'] = $row['cheese'];
                $data['veggies'] = $row['veggies'];
            }

            return $data;
        }
    }

    function update()
    {
        if (isset($_POST["fullname"])) {
            $form_data = array(
                ':date' => $_POST["date"],
                ':time' => $_POST["time"],
                ':fullname' => $_POST["fullname"],
                ':bread' => $_POST["bread"],
                ':sauce' => $_POST["sauce"],
                ':sandwich_type' => $_POST["sandwich_type"],
                ':cheese' => $_POST["cheese"],
                ':veggies' => $_POST["veggies"],
                ':id' => $_POST["id"]
            );

            $query = "UPDATE orders SET date = :date, time = :time, fullname = :fullname, bread = :bread, sauce = :sauce, sandwich_type = :sandwich_type, cheese = :cheese, veggies = :veggies WHERE id = :id";
            $statement = $this->connect->prepare($query);

            if ($statement->execute($form_data)) {
                $data[] = array(
                    'success' => '1'
                );
            } else {
                $data[] = array(
                    'success' => '0'
                );
            }

            return $data;
        }
    }

    function delete($id)
    {
        $query = "UPDATE orders SET is_deleted = 1 WHERE id = '" . $id . "'";
        $statement = $this->connect->prepare($query);

        if ($statement->execute($form_data)) {
            $data[] = array(
                'success' => '1'
            );
        } else {
            $data[] = array(
                'success' => '0'
            );
        }

        return $data;
    }

}

?>