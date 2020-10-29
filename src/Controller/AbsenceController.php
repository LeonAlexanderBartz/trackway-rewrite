<?php

namespace App\Controller;

use App\Entity\Absence;
use App\Form\AbsenceFormType;
use App\Repository\AbsenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AbsenceController
 *
 * @package AppBundle\Controller
 * @Route("/absence")
 */
class AbsenceController extends AbstractFOSRestController
{
    private EntityManagerInterface $entityManager;

    private AbsenceRepository $absenceRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->absenceRepository = $entityManager->getRepository(Absence::class);
    }

    /**
     * @Route("/new", methods={"POST"}, format="json")
     */
    public function postAbsenceAction(Request $request)
    {
        $form = $this->prepareForm($request);

        if ($this->formIsInvalid($form)) {
            return $this->returnErrors($form);
        } else {
            $this->saveEntity($form);
            return $this->returnSuccess();
        }
    }

    /**
     * @Route("/{id}", requirements={"id": "\d+"}, methods={"GET"}, format="json")
     * @Rest\View()
     */
    public function getAbsenceAction(string $id)
    {
        $absence = $this->getAbsenbyId($id);

        return $this->handleView(
            $this->view(
                $absence
            )
        );
    }

    /**
     * @Route("/{id}", requirements={"id": "\d+"}, methods={"PUT"}, format="json")
     */
    public function putAction(Request $request, string $id) : Response
    {
        $absence = $this->getAbsenbyId($id);

        $form = $this->createForm(AbsenceFormType::class, $absence);

        $form->submit($request->request->all());

        if($form->isValid() === false) {
            return $this->handleView(
                $this->view(
                    $form
                )
            );
        }

        $this->entityManager->flush();

        return $this->handleView(
            $this->view(
                $absence
            )
        );
    }

    /**
     * @Route("/{id}", requirements={"id": "\d+"}, methods={"PATCH"}, format="json")
     */
    public function patchAction(Request $request, string $id) : Response
    {
        $absence = $this->getAbsenbyId($id);

        $form = $this->createForm(AbsenceFormType::class, $absence);
        $form->submit($request->request->all(), true);

        if($form->isValid() === false) {
            return $this->handleView(
                $this->view(
                    $form
                )
            );
        }

        $this->entityManager->flush();

        return $this->handleView(
            $this->view(
                $absence
            )
        );
    }

    /**
     * @Route("/{id}", requirements={"id": "\d+"}, methods={"DELETE"}, format="json")
     */
    public function delete(string $id) : Response
    {
        $absence = $this->getAbsenbyId($id);
        $this->entityManager->remove($absence);
        $this->entityManager->flush();

        return $this->handleView(
            $this->view(
                null,
                Response::HTTP_NO_CONTENT
            )
        );
    }

    private function getAbsenbyId($id) {
        $absence = $this->absenceRepository->find($id);

        if($absence === null) {
            throw new NotFoundHttpException();
        }

        return $absence;
    }

    /**
     * @Route("/{id}/copy", requirements={"id": "\d+"}, name="absence_calendar_copy", options={"expose"=true}, methods={"GET"})
     */
    public function copyCalendar(Request $request, Absence $absence) : Response
    {
        return new Response();
    }

    /**
     * @Route("/{id}/calendar_edit", requirements={"id": "\d+"}, name="absence_calendar_edit", options={"expose"=true}, methods={"GET", "POST"})
     */
    public function editCalendar(Request $request, Absence $absence) : Response
    {
        return new Response();
    }

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function formIsInvalid(FormInterface $form) : bool
    {
        return $form->isValid() === false;
    }

    /**
     * @param FormInterface $form
     * @return Response
     */
    public function returnErrors(FormInterface $form) : Response
    {
        return $this->handleView(
            $this->view(
                $form
            )
        );
    }

    /**
     * @return Response
     */
    public function returnSuccess() : Response
    {
        return $this->handleView(
            $this->view(
                [
                    "status" => "ok"
                ],
                Response::HTTP_CREATED
            )
        );
    }

    /**
     * @param FormInterface $form
     */
    public function saveEntity(FormInterface $form) : void
    {
        $this->entityManager->persist($form->getData());
        $this->entityManager->flush();
    }

    /**
     * @param Request $request
     * @return FormInterface
     */
    public function prepareForm(Request $request) : FormInterface
    {
        $form = $this->createForm(AbsenceFormType::class, new Absence());
        $form->submit($request->request->all());
        return $form;
    }
}
