<?php

namespace App\Controller;


use App\Document\Account;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReportsController extends AbstractController
{

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }


    /**
     * @Route ("/helloReport", name="reports_view_list", methods={"GET"})
     */
    public function viewList(Request $request): Response
    {
        $accountId = $request->get('accountId');
        $reports = $this->documentManager->getRepository(Account::class);
        dump($request->query);
        if(isset($accountId)) {
            $rst = $reports->getByFilters(["accountId" => $accountId]);
        }
        else{
            $rst = $reports->getByFilters();
        }

        return $this->render('reports/helloReport.html.twig',
            [
                "content"=>$rst
            ]);
    }

}