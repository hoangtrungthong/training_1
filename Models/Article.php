<?php
require "validate.php";
require 'config/MysqlDb.php';
class Article extends MysqlDb
{
    public function getAllArticles()
    {
        return $this->getAll('articles', 'users', 'users.id', 'user_id');
    }
    public function getArticle() {
        if (isset($_SESSION['username'])) {
            $user = $this->getOne('users', 'username', $_SESSION['username']);
        } else if (isset($_COOKIE['auth'])) {
            parse_str($_COOKIE['auth'], $get_user);
            $user = $this->getOne('users', 'username', $get_user['user']);
        }
        $id = $user['id'];
        $sql = "SELECT * 
                FROM articles 
                JOIN users 
                ON users.id = articles.user_id
                WHERE user_id = $id ";
        $query = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    public function getDetails()
    {
        return $this->getOne('articles', 'article_id', $_GET['items']);
    }

    public function add($request)
    { 
        if (isset($request) && (isset($_SESSION['username']) || isset($_COOKIE['auth'])) ) {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $error = validateArticle($title, $content);

            if(empty($error)) {
                if (isset($_SESSION['username'])) {
                    $user = $this->getOne('users', 'username', $_SESSION['username']);
                } else if (isset($_COOKIE['auth'])) {
                    parse_str($_COOKIE['auth'], $get_user);
                    $user = $this->getOne('users', 'username', $get_user['user']);
                }
                $data = [
                    'user_id' => $user['id'],
                    'title' => $title,
                    'content' => $content,
                ];
                $this->insert('articles', $data);
                header("location: index.php");
            }
            return $error;
        }
    }

    public function edit($request)
    {
        if(isset($request)) {
            $title = $_POST['title'];
            $content = $_POST['content'];
           
            $error = validateArticle($title, $content);

            if(empty($error)) {
                $data = [
                    'title' => $title,
                    'content' => $content
                ];
                $this->update('articles', $data, 'article_id', $_GET['items']);
                header("location: index.php");
            }
            return $error;
        }
    }

    public function drop()
    {
        return $this->delete('articles', 'article_id', $_GET['items']);
    }
}