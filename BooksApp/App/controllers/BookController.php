<?php
// Načtení modelu
require_once '../app/models/Book.php';

class BookController {
    
    // Výchozí metoda (např. pro zobrazení všech knih)
    public function index() {
        echo "Seznam všech knih (zatím není implementováno).";
    }

    // Metoda pro vytvoření knihy (reaguje na URL /book/create)
    public function create() {
        // 1. KROK: Zjistíme, zda uživatel odeslal formulář
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Posbírání a očištění dat z formuláře
            $data = [
                'title'       => trim($_POST['title'] ?? ''),
                'author'      => trim($_POST['author'] ?? ''),
                'category'    => trim($_POST['category'] ?? ''),
                'subcategory' => trim($_POST['subcategory'] ?? ''),
                'year'        => trim($_POST['year'] ?? '')
            ];

            // Vytvoření instance modelu Book
            $bookModel = new Book();
            
            // Zavolání metody v modelu pro uložení do DB
            if ($bookModel->createBook($data)) {
                // Úspěšné uložení - přesměrujeme uživatele (např. na index)
                echo "<p>Kniha byla úspěšně přidána!</p>";
                // V reálné aplikaci by zde bylo přesměrování:
                // header("Location: /book/index");
                // exit;
            } else {
                echo "<p>Při ukládání knihy nastala chyba.</p>";
            }
        }

        // 2. KROK: Načtení a zobrazení formuláře
        // To se stane vždy (pokud uživatel poprvé otevře stránku, nebo pokud není nastavené přesměrování po POST)
        require_once '../app/views/books/book_create.php';
    }
}
?>
