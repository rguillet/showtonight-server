<?php

namespace S2n\ShowBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class AvailabilityAdmin extends Admin
{
  
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('event')
            ->add('event_date')
            ->add('event_time')
            ->add('price')
            ->add('capacity')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('event', 'sonata_type_model', array(), array())
            ->add('event_date')
            ->add('event_time')
            ->add('price')
            ->add('capacity')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('price')
            ->add('capacity')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('event_date')
            ->add('event_time')
            ->add('price')
            ->add('capacity')
        ;
    }
}