<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;

class FormDesign extends Form
{
    /**
     * This method returns the default value for field 'csrf'
     */
    public function getCsrf()
    {
        return $this->security->getToken();
    }
    
    public function initialize()
    {
        $this->add(
            new Text(
                'user_name'
            )
        );

        $this->add(
            new Text(
                'password'
            )
        );

        // Add a text element to put a hidden CSRF
        $this->add(
            new Hidden(
                'csrf'
            )
        );
    }
}