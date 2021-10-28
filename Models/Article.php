<?php
class Article extends MysqlDb
{
    public function getAll()
    {
        return $this->get('articles');
    }
    public function getArticle($id) {
        // $this->getOne('articles', 'article_id', $value);
        $sql = "SELECT * 
                FROM articles 
                JOIN users 
                ON user.article_id = articles.article_id
                WHERE article_id = $id ";
        return mysqli_query($this->conn, $sql);
    }

    public function add($request)
    {
        if (isset($request) && isset($_SESSION['username'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $data = [
                'title' => $title,
                'content' => $content,
            ];
            $this->insert('articles', $data);
        }
    }
}