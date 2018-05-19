<?php
namespace App\Controller;
use App\Entity\Category;
use App\Entity\Post;
use App\Entity\Tag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class MainController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
//    /**
//     * @Route("/blog", name="blog")
//     */
//    public function blog()
//    {
//        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();
//        return $this->render('main/blog.html.twig', compact('posts'));
//    }

    /**
     * @Route("/blog", name="blog")
     */
    public function blog()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('main/blog.html.twig', compact('categories'));
    }

    /**
     * @Route("/tags", name="tags")
     */
    public function tags()
    {
        $tags = $this->getDoctrine()->getRepository(Tag::class)->findAll();
        return $this->render('main/tags.html.twig', compact('tags'));
    }

    /**
     * @Route("/article/{slug}", name="article")
     */
    public function article($slug)
    {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($slug);
        return $this->render('main/article.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @Route("/tag/{slug}", name="tag")
     */
    public function tag($slug)
    {
        $tag = $this->getDoctrine()->getRepository(Tag::class)->find($slug);
        return $this->render('main/tag.html.twig', [
            'tag' => $tag,
        ]);
    }
//
}