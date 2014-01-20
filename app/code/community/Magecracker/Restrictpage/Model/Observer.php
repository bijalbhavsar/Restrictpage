<?php

class Magecracker_Restrictpage_Model_Observer 
{ 
    /**
     * change homepage content
     * @param Varien_Event_Observer $observer
     */
    public function changeHomepageContent(Varien_Event_Observer $observer) {
       $fullActionName = $observer->getEvent()->getAction()->getFullActionName(); 
        
       if($fullActionName == 'cms_index_index') { // check if current action is CMS Homepage 
             if (!Mage::getSingleton('customer/session')->isLoggedIn()) { // Check if customer is not logged in
                    $layout = $observer->getEvent()->getLayout(); 
                    $layout->getUpdate()->removeHandle('cms_page');// remove CMS page content
                    $layout->getUpdate()->addHandle('customer_account_login'); // add login form 
            } 
        }
         
            
    }        
}
          
?>
