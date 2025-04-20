<?php

mysqli_report(MYSQLI_REPORT_OFF);


class MYSQLHandler implements DbHandler
{
    private $connection;

    public function connect()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->connection->connect_error) {
            if (DEBUG_MODE) {
                die("<p><b>Connection failed:</b> " . $this->connection->connect_error . "</p>");
            }
            return false;
        }
        return true;
    }

    public function disconnect()
    {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    public function get_data($fields = array(), $start = 0)
    {
        $columns = empty($fields) ? '*' : implode(", ", $fields);
        $query = "SELECT $columns FROM items LIMIT $start, " . RECORDS_PER_PAGE;

        $result = $this->connection->query($query);
        if (!$result) {
            if (DEBUG_MODE) {
                die("<p><b>Query Failed (get_data):</b> " . $this->connection->error . "</p>");
            }
            return [];
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get_record_by_id($id, $primary_key)
    {
        $query = "SELECT * FROM items WHERE $primary_key = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function get_total_count($column = null, $keyword = null)
    {
        if ($column && $keyword) {
            $allowedColumns = ['product_name', 'category', 'CouNtry'];
            if (!in_array($column, $allowedColumns)) {
                return 0;
            }
            $query = "SELECT COUNT(*) as count FROM items WHERE $column LIKE ?";
            $stmt = $this->connection->prepare($query);
            $likeKeyword = '%' . $keyword . '%';
            $stmt->bind_param("s", $likeKeyword);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            $query = "SELECT COUNT(*) as count FROM items";
            $result = $this->connection->query($query);
        }
        return $result->fetch_assoc()['count'];
    }

    public function search_by_column($column, $keyword, $start = 0)
    {
        $allowedColumns = ['product_name', 'category', 'CouNtry'];
        if (!in_array($column, $allowedColumns)) {
            return [];
        }
        $query = "SELECT * FROM items WHERE $column LIKE ? LIMIT $start, " . RECORDS_PER_PAGE;
        $stmt = $this->connection->prepare($query);
        $likeKeyword = '%' . $keyword . '%';
        $stmt->bind_param("s", $likeKeyword);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
