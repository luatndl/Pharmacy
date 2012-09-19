<?php
class StaticPagesController extends AppController 
{
	var $name = 'StaticPages';
	var $helpers = array('Html', 'Form');
    var $components = array('RequestHandler');
    
    function beforeFilter()
    {        
        parent::beforeFilter();
        
        $curAction = $this->params['action'];
        if($curAction != 'admin_index' && $curAction != 'admin_update')
        {
            $content = $this->StaticPage->getContent($curAction);            
            $this->set('content',$content);
        }        
    }        
    
    function admin_index($pageID = null,$action = null)
    {        
        if($pageID == null)
        {
            $temp = $this->StaticPage->find('first');
            if(!empty($temp))
            {
                $pageID = $temp['StaticPage']['id'];
                $this->redirect(array('action'=>'index',$pageID));
            }                
        }
        
        if($pageID != null)
        {
            if($this->RequestHandler->isAjax())
            $this->layout = null;

            if(!empty($this->data))
            {            
                $this->StaticPage->saveAll($this->data);            
            }        
                
            if($action == 'update') // Update
            {
                $this->set('eID',$pageID);
            }
            
            $arr = $this->StaticPage->find('first',array('conditions'=>array('StaticPage.id'=>$pageID)));
            $this->set('content',$arr['StaticPage']['content']);
            
            $pageName = $this->StaticPage->field('StaticPage.name',array('StaticPage.id'=>$pageID));
            $pageList = $this->StaticPage->find('all');
            $this->set(compact('pageName','pageList'));        
            
            if($this->RequestHandler->isAjax())
            {            
                $this->viewPath = 'elements'.DS.'static_pages';
                $this->render('update_div');
            }
        }        
    }
    
    // Front end
    
    function help()
    {
        
    }    
    
    
}
?>