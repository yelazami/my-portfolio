<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Work;
use App\Entity\About;
use App\Entity\Skill;
use App\Entity\Brands;
use App\Entity\Experience;
use App\Entity\Testimonials;
use App\Controller\Admin\UserCrudController;
use App\Controller\Admin\WorkCrudController;
use App\Controller\Admin\SkillCrudController;
use App\Controller\Admin\BrandsCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\ExperienceCrudController;
use App\Controller\Admin\TestimonialsCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {}

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->redirect(
            $this->adminUrlGenerator
                ->setController(UserCrudController::class)
                ->generateUrl()
        );
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Backend Portfolio')
            ->setTranslationDomain('admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users', 'fas fa-user-shield', User::class);
        yield MenuItem::linkToCrud('About Section', 'fas fa-address-card', About::class)
            ->setController(AboutCrudController::class);
        yield MenuItem::linkToCrud('Work', 'fas fa-building', Work::class)
            ->setController(WorkCrudController::class);
        yield MenuItem::linkToCrud('Skills', 'fab fa-symfony', Skill::class)
            ->setController(SkillCrudController::class);    
        yield MenuItem::linkToCrud('Experiences', 'fas fa-briefcase', Experience::class)
            ->setController(ExperienceCrudController::class);
        yield MenuItem::linkToCrud('Brands', 'fas fa-copyright', Brands::class)
            ->setController(BrandsCrudController::class);
        yield MenuItem::linkToCrud('Testimonials', 'fab fa-angellist', Testimonials::class)
            ->setController(TestimonialsCrudController::class);
    }
}
