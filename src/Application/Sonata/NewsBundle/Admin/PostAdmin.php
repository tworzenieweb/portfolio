<?php

namespace Application\Sonata\NewsBundle\Admin;

use Sonata\NewsBundle\Admin\PostAdmin as BasePostAdmin;
use Sonata\AdminBundle\Form\FormMapper;

class PostAdmin extends BasePostAdmin {
 
    
    public function configureFormFields(FormMapper $form)
    {
        parent::configureFormFields($form);
        
        
        
        $form
                ->with('General')
                ->add('image', 'sonata_type_model_list', array('label' => 'Post thumbnail'), array('link_parameters' => array('context' => 'default')))
                ->end();
    }
    
}