<?php

class Book {
    private $db;

    public function __construct() {
        // Zde doplňte údaje pro připojení k vaší databázi
        $host = 'localhost';
        $dbname = 'books_db'; // Název vaší databáze
        $user = 'root';       // Přihlašovací jméno k DB
        $pass = '';           // Heslo k DB

        try {
            // Vytvoření PDO instance pro bezpečné připojení k databázi
            $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Chyba připojení k databázi: " . $e->getMessage());
        }
    }

    // Metoda pro vložení nové knihy
    public function createBook($data) {
        // Připravený SQL dotaz zabraňující SQL injekci
        $sql = "INSERT INTO books (title, author, category, subcategory, year) 
                VALUES (:title, :author, :category, :subcategory, :year)";
        
        $stmt = $this->db->prepare($sql);
        
        // Bezpečné navázání dat z formuláře na SQL dotaz
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':author', $data['author']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':subcategory', $data['subcategory']);
        $stmt->bindParam(':year', $data['year']);

        // Spuštění dotazu a navrácení úspěchu (true/false)
        return $stmt->execute();
    }
}
?>
