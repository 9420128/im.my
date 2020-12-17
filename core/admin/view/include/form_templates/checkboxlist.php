<div class="vg-element vg-full vg-left vg-box-shadow">
    <div class="vg-wrap vg-element vg-full vg-box-shadow">
        <div class="vg-element vg-full vg-left">
            <span class="vg-header ui-sortable-handle"><?=$this->translate[$row][0] ?: $row?></span>
        </div>

        <? if($this->foreignData[$row]):?>
            <? foreach ($this->foreignData[$row] as $name => $value):?>

                <? if($value['sub']):?>

                    <div class="vg-element vg-full vg-input vg-relative vg-space-between select_wrap">
                        <span class="vg-text vg-left"><?=$value['name']?></span>
                        <span class="vg-text vg-right select_all">Выделить все</span>
                    </div>
                    <div class="option_wrap">
                        
                        <? foreach ($value['sub'] as $item):?>

                        <label class="custom_label" for="<?=$name?>-<?=$item['id']?>">
                            <div>
                                <input id="<?=$name?>-<?=$item['id']?>" type="checkbox" name="<?=$row?>[<?=$name?>][<?=$item['id']?>][id]"
                                       value="<?=$item['id']?>" <? if(isset($this->data[$row][$name][$item['id']])) echo 'checked'?>>
                                <span class="custom_check backgr_bef"></span>
                                <span class="label"><?=$item['name']?></span>
                            </div>

                            <? if(!empty($item[$this->table . '_value'])):?>
                                <input type="text" name="<?=$row?>[<?=$name?>][<?=$item['id']?>][<?=$this->table . '_value'?>]"
                                value="<?=!empty($this->data[$row][$name][$item['id']]) ? $this->data[$row][$name][$item['id']] : ''?>"
                                style="margin-left: 15px">
                        <? endif;?>
                        </label>

                        <? endforeach?>
                    </div>
                
                <? endif;?>



            <? endforeach?>
        <? endif;?>


    </div>
</div>

