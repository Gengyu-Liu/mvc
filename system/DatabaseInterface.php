<?php

interface DatabaseInterface {
	// INSERT INTO kunde (vorname,nachname) VALUES ('Max','Mustermann')
    public function insert($table, array $data);
	// DELETE FROM kunde WHERE id=3
    public function delete($table, $where);
	// UPDATE kunde SET vorname='Max', nachname='Mustermann' WHERE id=4
    public function update($table, array $data, $where);
	// SELECT * FROM kunde
    public function get($table);
}
