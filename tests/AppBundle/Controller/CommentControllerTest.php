<?php

namespace Tests\AppBundle\Controller;

use AppBundle\DataFixtures\ORM\LoadBadgeData;
use AppBundle\DataFixtures\ORM\LoadUserData;
use Liip\FunctionalTestBundle\Test\WebTestCase;

class CommentControllerTest extends WebTestCase {

    public function testUnauthorized()
    {
        $client = $this->makeClient();
        $client->request('GET', '/create');
        $this->assertStatusCode('302', $client);
    }

    public function testPostComment()
    {
        $em = $this->getContainer()->get('doctrine')->getManager();

        $referencies = $this->loadFixtures([
            LoadUserData::class,
            LoadBadgeData::class,
        ])->getReferenceRepository();

        $user = $referencies->getReference('user');
        $this->loginAs($user, 'main');
        $client = $this->makeClient();

        $crawler = $client->request('GET', '/create');
        $this->assertStatusCode('200', $client);

        // Poste un commentaire
        $form = $crawler->SelectButton('Commenter')->form();
        $form->setValues([
            'appbundle_comment[content]' => 'Salut les gens !'
        ]);
        $client->submit($form);
        $this->assertStatusCode('200', $client);

        $this->assertCount(1, $em->getRepository('AppBundle:Comment')->findAll());
        $this->assertCount(1, $em->getRepository('BadgeBundle:BadgeUnlock')->findAll());
    }

}