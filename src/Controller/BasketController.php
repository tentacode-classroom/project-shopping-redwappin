<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Toy;
class BasketController extends AbstractController
{
    /**
     * @Route("/panier", name="basket_list")
     */
    public function index(SessionInterface $session)
    {
        $basketProducts = $session->get('basket_products', []);
        $toyRepository = $this->getDoctrine()->getRepository(Toy::class);
        
        $toys = [];
        $total=0;
        foreach($basketProducts as $productId) {
            $toy = $toyRepository->find($productId);
            $toys[] = $toy;
            $total=$total+$toy->getprice();
        }
        return $this->render('basket/basket.html.twig', [
            'basket_products' => $toys,
            'total' => $total
        ]);
    }
    /**
     * @Route("/panier/ajouter/{productId}", name="basket_add")
     */
    public function add(int $productId, SessionInterface $session)
    {
        $basketProducts = $session->get('basket_products', []);
        var_dump($productId);
        if (!in_array($productId, $basketProducts)) {
            $basketProducts[] = $productId;
            $this->addFlash(
                'notice',
                'Produit bien ajouté !'
            );
        }
        $session->set('basket_products', $basketProducts);
        return $this->redirectToRoute('basket_list');
    }
    /**
     * @Route("/panier/supprimer/{productId}", name="basket_remove")
     */
    public function remove(int $productId, SessionInterface $session)
    {
        $basketProducts = $session->get('basket_products', []);
        
        $productIndex = array_search($productId, $basketProducts);
        if (false !== $productIndex) {
            unset($basketProducts[$productIndex]);
            $this->addFlash(
                'notice',
                'Produit bien supprimé !'
            );
        }
        $session->set('basket_products', $basketProducts);
        return $this->redirectToRoute('basket_list');
    }
}