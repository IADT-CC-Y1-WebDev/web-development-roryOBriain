<?php

class Format {
    public $id;
    public $name;
    public $format_type;

    private $db;

    public function __construct($data = []) {
        $this->db = DB::getInstance()->getConnection();

        if (!empty($data)) {
            $this->id = $data['id'] ?? null;
            $this->name = $data['name'] ?? null;
            $this->format_type = $data['format_type'] ?? null;
        }
    }

    // Find all formats
    public static function findAll() {
        $db = DB::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM formats ORDER BY name");
        $stmt->execute();

        $formats = [];
        while ($row = $stmt->fetch()) {
            $formats[] = new Format($row);
        }

        return $formats;
    }

    // Find format by ID
    public static function findById($id) {
        $db = DB::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM formats WHERE id = :id");
        $stmt->execute(['id' => $id]);

        $row = $stmt->fetch();
        if ($row) {
            return new Format($row);
        }

        return null;
    }

    // Find formats by game (requires JOIN with game_format table)
    public static function findByGame($gameId) {
        $db = DB::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT f.*
            FROM formats f
            INNER JOIN game_format gf ON f.id = gf.format_id
            WHERE gf.game_id = :game_id
            ORDER BY f.name
        ");
        $stmt->execute(['game_id' => $gameId]);

        $formats = [];
        while ($row = $stmt->fetch()) {
            $formats[] = new Format($row);
        }

        return $formats;
    }
    
    // Convert to array for JSON output
    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'format_type' => $this->format_type
        ];
    }
}
