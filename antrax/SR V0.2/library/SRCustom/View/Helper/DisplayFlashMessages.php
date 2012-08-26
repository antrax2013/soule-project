<?php
class SR_View_Helper_DisplayFlashMessages extends Zend_View_Helper_Abstract
{
    /**
     * Retourne une liste HTML des messages flash
     *
     * @return string
     */
    public function displayFlashMessages()
    {
        $flash = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger');

        if ($flash->count())
        {
            $message = $flash->getMessages();
            if(is_array($message[0]))
            {
                list($classCss,) = each($message[0]);
                $message = $message[0];
            }
            else
            {
               $classCss="info";
            }

            return $this->view->htmlList(
                $message,
                false,
                array('id' => 'SR_FlashMessage', 'class' => $classCss)
            );
        }
        else
        {
            return '';
        }
    }
}
?>