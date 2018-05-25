<?php
namespace App\Controller;
use App\Entity\Category;
use App\Entity\Post;
use App\Entity\Tag;
use App\Repository\CategoryRepository;
use App\Repository\TagRepository;
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
    public function blog(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->findAll();
        return $this->render('main/blog.html.twig', compact('categories'));
    }

    /**
     * @Route("/tags", name="tags")
     */
    public function tags(TagRepository $tagRepository)
    {
        $tags = $tagRepository->findAll();
        return $this->render('main/tags.html.twig', ['tags' => $tags]);
    }

    /**
     * @Route("/{categorySlug}/{slug}", name="article")
     * @ParamConverter("post", options={"mapping": {"slug": "slug"}})
     * @ParamConverter("category", options={"mapping": {"categorySlug": "slug"}})
     */
    public function article(Post $post, Category $category)
    {
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