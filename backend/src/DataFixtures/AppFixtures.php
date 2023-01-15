<?php

namespace App\DataFixtures;

use App\Entity\About;
use App\Entity\Brands;
use App\Entity\Experience;
use App\Entity\Skill;
use App\Entity\Testimonials;
use App\Entity\User;
use App\Entity\Work;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $hasher)
    {}

    public function load(ObjectManager $manager): void
    {
        # User Admin
        $this->userFixtures($manager);

        //------ About ------//
        $this->aboutFixtures(manager: $manager);

        //------ Brands ------//
        $this->experienceFixtures(manager: $manager);
        
        //------ Skills ------//
        $this->skillFixtures(manager: $manager);
        
        //------ Work ------//
        $this->workFixtures(manager: $manager);
        
        //------ Testimonial ------//
        $this->testimonialFixtures(manager: $manager);


        $manager->flush();

    }

    private function userFixtures(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('yelazami')
            ->setRoles(['ROLE_ADMIN'])
        ;

        $password = $this->hasher->hashPassword($user, 'pass123');
        $user->setPassword($password);

        $manager->persist($user);
    }

    private function aboutFixtures(ObjectManager $manager)
    {
        $communication = new About();
        $communication->setTitle('Communication')
            ->setDescription('Able to clearly and effectively communicate with team members, stakeholders, and clients.')
            ->setImgUrl('about-communication.jpeg')
        ;
        $manager->persist($communication);

        $problem_solving = new About();
        $problem_solving->setTitle('Problem solving')
            ->setDescription('Capable of recognizing and evaluating issues and generating innovative and effective solutions.')
            ->setImgUrl('about-problem_solving.png')
        ;
        $manager->persist($problem_solving);

        
        $creativity = new About();
        $creativity->setTitle('Creativity')
            ->setDescription('I am capable of thinking differently and producing fresh and original ideas.')
            ->setImgUrl('about-creativity.png')
        ;
        $manager->persist($creativity);
        
        $collaboration = new About();
        $collaboration
            ->setTitle('Collaboration')
            ->setDescription('I possess the skill of working effectively and cooperatively with others in a team-oriented environment.')
            ->setImgUrl('about-collaboration.png')
        ;
        $manager->persist($collaboration);

    }

    private function experienceFixtures(ObjectManager $manager)
    {
        $fst = new Brands();
        $fst->setName('FST-Fès')
            ->setImgUrl('brands-fst.png')
        ;

        $fstExperience = new Experience();
        $fstExperience
            ->setName('Internship: Full-stack Developer')
            ->setPeriod('Apr 2016 - Jun 2016 · 3 mos')
            ->setCompany('FST-Fès')
            ->setDescription('
                Update the FST website with the LARAVEL 4.2 framework by adding 
                an internship management section as well as a messaging space 
                between students and their teachers in the same field.
            ')
            ->setPlace('Fès, Morocco')
            ->setBrands($fst)
        ;

        $fst->addExperience($fstExperience);

        $manager->persist($fst);
        $manager->persist($fstExperience);

        //
        $abbayeFontdouce = new Brands();
        $abbayeFontdouce->setName('Abbaye de Fontdouce')
            ->setImgUrl('brands-abbayeFontdouce.png')
        ;

        $abbayeFontdouceExperience = new Experience();
        $abbayeFontdouceExperience
            ->setName('Internship: Mobile Devoloper')
            ->setPeriod('Apr 2018 - Jun 2018 · 3 mos')
            ->setCompany('Abbaye de Fontdouce')
            ->setDescription('
                Multi-platform mobile application: Game of Stones:
                -Developing an adventure game application with the Ionic 3 Framework.
                -Connect the application with a "REST" API server created with NodeJS.
                -Build a Back-office to manage the application.
            ')
            ->setPlace('Saint-Bris-des-Bois')
            ->setBrands($abbayeFontdouce)
        ;

        $abbayeFontdouce->addExperience($abbayeFontdouceExperience);

        $manager->persist($abbayeFontdouce);
        $manager->persist($abbayeFontdouceExperience);

        
        //
        $biig = new Brands();
        $biig->setName('Biig stratégie digital')
            ->setImgUrl('brands-biig.png')
        ;

        $biigExperience = new Experience();
        $biigExperience
            ->setName('Apprenticeship: Back-End Developer PHP Symfony')
            ->setPeriod('Sep 2018 - Aug 2020 · 2 yrs')
            ->setCompany('Biig stratégie digital')
            ->setDescription('
                Projects: Qazle (leads generation & management) | Formulez | Sofinco.
                As a back-end developer at BiiG, I have been responsible for implementing and developing Php/Symfony applications (3/4) as well as maintaining existing applications.

                I work mainly in agile teams. I participate in the breakdown of customer requests into technical tasks as well as in the costing and estimation in collaboration with the Product Owners.

                Furthermore, I create unit and functional tests for each developed task, which are automatically run every time the code is updated on Gitlab using continuous integration systems (Gitlab ci).

                I place a high value on well-written code. I am responsible for enforcing coding standards and best practices in the back-end development team.

                Finally , I organize from an occasional time insights (internal trainings) on interesting or current topics and technologies in order to increase the skills of junior developers and to deepen the knowledge of more experienced developers.

                In summary:

                - Php 7, Framework Symfony (3/4), Doctrine, MySQL/PostgreSQL
                - API Platform, API REST
                - Unit and functional testing (PhpUnit, PhpSpec, Behat)
                - Versioning (Git)
                - Issue tracker, Code review, CI (Gitlab)
                - Monitoring tool (Sentry, Graylog)
                - Docker, ElasticSearch, Redis, RabbitMQ, Sonata
                - Design Pattern, DDD, SOLID principles, KISS, DRY
                - IDE : PhpStorm
                - Method : mostly Agile
            ')
            ->setPlace('Niort')
            ->setBrands($biig)
        ;

        $biig->addExperience($biigExperience);

        $manager->persist($biig);
        $manager->persist($biigExperience);

        //
        $rhinos = new Brands();
        $rhinos->setName('Group Rhinos')
            ->setImgUrl('brands-rhinos.png')
        ;

        $rhinosExperience = new Experience();
        $rhinosExperience
            ->setName('CDI: Back-End Developer PHP Symfony')
            ->setPeriod('Sep 2020 - May 2022 · 1 yr 9 mos')
            ->setCompany('Group Rhinos')
            ->setDescription("
                    Projects : AdCagnotte Autodistribution (From Scratch) | Promocash | Sonepar (Redesign).

                    Missions I carried out :
                    
                    ➖ Conducting analysis and design of clients' business needs in collaboration with the project manager and clients.
                    ➖ Decision-making on technical choices (relevance on feasibility according to needs)
                    ➖ Participation in various workshops (Sprint planning, review, daily).
                    ➖ Configuration of the development environment (initialize the project under docker)
                    ➖ Setting up continuous integration tests using gitlab-CI.
                    ➖ Configuring docker to set up a staging environment with recipes for the project manager and PO, and using gitlab CI to automatically launch it.
                    ➖ Management of pre-production and production environments.
                    ➖ Building applications with the Symfony PHP framework (v4, v5)
                    ➖ Modeling and design (MCD, Class diagram, use cases ...).
                    ➖ Designing APIs using API Platform (REST).
                    ➖ Writing of functional and unit tests (Behat, PhpUnit).
                    ➖ Code validation via regular code reviews.
                    ➖ Maintaining a close relationship with the front-end team and customers who consume the API.
                    ➖ Maintaining applications for various projects.
                    ➖ Planning and launching marketing campaigns.
                    ➖ Retrieving data from the MariaDB SQL database for marketing teams to use in their analysis and statistics.
            ")
            ->setPlace('La Rochelle')
            ->setBrands($rhinos)
        ;

        $rhinos->addExperience($rhinosExperience);

        $manager->persist($rhinos);
        $manager->persist($rhinosExperience);

        //
        $smile = new Brands();
        $smile->setName('Smile')
            ->setImgUrl('brands-smile.png')
        ;

        $smileExperience = new Experience();
        $smileExperience
            ->setName('CDI: Software Engineer PHP Symfony')
            ->setPeriod('May 2022 - Present · 9 mos')
            ->setCompany('Smile')
            ->setDescription("
                Full-stack developer
                Internal training project for employees | For'me
                
                ➖ Development and design of member management tools.
                ➖ I work on the maintenance and the contribution of new functionalities to the core of the tool in 
                collaboration with front-end developers. I also work independently or in pairs on improving the APIs
                used. 
                ➖ Participation in costing workshops.
                ➖ Configuration of continuous integration tests via gitlab-CI.
                ➖ Configuration of the staging environment with docker.
                ➖ I place great importance on well-done code. I'm in charge of coding standards and best practices in 
                the dev back office. I do daily code reviews and I am very open to discussion, I enjoy discussing
                Design Patterns, SOLID, DDD, Clean Code, etc.
                
                ➖ Stack: Php 8, Symfony 6, Javascript, ReactJs, Twilio, RabbitMQ, PostgreSQL.
                ➖ Environment : Docker, PhpStorm, Git.
                ➖ Methods : daily meetings Scrum, pair programming, code review.
            ")
            ->setPlace('Paris, Île-de-France, France')
            ->setBrands($smile)
        ;

        $smile->addExperience($smileExperience);

        $manager->persist($smile);
        $manager->persist($smileExperience);
    }

    private function skillFixtures(ObjectManager $manager)
    {
        $php = new Skill();
        $php->setName('PHP')
            ->setIcon('skill-php.png')
        ;
        
        $manager->persist($php);
        
        $symfony = new Skill();
        $symfony->setName('Symfony')
            ->setIcon('skill-symfony.png')
        ;


        $manager->persist($symfony);
        
        $api = new Skill();
        $api->setName('API Platform')
            ->setIcon('skill-apiplatform.png')
        ;

        $manager->persist($api);
        
        $rabbitmq = new Skill();
        $rabbitmq->setName('RabbitMQ')
            ->setIcon('skill-rabbitmq.png')
        ;

        $manager->persist($rabbitmq);
        
        $docker = new Skill();
        $docker->setName('Docker')
            ->setIcon('skill-docker.png')
        ;

        $manager->persist($docker);
        
        $sql = new Skill();
        $sql->setName('Sql')
            ->setIcon('skill-sql.png')
        ;

        $manager->persist($sql);
        
        $react = new Skill();
        $react->setName('React JS')
            ->setIcon('skill-react.png')
        ;

        $manager->persist($react);
        
        $git = new Skill();
        $git->setName('Git')
            ->setIcon('skill-git.png')
        ;

        $manager->persist($git);


    }

    private function workFixtures(ObjectManager $manager)
    {
        $myPortfolio = new Work();
        $myPortfolio
            ->setTitle('My Portfolio')
            ->setDescription("
                <private repo: Code on demand>
                My personal website created from scratch using ReactJS and Symfony. It includes information about my studies, professional experiences, and projects, and goes beyond a traditional resume.
            ")
            ->setImgUrl('work-portfolio.png')
            ->setProjectLink('dont forget to add it here')
            ->setCodeLink('https://github.com/yelazami/my-portfolio')
            ->setTags(['PHP', 'Symfony', 'React JS'])
        ;

        $manager->persist($myPortfolio);
        
        $geoluciole = new Work();
        $geoluciole
            ->setTitle('Géoluciole mobile app')
            ->setDescription("
                This final year project as part of my master's degree was developed with 8 other students.
                The mobile app aims to geolocalise visitors of La Rochelle as part of a research project conducted by a PhD student, to later determine places of interest.
                An Android and an iOS native applications were developed while introducing gamification aspects to entice visitors to use the application without biasing its behaviour.
            ")
            ->setImgUrl('work-geoluciole.png')
            ->setCodeLink('settup github')
            ->setTags(['Swift', 'Android', 'Java'])
        ;

        $manager->persist($geoluciole);
        
        $healtCareMonitoring = new Work();
        $healtCareMonitoring
            ->setTitle('Plant health care monitoring solution')
            ->setDescription("
                Using plant sensors retrieving environment information, a global solution was conceived to allow end-users to monitor plant health care.
                A server developed with Node.js was able to retrieve data sent by the sensors, while a mobile web app was able to request the server to retrieve the information for a specific plant.
                Notifications were also sent by the application in case of necessary action (humidity, sun exposition...).
            ")
            ->setImgUrl('work-health-care-monitoring.png')
            ->setCodeLink('settup github')
            ->setTags(['Node JS', 'IoT', 'Cordova'])
        ;

        $manager->persist($healtCareMonitoring);


    }

    private function testimonialFixtures(ObjectManager $manager)
    {
        $hamza = new Testimonials();
        $hamza
            ->setName('Hamza BERRADA | Full-Stack Software Engineer')
            ->setCompany('Groupe ADAMING')
            ->setFeedback('Yassine is a highly proactive, committed, and resourceful individual. He takes a proactive approach to his work and is always striving to improve his skills and abilities.')
            ->setImgUrl('feedback-hamza.png')
        ;

        $manager->persist($hamza);

        $saad = new Testimonials();
        $saad
            ->setName('SAAD EL KHAYAT | Business Analyst')
            ->setCompany('Capgemini Capgemini')
            ->setFeedback('His superior organizational skills give him a distinct advantage over others.')
            ->setImgUrl('feedback-saad.png')
        ;

        $manager->persist($saad);
    }
}
