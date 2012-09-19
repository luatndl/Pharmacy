     
<div class="container clearfix">
<div class="title">
    <p><?php __("Image") ?></p>
        <h6></h6>
        <h5>&nbsp;<?php __("Directory") ?>: <?php echo $curDir ?></h5>
</div>    
<?php $session->flash(); ?>    

<div class="left">
    <p class="title_left"><?php __("Directory") ?></p>
    <?php if(isset($this->params['pass'][0])): ?>
        <?php if(isset($parentID)): ?>
            <p class="contend_left"><?php echo $html->link(__('UpFolder',true),array('action'=>'index',$parentID)); ?></p>
        <?php else: ?>
            <p class="contend_left"><?php echo $html->link(__('UpFolder',true),array('action'=>'index')); ?></p>
        <?php endif; ?>
    <?php endif; ?>
    
    <?php if(isset($listDir) && count($listDir) > 0): ?>
    <?php foreach($listDir as $item): ?>    
        <p class="contend_left"><?php echo $html->link($item['ResourceCategory']['name'],array('action'=>'index',$item['ResourceCategory']['id'])); ?>
            ( <?php echo $html->link($html->image('system/delete.png',array('width'=>11,'height'=>11,'title'=>__('Delete',true),'tooltip'=>__('Delete',true))), array('action' => 'delete_folder', $item['ResourceCategory']['id']), array('escape'=>false), sprintf(__('Are you sure you want to delete # %s?', true), $item['ResourceCategory']['id'])); ?> )
        </p>
    <?php endforeach; ?>
    <?php else: ?>
        <p class="contend_left"><?php __("EmptySubDirectory") ?></p>
    <?php endif; ?>
    
    <div class="half"></div>
    
    <div class="center">
    <table>
        <tr class="title_table">
            <td><?php __("NewDirectory") ?></td>
        </tr>
        <tr>
            <td>
                <center>
                    <?php echo $form->create('ResourceCategories',array('action'=>'add')) ?>
                        <?php 
                            $parentFolderID = null;
                            if(isset($this->params['pass'][0]))
                                $parentFolderID = $this->params['pass'][0];
                         ?>
                        <input type="hidden" name = "data[ResourceCategory][parent_id]" value="<?php echo $parentFolderID ?>" />
                        <input type="text" name="data[ResourceCategory][name]" />
                        <div class="half"></div>
                        <input type="submit" value="<?php __("Add") ?>" class="btn" />
                    </form>
                </center>
            </td>            
        </tr>
    </table>
    </div>    
</div>

<!--midle start-->        
<div class="midle not_full">                    
    <div class="under_title">
        <div class="search">
            <?php echo $form->create(null,array('action'=>'uploadImage',"enctype" => "multipart/form-data")) ?>
                <?php 
                    $dirID = null;
                    if(isset($this->params['pass'][0]))
                        $dirID = $this->params['pass'][0];
                 ?>
                <input type="hidden" name = "data[DirID]" value="<?php echo $dirID ?>" />
                <input type="file" name="data[Resource][file]" size="50" value="" id="ResourceFile" />
                <?php //echo $form->input('file',array("type" => "file",'label'=>'','size'=>'50')); ?>
                <input type="submit" value="<?php __("Upload") ?>" class="btn2" />
            </form>
        </div>
        <div class="cl"></div>
    </div>
    <div class="center">
        <?php if(isset($listFile) && count($listFile) > 0): ?>
            <?php echo $form->create(null,array('action'=>'fileprocess')) ?>
            <table cellspacing="10">
                <tr class="title_table">
                    <td colspan="5"><?php __("Image") ?></td>
                </tr>
                <tr>
                    <?php $i=0;foreach($listFile as $item): ?>
                    <?php if($i%5==0): ?>
                        </tr>
                        <tr>
                    <?php endif; ?>
                    <td width="20%">
                        <?php                             
                            $ext = substr($item['Resource']['name'], strrpos($item['Resource']['name'], '.') + 1);
                            $ext = strtolower($ext);
                            
                            $rootUrl = Helper::url('/',true);
                            if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png')  // Delete Image 
                            {                                
                                if(!empty($item['Resource']['thumbnail'])) // thumbnail
                                    echo '<a href = "'.$rootUrl.'img/'.$item['Resource']['thumbnail'].'">'.$html->image($item['Resource']['thumbnail'],array('class'=>'pic')).'</a>';
                                elseif(!empty($item['Resource']['image'])) // normal
                                    echo '<a href = "'.$rootUrl.'img/'.$item['Resource']['image'].'">'.$html->image($item['Resource']['image'],array('class'=>'pic')).'</a>';
                                else
                                    echo 'NoImage';
                            }
                            else
                            {
                                echo '<a href = "'.$rootUrl.$item['Resource']['image'].'">'.$html->image($html->getFileTypeIcon($ext),array('class'=>'pic','width'=>64,'height'=>64)).'</a>';
                            }
                        ?><br>
                        <input type="checkbox" name = "data[Resource][<?php echo $item['Resource']['id'] ?>]" />
                        - <?php echo $item['Resource']['name'] ?>
                    </td>
                    <?php $i++;endforeach; ?>
                    <?php 
                        $nullTD = 5-count($listFile)%5;
                        for($i=0;$i<$nullTD;++$i)
                        {
                            echo '<td>&nbsp;</td>';
                        }
                     ?>
                </tr>
                <tr class="title_table_bottom">
                    <td colspan="5"><input type="submit" value="<?php __("Delete") ?>" name="delete" class="btn" /></td>
                </tr>
            </table>
            </form>
        <?php else: ?>
            <table>
                <tr class="title_table">
                    <td colspan="2"><?php __("Empty") ?></td>
                </tr>
                <tr>
                    <td><br><?php __("UploadImage") ?><br><br></td>
                </tr>
            </table>
        <?php endif; ?>
    </div>
</div>
</div>