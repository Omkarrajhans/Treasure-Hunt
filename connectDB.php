<?php
use PHPUnit\Framework\TestCase;

class ConnectDBTest extends TestCase
{
    private $db;
 
    protected function setUp(): void
    {
        $this->db = new mysqli('localhost', 'username', 'password', 'test_db');
        if ($this->db->connect_error) {
            die('Connection failed: ' . $this->db->connect_error);
        }
    }
 
    protected function tearDown(): void
    {
        $this->db->close();
    }
 
    public function testConnectDB(): void
    {
        // Arrange
        $player_name = 'John Doe';
        $email = 'johndoe@example.com';
        $password = 'password123';
        
        // Act
        connectDB($player_name, $email, $password, $this->db);
        
        // Assert
        $this->assertFalse(mysqli_error($this->db), 'Database query failed');
        $this->assertEquals(1, $this->db->affected_rows, 'Expected 1 row to be added to players table');
        $this->assertEquals(1, $this->db->affected_rows, 'Expected 1 row to be added to tasks table');
        
        // Get the inserted row from players table
        $result = $this->db->query("SELECT * FROM players WHERE email = '$email'");
        $row = $result->fetch_assoc();
        $this->assertEquals($player_name, $row['player_name'], 'Expected player name does not match');
        $this->assertEquals($email, $row['email'], 'Expected email does not match');
        $this->assertEquals($password, $row['password'], 'Expected password does not match');
        
        // Get the inserted row from tasks table
        $result = $this->db->query("SELECT * FROM tasks WHERE email = '$email'");
        $row = $result->fetch_assoc();
        $this->assertEquals(0, $row['task1'], 'Expected default value for task1 does not match');
        $this->assertEquals(0, $row['task1_attempts'], 'Expected default value for task1_attempts does not match');
        $this->assertEquals(0, $row['task2'], 'Expected default value for task2 does not match');
        $this->assertEquals(0, $row['task2_attempts'], 'Expected default value for task2_attempts does not match');
        $this->assertEquals(0, $row['task3'], 'Expected default value for task3 does not match');
        $this->assertEquals(0, $row['task3_attempts'], 'Expected default value for task3_attempts does not match');
        $this->assertEquals(0, $row['task4'], 'Expected default value for task4 does not match');
        $this->assertEquals(0, $row['task4_attempts'], 'Expected default value for task4_attempts does not match');
        $this->assertEquals(0, $row['task5'], 'Expected default value for task5 does not match');
        $this->assertEquals(0, $row['task5_attempts'], 'Expected default value for task5_attempts does not match');
        $this->assertEquals(0, $row['task6'], 'Expected default value for task6 does not match');
        $this->assertEquals(0, $row['task6_attempts'], 'Expected default value for task6_attempts does not match');
    }
}
