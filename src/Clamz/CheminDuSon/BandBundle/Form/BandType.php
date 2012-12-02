<?php

namespace Clamz\CheminDuSon\BandBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null,array("label"=>"form.band.name.label", 'translation_domain' => 'bandbundle-form'))
            ->add('nationality','text',array("label"=>"form.band.nationality.label", 'translation_domain' => 'bandbundle-form'))
            ->add('image')
            ->add('presentation','textarea',
            	array("label"=>"form.band.presentation.label",
            			"attr" => array('class' => 'ckeditor'), 
            			'translation_domain' => 'bandbundle-form'))
            ->add('tags','collection',array('type'=>new TagType(),"allow_add" =>true,'by_reference'=>false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Clamz\CheminDuSon\BandBundle\Entity\Band'
        ));
    }

    public function getName()
    {
        return 'clamz_cheminduson_bandbundle_bandtype';
    }
}
