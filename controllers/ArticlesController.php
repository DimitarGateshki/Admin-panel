<?php
class ArticlesController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /auth/login');
            exit();
        }
    }

    public function index() {
        $articles = $this->model('Article')->getAllArticles();
        $sortedArticles = [];

        foreach ($articles as $article) {
            $firstLetter = strtoupper(mb_substr($article['title'], 0, 1));
            $sortedArticles[$firstLetter][] = $article;
        }

        $this->view('articles/index', ['sortedArticles' => $sortedArticles]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $this->model('Article')->createArticle($title, $content);
            header('Location: /articles/index');
            exit();
        }

        $this->view('articles/create');
    }

    public function edit($id) {
        $articleModel = $this->model('Article');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $articleModel->updateArticle($id, $title, $content);
            header('Location: /articles/index');
            exit();
        }

        $article = $articleModel->getArticleById($id);
        $this->view('articles/edit', ['article' => $article]);
    }

    public function delete($id) {
        $this->model('Article')->deleteArticle($id);
        header('Location: /articles/index');
        exit();
    }
}
?>
