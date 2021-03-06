     
<div class="container clearfix">
<div class="title">
    <p><?php __("Advertisements") ?></p>
        <h6></h6>
        <h5>&nbsp;<?php __("Edit") ?></h5>
</div>    
<?php $session->flash(); ?>

<!--midle start-->        
<div class="midle">                    
    <div class="under_title">
        <p><?php echo $html->link(__('ListAdvertisements', true), array('action' => 'index'));?></p>
        <div class="cl"></div>
    </div>
    <div class="center">
        <?php echo $form->create('Advertisement');?>
            <?php echo $form->input('id'); ?>
            <table>
                <tr class="title_table">
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td align="right"><?php __("Name") ?></td>
                    <td align="left"><?php echo $form->input('name',array('label'=>'','div'=>'')); ?></td>
                </tr>
                <tr>
                    <td align="right"><?php __("Description") ?></td>
                    <td align="left"><?php echo $form->input('description',array('label'=>'','div'=>'')); ?></td>
                </tr>
                <tr>
                    <td align="right"><?php __("Image") ?></td>
                    <td align="left" style="vertical-align:top">
                        <div id = 'div_key'>
                        <?php 
                            if(!empty($this->data['Advertisement']['image'])) 
                            {
                                $ext = substr($this->data['Advertisement']['image'], strrpos($this->data['Advertisement']['image'], '.') + 1);
                                $ext = strtolower($ext);
                                
                                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png')
                                {
                                     echo $html->image($this->data['Advertisement']['image'],array('class'=>'pic'));
                                }
                                else
                                {
                                    echo $html->image($html->getFileTypeIcon($ext),array('class'=>'pic','width'=>64,'height'=>64));
                                }
                            }                                  
                        ?>
                        <div class="half"></div>
                        </div>                        
                        <input type="text" size="50" id = "txt_key" value="<?php echo $this->data['Advertisement']['image'] ?>" name="data[Advertisement][image]" /> 
                        <input type="button" id = "btnBrowse1" value="Browse" class="btn2" />
                        <?php 
                            $rootUrl = Helper::url('/',true);
                            $browseUrl = $rootUrl."/admin/resources/adv_browse";
                        ?>
                        <script>    
                          jq(document).ready(function(){
                           jq("#btnBrowse1").click(function(event)
                           {            
                               window.open ("<?php echo $browseUrl."/key" ?>", "mywindow", "toolbar=no,menubar=no,scrollbars=yes");
                           });
                         });
                        </script>
                    </td>
                </tr>
                <tr>
                    <td align="right"><?php __("Url") ?></td>
                    <td align="left"><?php echo $form->input('url',array('label'=>'','div'=>'')); ?></td>
                </tr>
                <tr>
                    <td align="right"><?php __("Displayorder") ?></td>
                    <td align="left"><?php echo $form->input('displayorder',array('label'=>'','div'=>'')); ?></td>
                </tr>
                <tr>
                    <td align="right"><?php __("ExpiredDate") ?></td>
                    <td align="left"><?php echo $form->input('expired_date',array('label'=>'','div'=>'')); ?></td>
                </tr>
                <tr>
                    <td align="right"><?php __("PosType") ?></td>
                    <td align="left">
                        <select name="data[Advertisement][pos_type]">
                            <?php foreach($type as $key => $text): ?>
                            <option value="<?php echo $key ?>" <?php if($this->data['Advertisement']['pos_type'] == $key) echo 'selected = "selected"' ?>><?php echo $text ?></option>
                            <?php endforeach; ?>                
                        </select>
                    </td>
                </tr>
                <tr> 
                    <td align="right"><?php __("Active") ?></td>
                    <td align="left"><?php echo $form->input('status',array('label'=>'','div'=>'')) ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="left">
                        <input type="submit" value="<?php __("Submit") ?>" class="btn" />
                        <input type = "button" class="btn" onclick="location.href='<?php echo $html->url('/admin/advertisements'); ?>';" value="<?php __("Back") ?>" />
                    </td>
                </tr>
                <tr class="title_table_bottom">
                    <td colspan="2"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
</div>