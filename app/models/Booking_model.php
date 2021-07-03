<?php

class Booking_model {
    private $table = 'my_booking_rsv';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllRsv()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    public function getRsvById($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataRsv($data)
    {
        $query = "INSERT INTO $this->table
                    VALUES
                  ('', :nama, :ci_date, :co_date, :cost_current, :cost_total, :address)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('ci_date', $data['ci_date']);
        $this->db->bind('co_date', $data['co_date']);
        $this->db->bind('cost_current', $data['cost_current']);
        $this->db->bind('cost_total', $data['cost_total']);
        $this->db->bind('address', $data['address']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}