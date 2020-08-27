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
        $produtoCategorium = new ProdutoCategoria();
        $form = $this->createForm(
            ProdutoCategoriaType::class,
            $produtoCategorium
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produtoCategorium);
            $entityManager->flush();

            return $this->redirectToRoute('produto_categoria_index');
        }

        return $this->render('produto_categoria/new.html.twig', [
            'produto_categorium' => $produtoCategorium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produto_categoria_show", methods={"GET"})
     */
    public function show(ProdutoCategoria $produtoCategorium): Response
    {
        return $this->render('produto_categoria/show.html.twig', [
            'produto_categorium' => $produtoCategorium,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="produto_categoria_edit", methods={"GET","POST"})
     */
    public function edit(
        Request $request,
        ProdutoCategoria $produtoCategorium
    ): Response {
        $form = $this->createForm(
            ProdutoCategoriaType::class,
            $produtoCategorium
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()
                ->getManager()
                ->flush();

            return $this->redirectToRoute('produto_categoria_index');
        }

        return $this->render('produto_categoria/edit.html.twig', [
            'produto_categorium' => $produtoCategorium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produto_categoria_delete", methods={"DELETE"})
     */
    public function delete(
        Request $request,
        ProdutoCategoria $produtoCategorium
    ): Response {
        if (
            $this->isCsrfTokenValid(
                'delete' . $produtoCategorium->getId(),
                $request->request->get('_token')
            )
        ) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($produtoCategorium);
            $entityManager->flush();
        }

        return $this->redirectToRoute('produto_categoria_index');
    }
}
