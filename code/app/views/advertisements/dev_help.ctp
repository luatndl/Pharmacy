<?php 
    // Controller - Before filter
    
    // Auto update status base on expired date
    $this->Advertisement->updateStatus();
        
        
    // Set advData for view
    $advData = $this->Advertisement->getAdv();
    $this->set('advData',$advData); 
 ?>
 
 // View -  Render adv base on position 
 <table border="1">
    <tr>
        <td width="200px"><?php $adv->renderAdv($advData,ADV_LEFT) ?></td>
        <td width="300px"><?php $adv->renderAdvMiddle($advData) ?></td>
    </tr>
</table>