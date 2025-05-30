<?php

namespace app\Controllers;
use app\View\View;
use app\Models\Articles\Article;
use app\Models\Comments\Comment;
use app\config\Db;

class ArticleController extends Article
{
    private $view;
    private $db;
    public function __construct()
    {
        $this->view = new View;  
        $this->id = 1;//int
    }

    public function index(){
        $articles = Article::findAll(); //получает все статьи из базы данных
        $this->view->renderHtml('article/index', ['articles'=>$articles]);
    }

    public function show($id){
        $article = Article::getById($id);
        $comment = Comment::getByFildName('article_id', $article->getId());
            if ($article == []) 
        {
            $this->view->renderHtml('error/404', [], 404);
            return;
        }
        $this->view->renderHtml('article/show', ['article'=>$article, 'comments'=>$comment]);
    }

    public function edit($id){
        $article = Article::getById($id);
        $this->view->renderHtml('article/edit', ['article'=>$article]);
    }

    public function update($id){
        try {
            $article = Article::getById($id);
            
            if (!$article) {
                throw new \Exception('Статья не найдена');
            }

            // Валидация данных
            if (empty($_POST['title']) || empty($_POST['text'])) {
                throw new \Exception('Заголовок и текст статьи обязательны для заполнения');
            }

            $article->title = htmlspecialchars($_POST['title']);
            $article->text = htmlspecialchars($_POST['text']);
            
            // Обработка даты публикации
            if (!empty($_POST['date'])) {
                $date = date('Y-m-d H:i:s', strtotime($_POST['date']));
                $article->createdAt = $date;
            }

            $article->save();

            // Добавляем сообщение об успехе в сессию
            $_SESSION['success'] = 'Статья успешно обновлена'; 
            
            return header('Location: /Project/www/article/' . $article->getId());
        } catch (\Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            return header('Location: /Project/www/article/' . $id . '/edit');
        }
    }

    public function create(){
        $this->view->renderHtml('article/create');
    }

    public function store(){
        $article = new Article;
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $article->authorId = 1;
        $article->save();
        return header('Location:http://localhost/Project/www/index.php');
    }

    public function delete(int $id){
        $article = Article::getById($id);
        $comments = Comment::getByFildName('article_id', $id);
        foreach ($comments as $comment) {
            $comment->delete($comment->getId());
        }
        $article->delete($id);
        return header('Location:http://localhost/Project/www/index.php');
    }

    public function setAuthorId(string $authorId) {
        $this->authorId = $authorId;
    }

    public function setArticleId(string $articleId) {
        $this->articleId = $articleId;
    }

}