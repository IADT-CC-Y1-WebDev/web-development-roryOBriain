<?php
    require_once 'php/lib/config.php';
    $db = DB::getInstance()->getConnection();
    Book::findAll();

    try {
        $stmt = $db->query("SELECT * FROM books ORDER BY id");
        $books = $stmt->fetchAll();
        echo "<p>Amount of books: ".count($books)."</p>";
        ?>
                
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher ID</th>
                    <th>Year</th>
                    <th>ISBN</th>
                    <th>Description</th>
                </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book): ?>
                        <tr>
                            <td><?= $book['id']?></td>
                            <td><?= htmlspecialchars($book['title'] ?? "missing data") ?></td>
                            <td><?= htmlspecialchars($book['author'] ?? "missing data") ?></td>
                            <td><?= $book['publisher_id'] ?? "missing data"?></td>
                            <td><?= $book['year'] ?? "missing data" ?></td>
                            <td><?= htmlspecialchars($book['isbn']  ?? "missing data") ?></td>
                            <td><?= htmlspecialchars(substr($book['description'], 0, 50) ?? "missing data") ?>...</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php
            } catch (PDOException $e) {
                echo "<p class='error'>Connection failed: " . $e->getMessage() . "</p>";
            }
?>