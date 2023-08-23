<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use App\Entity\Contact;
use App\Entity\Images;
use App\Entity\Orders;
use App\Entity\OrdersDetails;
use App\Entity\Products;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/admin.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('BookLand');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa-solid fa-house-chimney');

        // yield MenuItem::section('Categories');
        yield MenuItem::linkToCrud('Users', 'fa-solid fa-circle-user', Users::class);
        yield MenuItem::linkToCrud('Categories', 'fa-solid fa-folder-open', Categories::class);
        yield MenuItem::linkToCrud('Products', 'fa-solid fa-book', Products::class);      
        yield MenuItem::linkToCrud('Images', 'fa-regular fa-image', Images::class);
        yield MenuItem::linkToCrud('Orders', 'fa-solid fa-cart-plus', Orders::class);
        yield MenuItem::linkToCrud('OrdersDetails', 'fa-solid fa-circle-info', OrdersDetails::class);
        yield MenuItem::linkToCrud('Contact', 'fa fa-envelope', Contact::class);
    }
}
