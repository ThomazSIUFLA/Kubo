<?php
require_once '../../bibl/Persistence/connection.php';

class TestConnection extends PHPUnit\Framework\TestCase {
    
    public function testConectar(){
        $obj = new Connection();
        $this->assertTrue($obj->getConnection());
    }
}

?>