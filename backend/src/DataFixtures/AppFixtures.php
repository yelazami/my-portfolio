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
        $admin = new User();
        $admin
            ->setUsername('yelazami')
            ->setRoles(['ROLE_ADMIN'])
            ->setToken(bin2hex(random_bytes(60)))
        ;

        $password = $this->hasher->hashPassword($admin, "JeNeSuisQunHommePrisDansUneBoucle@");
        $admin->setPassword($password);

        $manager->persist($admin);

        $user = new User();
        $user
            ->setUsername('yelazami-api')
            ->setToken(bin2hex(random_bytes(60)))
        ;

        $password = $this->hasher->hashPassword($user, 'HesoyaM3690@@');
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
        $smile = new Brands();
        $smile->setName('Smile')
            ->setImgUrl('brands-smile.png')
        ;

        $smileExperience = new Experience();
        $smileExperience
            ->setName('CDI: Software Engineer PHP Symfony')
            ->setPeriod('9 mos')
            ->setFromTo('May 2022 - Present')
            ->setCompany('Smile')
            ->setDescription("
                <div>Full-stack developer Internal training project for employees | For'me&nbsp;</div><div><strong><em>Stack</em></strong>: PHP 8, Symfony 6, ReactJs, Twilio, RabbitMQ, PostgreSQL. <br><strong><em>Environment</em></strong> : Docker, PhpStorm, Git. <br><strong><em>Methods</em></strong> : daily meetings Scrum, pair programming, code review.&nbsp;</div>
            ")
            ->setPlace('Paris, Île-de-France')
            ->setBrands($smile)
        ;

        $smile->addExperience($smileExperience);

        $manager->persist($smile);
        $manager->persist($smileExperience);

        // Rhinos
        $rhinos = new Brands();
        $rhinos->setName('Group Rhinos')
            ->setImgUrl('brands-rhinos.png')
        ;

        $rhinosExperience = new Experience();
        $rhinosExperience
            ->setName('CDI: Back-End Developer PHP Symfony')
            ->setFromTo('Sep 2020 - May 2022')
            ->setPeriod('1 yr 9 mos')
            ->setCompany('Group Rhinos')
            ->setDescription("
                <div><strong><em>Projects</em></strong> :&nbsp;</div><ul><li>AdCagnotte Autodistribution (From Scratch)&nbsp;</li><li>Promocash&nbsp;</li><li>Sonepar (Redesign).&nbsp;</li></ul><div><strong><em>Stack</em></strong>: PHP 7/8 · Symfony 4/5 · LARAVEL 8/9 · Docker · RabbitMQ · Git · API REST · SQL · JavaScript · jQuery.</div>
            ")
            ->setPlace('La Rochelle')
            ->setBrands($rhinos)
        ;

        $rhinos->addExperience($rhinosExperience);

        $manager->persist($rhinos);
        $manager->persist($rhinosExperience);

        // Biig
        $biig = new Brands();
        $biig->setName('Biig stratégie digital')
            ->setImgUrl('brands-biig.png')
        ;

        $biigExperience = new Experience();
        $biigExperience
            ->setName('Apprenticeship: Back-End Developer PHP Symfony')
            ->setFromTo('Sep 2018 - Aug 2020')
            ->setPeriod('2 yrs')
            ->setCompany('Biig stratégie digital')
            ->setDescription('
                <div><strong><em>Projects</em></strong>:&nbsp;</div><ul><li>Qazle (leads generation &amp; management)&nbsp;</li><li>Formulez&nbsp;</li><li>Sofinco.&nbsp;</li></ul><div><strong><em>Stack</em></strong>: &nbsp;</div><ul><li>Php 7, Framework Symfony (3/4), Doctrine, MySQL/PostgreSQL</li><li>API Platform, API REST</li><li>Unit and functional testing (PhpUnit, PhpSpec, Behat)</li><li>Versioning (Git)</li><li>Issue tracker, Code review, CI (Gitlab)</li><li>Monitoring tool (Sentry, Graylog)</li><li>Docker, ElasticSearch, Redis, RabbitMQ, Sonata</li><li>Design Pattern, DDD, SOLID principles, KISS, DRY</li><li>IDE : PhpStorm</li><li>Method : mostly Agile</li></ul>
            ')
            ->setPlace('Niort')
            ->setBrands($biig)
        ;

        $biig->addExperience($biigExperience);

        $manager->persist($biig);
        $manager->persist($biigExperience);


        // Abbaye de Fontdouce
        $abbayeFontdouce = new Brands();
        $abbayeFontdouce->setName('Abbaye de Fontdouce')
            ->setImgUrl('brands-abbayeFontdouce.png')
        ;

        $abbayeFontdouceExperience = new Experience();
        $abbayeFontdouceExperience
            ->setName('Internship: Mobile Devoloper')
            ->setFromTo('Apr 2018 - Jun 2018')
            ->setPeriod('3 mos')
            ->setCompany('Abbaye de Fontdouce')
            ->setDescription('
                <div>Multi-platform mobile application: <strong>Game of Stones</strong>:</div><ul><li>Developing an adventure game application with the Ionic 3 Framework.</li><li>Connect the application with a "REST" API server created with NodeJS.</li><li>Build a Back-office to manage the application.&nbsp;</li></ul>
            ')
            ->setPlace('Saint-Bris-des-Bois')
            ->setBrands($abbayeFontdouce)
        ;

        $abbayeFontdouce->addExperience($abbayeFontdouceExperience);

        $manager->persist($abbayeFontdouce);
        $manager->persist($abbayeFontdouceExperience);

        // FST

        $fst = new Brands();
        $fst->setName('FST-Fès')
            ->setImgUrl('brands-fst.png')
        ;

        $fstExperience = new Experience();
        $fstExperience
            ->setName('Internship: Full-stack Developer')
            ->setFromTo('Apr 2016 - Jun 2016')
            ->setPeriod('3 mos')
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
        $healtCareMonitoring = new Work();
        $healtCareMonitoring
            ->setTitle('Plant health care monitoring solution')
            ->setDescription("
            A solotion for monitoring plant health by using sensors placed on plants to gather environmental data,
            which is then retrieved by a Node.js server and made accessible to users via a mobile web app 
            with notifications sent for necessary actions such as adjusting humidity or sun exposure.
            ")
            ->setImgUrl('work-health-care-monitoring.png')
            ->setCodeLink('settup github')
            ->setTags(['Node JS', 'IoT', 'Cordova', 'Mobile App'])
        ;

        $manager->persist($healtCareMonitoring);
        
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

        $skillTest = new Work();
        $skillTest
            ->setTitle('Skill Test App')
            ->setDescription("
                In this project, my goal is to showcase my expertise in backend development by summarizing my knowledge about: DDD, Clean Architecture, Test, Symfony, Docker, Messenger ...
            ")
            ->setImgUrl('skill-app.jpeg')
            ->setCodeLink('https://github.com/yelazami/SkillTest')
            ->setTags(['Symfony', 'PHP', 'DDD', 'CQRS'])
        ;

        $manager->persist($skillTest);
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

        $thomas = new Testimonials();
        $thomas
            ->setName('Thomas Brothier | Full Stack Developer / Web Designer')
            ->setCompany('Sellsy')
            ->setFeedback('Developer with a bright future! Does not back down from any technical or functional challenge and does not hesitate to maintain communication within a team.')
            ->setImgUrl('feedback-thomas.png')
        ;

        $manager->persist($thomas);

        $saad = new Testimonials();
        $saad
            ->setName('SAAD EL KHAYAT | Business Analyst')
            ->setCompany('Capgemini')
            ->setFeedback('His superior organizational skills give him a distinct advantage over others.')
            ->setImgUrl('feedback-saad.png')
        ;

        $manager->persist($saad);

        $lounis = new Testimonials();

        $lounis
            ->setName('Lounis Haddache | Ingénieur Études et Développement')
            ->setCompany('Dedalus Group')
            ->setFeedback('Yassine is a proactive person who is really involved in his work, he is good at what he does, professional with a good mood.')
            ->setImgUrl('feedback-lounis.jpeg')
        ;

        $manager->persist($lounis);
    }
}
