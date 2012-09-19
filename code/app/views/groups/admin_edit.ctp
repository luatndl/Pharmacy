         
 <div class="container clearfix">
    <div class="title">
        <p><?php __('Users & Groups');?></p>
            <h6></h6>
            <h5>&nbsp;&nbsp;<?php __("Group") ?> > <?php __("Management") ?></h5>
    </div>    
    <?php $session->flash(); ?>    
    
    <!--midle start-->        
    <div class="midle">                    
        <div class="under_title">                
            <p>
                <?php echo $html->link(__('Groups', true), array('action' => 'index'));?>
            </p>
            <div class="cl"></div>
        </div>
        <div class="center">
            <?php echo $form->create('Group');?>
            <?php echo $form->input('id'); ?>
            <table>
                <tr class="title_table">
                    <td colspan="2"></td>                    
                </tr>
                <tr>
                    <td align="right"><?php __("Name") ?></td>
                    <td align="left"><?php echo $form->input('name',array('label'=>'','div'=>''));?></td>
                </tr>
                <tr>
                    <td align="right" style="vertical-align:top"><?php __("Description") ?></td>
                    <td align="left"><textarea name="data[Group][description]" cols="80" rows="3"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="left">
                        <input type="submit" value="<?php __("Update") ?>" class="btn" />
                    </td>
                </tr>
                <tr class="title_table_bottom">
                    <td colspan="2">
                    </td>
                </tr>
            </table>
            </form>
            
            
            <?php echo $form->create('Group',array('action'=>'groupfunction')) ?>
            <input type="hidden" name = "data[GroupID]" value="<?php echo $this->params['pass'][0] ?>" />
            <table cellpadding="3" cellspacing="5" class="list">
                <tr class="title_table">
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <th align="right"><?php __("GroupFunction") ?></th>
                    <th></th>
                    <th align="left"><?php __("FunctionAvailable") ?></th>
                </tr>
                <tr>
                    <td align="right">
                        <select name = "data[GroupFunction][]" style="width:200px" width = "100px" size="10"  multiple="multiple">
                        <?php foreach($fGroup as $item): ?>
                            <option value="<?php echo $item['SysFunction']['id'] ?>"><?php echo $item['SysFunction']['name'] ?></option>
                        <?php endforeach; ?>                        
                        </select>
                    </td>
                    <td style="vertical-align:middle">
                        <input type="submit" value="<?php __("<< Add") ?>" class="btn" name="add" /><br><br>
                        <input type="submit" value="<?php __("Remove >>") ?>" class="btn" name = "remove" />
                    </td>
                    <td align="left">            
                        <select name = "data[FunctionAvailable][]" style="width:200px" width = "100px" size="10"  multiple="multiple">
                        <?php foreach($fAvailable as $key => $text): ?>
                            <option value="<?php echo $key ?>"><?php echo $text ?></option>
                        <?php endforeach; ?>                        
                        </select>
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>        
</div>