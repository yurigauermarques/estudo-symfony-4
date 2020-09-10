<?php

namespace App\Controller;

use App\Entity\ProdutoCategoria;
use App\Form\ProdutoCategoriaType;
use App\Repository\ProdutoCategoriaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produto-categoria")
 */
class ProdutoCategoriaController extends AbstractController
{
    /**
     * @Route("/", name="produto_categoria_index", methods={"GET"})
     */
    public function index(ProdutoCategoriaRepository $produtoCategoriaRepository): Response
    {
        return $this->render('produto_categoria/index.html.twig', [
            'produto_categorias' => $produtoCategoriaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="produto_categoria_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $produtoCategoria = new ProdutoCategoria();
        $form = $this->createForm(
            ProdutoCategoriaType::class,
            $produtoCategoria
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produtoCategoria);
            $entityManager->flush();

            return $this->redirectToRoute('produto_categoria_index');
        }

        return $this->render('produto_categoria/new.html.twig', [
            'produto_categoria' => $produtoCategoria,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produto_categoria_show", methods={"GET"})
     */
    public function show(ProdutoCategoria $produtoCategoria): Response
    {
        return $this->render('produto_categoria/show.html.twig', [
            'produto_categoria' => $produtoCategoria,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="produto_categoria_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProdutoCategoria $produtoCategoria): Response
    {
        $form = $this->createForm(
            ProdutoCategoriaType::class,
            $produtoCategoria
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()
                ->getManager()
                ->flush();

            return $this->redirectToRoute('produto_categoria_index');
        }

        return $this->render('produto_categoria/edit.html.twig', [
            'produto_categoria' => $produtoCategoria,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produto_categoria_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ProdutoCategoria $produtoCategoria): Response
    {
        if ($this->isCsrfTokenValid('delete' . $produtoCategoria->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($produtoCategoria);
            $entityManager->flush();
        }

        return $this->redirectToRoute('produto_categoria_index');
    }
}
