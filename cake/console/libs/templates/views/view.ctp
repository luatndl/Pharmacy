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
        <h5>&nbsp;<?php echo "<?php __('View') ?>" ?></h5>
</div>    
<?php echo "<?php \$session->flash(); ?>" ?>

<!--left start-->
<!--left end-->

<!--midle start-->        
<div class="midle">                    
    <div class="under_title">                
        <p>
            <?php echo "<?php echo \$html->link(__('List{$pluralHumanName}', true), array('action' => 'index')); ?>"; ?>
        </p>
        <div class="search">
        </div>
        <div class="cl"></div>
    </div>
    <div class="center">
        <table>
            <tr class="title_table">
                <td colspan="2"></td>
            </tr>
            <?php
                foreach ($fields as $field) 
                {
                    $isKey = false;
                    if (!empty($associations['belongsTo'])) 
                    {
                        foreach ($associations['belongsTo'] as $alias => $details) 
                        {
                            if ($field === $details['foreignKey']) 
                            {
                                $isKey = true;
                                echo "\t\t<dt<?php if (\$i % 2 == 0) echo \$class;?>><?php __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></dt>\n";
                                echo "\t\t<dd<?php if (\$i++ % 2 == 0) echo \$class;?>>\n\n\t\t\t&nbsp;\n\t\t</dd>\n";
                                
                                echo "<tr>\n";
                                echo "\t<td align = 'right'></td>\n";
                                echo "\t<td align = 'left'><?php echo \$html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></td>\n";
                                echo "</tr>\n";
                                break;
                            }
                        }
                    }
                    if ($isKey !== true) 
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
                        echo "\t\t\t\t<td align = 'right'><?php __('$result') ?></td>\n";
                        echo "\t\t\t\t<td align = 'left'><?php echo \${$singularVar}['{$modelClass}']['{$field}']; ?></td>\n";
                        echo "\t\t\t</tr>\n";
                    }
                }
                ?>
            <tr class="title_table_bottom">
                <td colspan="2">
                </td>
            </tr>
        </table>
    </div>
</div>
</div>