<?php

namespace Acme\TaskBundle\Controller;

use Acme\TaskBundle\Entity\Playlist;
use Acme\TaskBundle\Helpers\Paginator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\TaskBundle\Form\TaskType;

/**
 * Task controller.
 *
 * @Route("/playlist")
 */
class TaskController extends Controller
{

    /**
     * Lists all Task entities.
     *
     * @Route("/page/{num}", name="task")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($num)
    {
        $user = $this->container->get('security.context')->getToken()->getUsername();


        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeTaskBundle:Playlist')->findAll();
####################################################################################################

        // считаем количество записей
        $records_count = $em->createQuery(

            "SELECT COUNT(p) FROM Acme\TaskBundle\Entity\Playlist p"
        )
            ->getSingleResult();

        $records_count = $records_count[1]; //весь массив нам не нужен, а нужно именно количество


// выбираем сами записи
        $query = $em->createQuery(
            "SELECT p FROM Acme\TaskBundle\Entity\Playlist p"
        );
        $paginator = new Paginator( //подключаем хелпер
            $query, //запрос
            $records_count, //количество записей
            "/news/pages", //шаблон для генерации ссылок
            $num, //id странички, наш параметр {page}
            5,
            3
        );
        $records = $paginator->getItems(); //выдёргиваем результат

        $arr = array();
        for($i = 1;$i <=  ($records_count/3);$i++){

            array_push($arr,$i);
        }






####################################################################################################
        return array(
            'user' => $user,'entities' => $entities,'records'=> $records, 'paginator'=>$paginator, 'pageNum'=>$arr,
        );
    }

    /**
     * Creates a new Task entity.
     *
     * @Route("/", name="task_create")
     * @Method("POST")
     * @Template("AcmeTaskBundle:Task:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUsername();



        $entity  = new Playlist();
        $entity->setOwner($user);
        $form = $this->createForm(new TaskType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('task_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Task entity.
     *
     * @Route("/new", name="task_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Playlist();
        $form   = $this->createForm(new TaskType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Task entity.
     *
     * @Route("/{id}", name="task_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $user = $this->container->get('security.context')->getToken()->getUsername();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeTaskBundle:Playlist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Task entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'user'=> $user,
        );
    }

    /**
     * Displays a form to edit an existing Task entity.
     *
     * @Route("/{id}/edit", name="task_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeTaskBundle:Playlist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Task entity.');
        }

        $editForm = $this->createForm(new TaskType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Task entity.
     *
     * @Route("/{id}", name="task_update")
     * @Method("PUT")
     * @Template("AcmeTaskBundle:Task:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeTaskBundle:Playlist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Task entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TaskType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('task_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Task entity.
     *
     * @Route("/{id}", name="task_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeTaskBundle:Playlist')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Task entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl("SearchBundle_search"));

 /*       return $this->render(
            "AcmeTaskBundle:Task:test.html.twig",
            array(
                    'playlist_id'=>$id
            )
        );*/

    }

    /**
     * Creates a form to delete a Task entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
