<?php
/* SVN FILE: $Id$ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<div class="container clearfix">
<div class="title">
    <p><?php echo "<?php __('{$singularHumanName}');?>";?></p>
        <h6></h6>
        <h5>&nbsp;<?php echo "<?php __('".Inflector::humanize($action)."');?>";?></h5>
</div>    
 <?php echo "<?php \$session->flash(); ?>" ?>

<!--left start-->
<!--left end-->

<!--midle start-->        
<div class="midle">                    
    <div class="under_title">                
        <p>
            <?php echo "<?php echo \$html->link(__('List{$pluralHumanName}', true), array('action' => 'index'));?>";?>
        </p>
        <div class="search">
        </div>
        <div class="cl"></div>
    </div>
    <div class="center">
        <?php echo "<?php echo \$form->create('{$modelClass}');?>\n";?>
        <table>
            <tr class="title_table">
                <td colspan="2"></td>
            </tr><?php echo "\n\n" ?>
            <?php
                foreach ($fields as $field) 
                {
                    if ($action == 'add' && $field == $primaryKey) 
                    {
                        continue;
                    } 
                    elseif ($action == 'edit' && $field == $primaryKey) 
                    {
                        echo "<?php echo \$form->input('{$field}',array('label'=>'','div'=>'')); ?>";
                    }
                    elseif (!in_array($field, array('created', 'modified', 'updated'))) 
                    {
                        // Convert to upper first key
                        $arrTemp = explode('_',$field);
                        $result = '';
                        foreach($arrTemp as $item)
                        {
                            $item = ucfirst($item);
                            $result .= $item;
                        }
                        // -------------------
                        
                        echo "\t\t\t<tr>\n";
                        echo "\t\t\t\t<td align='right'><?php __('{$result}') ?></td>\n";
                        echo "\t\t\t\t<td align='left'><?php echo \$form->input('{$field}',array('label'=>'','div'=>'')); ?></td>\n";
                        echo "\t\t\t</tr>\n";
                    }
                }
                
                if (!empty($associations['hasAndBelongsToMany'])) 
                {
                    foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) 
                    {
                        // Convert to upper first key
                        $arrTemp = explode('_',$assocName);
                        $result = '';
                        foreach($arrTemp as $item)
                        {
                            $item = ucfirst($item);
                            $result .= $item;
                        }
                        // -------------------
                        
                        echo "<tr>\n";
                        echo "\t<td align='right'><?php __('{$result}') ?></td>\n";
                        echo "\t<td align='left'><?php echo \$form->input('{$assocName}',array('label'=>'','div'=>'')); ?></td>\n";
                        echo "</tr>\n";
                    }
                }
            ?>
            <tr>
                <td></td>
                <td align="left">
                    <?php $controller = strtolower($modelClass).'s'; ?>
<input type="submit" value="<?php __("Submit") ?>" class="btn" />                    
                    <input type = "button" class="btn" onclick="location.href='<?php echo "<?php echo \$html->url('/admin/$controller'); ?>" ?>';" value="<?php echo '<?php __("Back") ?>' ?>" />
                </td>
            </tr>
            <tr class="title_table_bottom">
                <td colspan="2">
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>
</div>