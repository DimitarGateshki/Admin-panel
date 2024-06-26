<?php
class Article extends Model {
    public function getAllArticles() {
        $stmt = $this->db->query("SELECT * FROM articles ORDER BY title");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticleById($id) {
        $stmt = $this->db->prepare("SELECT * FROM articles WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createArticle($title, $content) {
        $stmt = $this->db->prepare("INSERT INTO articles (title, content) VALUES (?, ?)");
        return $stmt->execute([$title, $content]);
    }

    public function updateArticle($id, $title, $content) {
        $stmt = $this->db->prepare("UPDATE articles SET title = ?, content = ? WHERE id = ?");
        return $stmt->execute([$title, $content, $id]);
    }

    public function deleteArticle($id) {
        $stmt = $this->db->prepare("DELETE FROM articles WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
