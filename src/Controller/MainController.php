<?php
namespace App\Controller;
use App\Entity\Category;
use App\Entity\Post;
use App\Entity\Tag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
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
     * @Route("/article/{post}", name="article")
     *
     * @ParamConverter("post", class="App:Post")
     */
    public function article(Post $post)
    {
//        $post = $this->getDoctrine()->getRepository(Post::class)->find($slug);
        return $this->render('main/article.html.twig', [
            'post' => $post
        ]);
    }

    /**
     * @Route("/tag/{tag}", name="tag")
     *
     * @ParamConverter("tag", class="App\Entity\Tag")
     */
    public function tag(Tag $tag)
    {
        return $this->render('main/tag.html.twig', [
            'tag' => $tag,
        ]);
    }
//
}