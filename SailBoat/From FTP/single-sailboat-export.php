<?php 
    $is_associations_ar = General_Functions::is_rtl($sailboat_term_data['associations']);
    $associations_text_class = "en-text";
    if($is_associations_ar){
        $associations_text_class = "ar-text";
    }
    $is_designers_ar = General_Functions::is_rtl($sailboat_term_data['designers']);
    $designers_text_class = "en-text";
    if($is_designers_ar){
        $designers_text_class = "ar-text";
    }
    $is_builders_ar = General_Functions::is_rtl($sailboat_term_data['builders']);
    $builders_text_class = "en-text";
    if($is_builders_ar){
        $builders_text_class = "ar-text";
    }
    $is_products_ar = General_Functions::is_rtl($sailboat_term_data['products']);
    $products_text_class = "en-text";
    if($is_products_ar){
        $products_text_class = "ar-text";
    }
    $export_pdf = true;

?>
<div class="pdf-header">
    <div class="text-center"> 
        <img src="var:myvariable" alt="">
    </div>
</div>

<div class="pdf-body">
    <div class="boats-dimension">
        <h1><?= $post->post_title ?></h1>
    </div>
    <?php
    // listing data
    if($term){
        include get_stylesheet_directory() . '/templates/general/listing/listing-description.php';
        include get_stylesheet_directory() . '/templates/general/listing/listing-info.php';
        include get_stylesheet_directory() . '/templates/general/listing/listing-contact-info.php';
    }
    ?>
    
    <!-- sailboat specifications -->
    <div class="spec">
        <h4>Sailboat Specifications</h4>
        <div class="spec-bord">
            <table class="table">
                <tbody class="table-light">
                    <tr>
                        <?php if($sailboat_term_data['hull']){?>
                        <th <?= $sailboat_term_data['rig']==''? 'colspan="2"':'' ?>><?php _e('Hull Type','sailboat') ?>:</th>
                        <td <?= $sailboat_term_data['rig']==''? 'colspan="2"':'' ?>><?= $sailboat_term_data['hull'] ?></td>
                        <?php } 
                        if($sailboat_term_data['rig']){?>
                        <th <?= $sailboat_term_data['hull']==''? 'colspan="2"':'' ?>><?php _e('Rigging Type','sailboat') ?>:</th>
                        <td <?= $sailboat_term_data['hull']==''? 'colspan="2"':'' ?>><?= $sailboat_term_data['rig']?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                    <?php
                        if($sailboat_imperial_data['loa'] != 0){?>
                        <th <?= $sailboat_imperial_data['lod'] == 0? 'colspan="2"':'' ?>><?php _e('LOA','sailboat') ?>:</th>
                        <td <?= $sailboat_imperial_data['lod'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['loa'] ?></td>
                        <?php } 
                         if($sailboat_imperial_data['lod'] != 0){?>
                        <th <?= $sailboat_imperial_data['loa'] == 0? 'colspan="2"':'' ?> ><?php _e('LOD','sailboat') ?></th>
                        <td <?= $sailboat_imperial_data['loa'] == 0? 'colspan="2"':'' ?>><?=$sailboat_data['lod']?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if($sailboat_imperial_data['lwl'] != 0){?>
                            <th <?= $sailboat_imperial_data['sa'] == 0? 'colspan="2"':'' ?> ><?php _e('LWL','sailboat') ?>:</th>
                            <td <?= $sailboat_imperial_data['sa'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['lwl'] ?></td>
                            <?php } 
                        if($sailboat_imperial_data['sa'] != 0){?>
                            <th <?= $sailboat_imperial_data['lwl'] == 0? 'colspan="2"':'' ?> ><?php _e('S.A. (reported)','sailboat') ?></th>
                            <td <?= $sailboat_imperial_data['lwl'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['sa'] ?></td>
                            <?php } ?>
                    </tr>
                    <tr>
                        <?php if($sailboat_imperial_data['beam'] != 0){?>
                        <th <?= $sailboat_imperial_data['beam_wl'] == 0? 'colspan="2"':'' ?> ><?php _e('Beam','sailboat') ?>:</th>
                        <td <?= $sailboat_imperial_data['beam_wl'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['beam'] ?></td>
                        <?php } 
                        if($sailboat_imperial_data['beam_wl'] != 0){?>
                        <th <?= $sailboat_imperial_data['beam'] == 0? 'colspan="2"':'' ?> ><?php _e('Beam WL','sailboat') ?>:</th>
                        <td <?= $sailboat_imperial_data['beam'] == 0? 'colspan="2"':'' ?>><?=$sailboat_data['beam_wl']?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                    <?php if($sailboat_imperial_data['disp'] != 0){?>
                        <th <?= $sailboat_imperial_data['ballast'] == 0? 'colspan="2"':'' ?> ><?php _e('Displacement','sailboat') ?>:</th>
                        <td <?= $sailboat_imperial_data['ballast'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['disp'] ?></td>
                        <?php } 
                        if($sailboat_imperial_data['ballast'] != 0){?>
                        <th <?= $sailboat_imperial_data['disp'] == 0? 'colspan="2"':'' ?> ><?php _e('Ballast','sailboat') ?>:</th>
                        <td <?= $sailboat_imperial_data['disp'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['ballast'] ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                    <?php if($sailboat_imperial_data['max_draft'] != 0){?>
                        <th <?= $sailboat_imperial_data['min_draft'] == 0? 'colspan="2"':'' ?> ><?php _e('Max Draft','sailboat') ?>:</th>
                        <td <?= $sailboat_imperial_data['min_draft'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['max_draft'] ?></td>
                        <?php } 
                        if($sailboat_imperial_data['min_draft'] != 0){?>
                        <th <?= $sailboat_imperial_data['max_draft'] == 0? 'colspan="2"':'' ?> ><?php _e('Min Draft','sailboat') ?>:</th>
                        <td <?= $sailboat_imperial_data['max_draft'] == 0? 'colspan="2"':'' ?> ><?= $sailboat_data['min_draft'] ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(get_post_meta($sailboat_term_data['post_id'], 'hull_construction',true)){?>
                        <th <?= get_post_meta($sailboat_term_data['post_id'], 'ballast_type', true)==false? 'colspan="2"':'' ?>><?php _e('Construction','sailboat') ?>:</th>
                        <td <?= get_post_meta($sailboat_term_data['post_id'], 'ballast_type', true)==false? 'colspan="2"':'' ?>><?= get_post_meta($sailboat_term_data['post_id'], 'hull_construction', true) ?></td>
                        <?php } 
                        if(get_post_meta($sailboat_term_data['post_id'], 'ballast_type', true)){?>
                        <th <?= get_post_meta($sailboat_term_data['post_id'], 'hull_construction')==false? 'colspan="2"':'' ?>><?php _e('Ballast Type','sailboat') ?></th>
                        <td <?= get_post_meta($sailboat_term_data['post_id'], 'hull_construction')==false? 'colspan="2"':'' ?>><?= get_post_meta($sailboat_term_data['post_id'], 'ballast_type', true) ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(get_post_meta($sailboat_term_data['post_id'], 'first_built',true)){?>
                        <th <?= get_post_meta($sailboat_term_data['post_id'], 'last_built',true)==false? 'colspan="2"':'' ?> ><?php _e('Frist Built','sailboat') ?>:</th>
                        <td <?= get_post_meta($sailboat_term_data['post_id'], 'last_built',true)==false? 'colspan="2"':'' ?>><?= get_post_meta($sailboat_term_data['post_id'], 'first_built', true) ?></td>
                        <?php } 
                        if(get_post_meta($sailboat_term_data['post_id'], 'last_built',true)){?>
                        <th <?= get_post_meta($sailboat_term_data['post_id'], 'first_built',true)==false? 'colspan="2"':'' ?> ><?php _e('Last Built','sailboat') ?>:</th>
                        <td <?= get_post_meta($sailboat_term_data['post_id'], 'first_built',true)==false? 'colspan="2"':'' ?> ><?= get_post_meta($sailboat_term_data['post_id'], 'last_built', true) ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                    <?php 
                        if($sailboat_term_data['number_built']){?>
                        <th <?= $sailboat_term_data['builders']==''? 'colspan="2"':'' ?> ><?php _e('# Built','sailboat') ?>:</th>
                        <td <?= $sailboat_term_data['builders']==''? 'colspan="2"':'' ?>><?= $sailboat_term_data['number_built']?>
                        </td>
                        <?php } 
                         if($sailboat_term_data['builders']){?>
                        <th <?= $sailboat_term_data['number_built']==''? 'colspan="2"':'' ?> ><?php _e('Builder','sailboat') ?></th>
                        <td <?= $sailboat_term_data['number_built']==''? 'colspan="2"':'' ?>><span class="<?= $builders_text_class ?>"><?= $sailboat_term_data['builders']?></span>
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                    <?php if($sailboat_term_data['designers']){?>
                        <th colspan="2"><?php _e('Designer','sailboat') ?>:</th>
                        <td colspan="2"><span class="<?= $designers_text_class ?>"><?= $sailboat_term_data['designers'] ?></span></td>
                        <?php }?>
                    </tr>
                    <tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Auxiliary Power/Tanks -->

    <div class="spec">
    <?php if($hp || ($aux && $aux_type) || $fuel_tank ){?>
        <h4><?php _e('Auxiliary Power/Tanks (orig. equip.)','sailboat') ?></h4>
        <div class="spec-bord">
            <table class="table">
                <tbody class="table-light">
                    <?php 
                    if($aux!=''){ ?>
                    <tr>
                        <th><?php _e('Make','sailboat') ?>:</th>
                        <td><?= $aux ?></td>
                    </tr>
                    <?php } 
                    if($aux_type!=''){?>
                    <tr>
                        <th><?php _e('Type','sailboat') ?>:</th>
                        <td><?= $aux_type ?></td>
                    </tr>
                    <?php } 
                    if($hp!=''){?>
                    <tr>
                        <th><?php _e('HP','sailboat') ?>:</th>
                        <td><?= $hp ?></td>
                    </tr>
                    <?php } ?>
                    <?php if($fuel_tank){ ?>
                        <tr>
                            <th><?php _e('Fuel:','sailboat') ?></th>
                            <td><?= $fuel_tank ?></td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
    </div>

    <!-- accomodations -->
    <div class="spec">
    <?php
        if($sailboat_imperial_data['water_tank'] != 0){?>
        <h4><?php _e('Accomodations','sailboat') ?></h4>
        <div class="spec-bord">
            <table class="table">
                <tbody class="table-light">
                    <tr>
                        <th><?php _e('Water','sailboat') ?>:</th>
                        <td><?= $sailboat_data['water_tank'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>
    </div>

    <!-- Sailboat Calculations -->
    <?php if( get_post_meta($sailboat_term_data['post_id'], 'sa_disp_ratio', true) || get_post_meta($sailboat_term_data['post_id'], 'bal_disp_ratio', true)
    || get_post_meta($sailboat_term_data['post_id'], 'disp_len_ratio', true) || get_post_meta($sailboat_term_data['post_id'], 'comfort_ratio', true) ||
    get_post_meta($sailboat_term_data['post_id'], 'capsize_ratio', true) || $sailboat_data['s_number'] !=0  || $sailboat_data['hull_speed'] != 0 ||
    $sailboat_data['immersion'] != 0  ){ ?>
    <div class="spec">
        <h4><?php _e('Sailboat Calculations','sailboat') ?></h4>
        <div class="spec-bord">
            <table class="table">
                <tbody class="table-light">
                <?php if(get_post_meta($sailboat_term_data['post_id'], 'sa_disp_ratio', true) ){?>
                <tr>
                    <th><?php _e('S.A. / Displ','sailboat') ?>.:</th>
                    <td><?= get_post_meta($sailboat_term_data['post_id'], 'sa_disp_ratio', true) ?></td>
                </tr>
                <?php }
                 if(get_post_meta($sailboat_term_data['post_id'], 'bal_disp_ratio', true) ){?>
                <tr>
                    <th><?php _e('Bal. / Displ.','sailboat') ?>:</th>
                    <td><?= get_post_meta($sailboat_term_data['post_id'], 'bal_disp_ratio', TRUE) ?></td>
                </tr>
                <?php }
                 if(get_post_meta($sailboat_term_data['post_id'], 'disp_len_ratio', true) ){?>
                <tr>
                    <th><?php _e('Disp: / Len','sailboat') ?>:</th>
                    <td><?= get_post_meta($sailboat_term_data['post_id'], 'disp_len_ratio', TRUE) ?></td>
                </tr>
                <?php }
                 if(get_post_meta($sailboat_term_data['post_id'], 'comfort_ratio', true) ){?>
                <tr>
                    <th><?php _e('Comfort Ratio','sailboat') ?>:</th>
                    <td><?= get_post_meta($sailboat_term_data['post_id'], 'comfort_ratio', TRUE) ?></td>
                </tr>
                <?php }
                 if(get_post_meta($sailboat_term_data['post_id'], 'capsize_ratio', true) ){?>
                <tr>
                    <th><?php _e('Capsize Screening Formula','sailboat') ?>:</th>
                    <td><?= get_post_meta($sailboat_term_data['post_id'], 'capsize_ratio', TRUE) ?></td>
                </tr>
                <?php }
                 if($sailboat_data['s_number'] !=0 ){?>
                <tr>
                    <th><?php _e('S#','sailboat') ?>:</th>
                    <td><?= $sailboat_data['s_number'] ?></td>
                </tr>
                <?php }
                 if($sailboat_data['hull_speed'] != 0){?>
                <tr>
                    <th><?php _e('Hull Speed','sailboat') ?>:</th>
                    <td><?= $sailboat_data['hull_speed'] ?></td>
                </tr>
                <?php }
                 if($sailboat_data['immersion'] != 0 ){?>
                <tr>
                    <th><?php _e('Pounds/Inch Immersion','sailboat') ?>:</th>
                    <td><?= $sailboat_data['immersion'] ?></td>
                </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <?php } ?>

    <!-- Rig and Sail Particulars -->
    <?php if($sailboat_imperial_data['i'] != 0 ||$sailboat_imperial_data['j'] != 0||
    $sailboat_imperial_data['p'] != 0 ||$sailboat_imperial_data['e'] != 0||$sailboat_imperial_data['py'] != 0
    ||$sailboat_imperial_data['ey'] != 0 || $sailboat_imperial_data['isp'] != 0 || $sailboat_imperial_data['SAFore'] != 0
    || $sailboat_imperial_data['SAMain'] != 0 || $sailboat_imperial_data['SATotal'] != 0 || 
    $sailboat_imperial_data['Displ_calc'] != 0 || $sailboat_imperial_data['EstForestayLen'] != 0){ ?>

    <div class="spec">
        <h4><?php _e('Rig and Sail Particulars','sailboat') ?></h4>
        <div class="spec-bord">
            <table class="table">
                <tbody class="table-light">
                <tr>
                    <?php if($sailboat_imperial_data['i'] != 0){ ?>
                    <th <?= $sailboat_imperial_data['j'] == 0? 'colspan="2"':'' ?>><?php _e('I','sailboat') ?>:</th>
                    <td <?= $sailboat_imperial_data['j'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['i'] ?></td>
                    <?php }
                    if($sailboat_imperial_data['j'] != 0){ ?>
                    <th <?= $sailboat_imperial_data['i'] == 0? 'colspan="2"':'' ?>><?php _e('J','sailboat') ?>:</th>
                    <td <?= $sailboat_imperial_data['i'] == 0? 'colspan="2"':'' ?> ><?= $sailboat_data['j'] ?></td>
                    <?php } ?>
                </tr>
                <tr>
                <?php if($sailboat_imperial_data['p'] != 0){ ?>
                    <th <?= $sailboat_imperial_data['e'] == 0? 'colspan="2"':'' ?>><?php _e('P','sailboat') ?>:</th>
                    <td <?= $sailboat_imperial_data['e'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['p'] ?></td>
                    <?php }
                    if($sailboat_imperial_data['e'] != 0){ ?>
                    <th <?= $sailboat_imperial_data['p'] == 0? 'colspan="2"':'' ?>><?php _e('E','sailboat') ?>:</th>
                    <td <?= $sailboat_imperial_data['p'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['e'] ?></td>
                    <?php } ?>
                </tr>
                <tr>
                <?php if($sailboat_imperial_data['py'] != 0){ ?>
                    <th <?= $sailboat_imperial_data['ey'] == 0? 'colspan="2"':'' ?>><?php _e('PY','sailboat') ?>:</th>
                    <td <?= $sailboat_imperial_data['ey'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['py'] ?></td>
                    <?php }
                    if($sailboat_imperial_data['ey'] != 0){ ?>
                    <th <?= $sailboat_imperial_data['py'] == 0? 'colspan="2"':'' ?>><?php _e('EY','sailboat') ?></th>
                    <td <?= $sailboat_imperial_data['py'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['ey'] ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <th <?= $sailboat_imperial_data['isp'] == 0? 'colspan="2"':'' ?>><?php _e('SPL/TPS','sailboat') ?>:</th>
                    <td <?= $sailboat_imperial_data['isp'] == 0? 'colspan="2"':'' ?>>13.12 ft / 4.00 m</td>
                    <?php if($sailboat_imperial_data['isp'] != 0){ ?>
                    <th><?php _e('ISP','sailboat') ?>:</th>
                    <td><?= $sailboat_data['isp'] ?></td>
                    <?php } ?>
                </tr>
                <tr>
                <?php if($sailboat_imperial_data['SAFore'] != 0){ ?>
                    <th <?= $sailboat_imperial_data['SAMain'] == 0? 'colspan="2"':'' ?>><?php _e('S.A. Fore','sailboat') ?>:</th>
                    <td <?= $sailboat_imperial_data['SAMain'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['SAFore'] ?></td>
                    <?php }
                    if($sailboat_imperial_data['SAMain'] != 0){ ?>
                    <th <?= $sailboat_imperial_data['SAFore'] == 0? 'colspan="2"':'' ?>><?php _e('S.A. Main','sailboat') ?>:</th>
                    <td <?= $sailboat_imperial_data['SAFore'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['SAMain'] ?></td>
                    <?php } ?>
                </tr>
                <tr>
                <?php if($sailboat_imperial_data['SATotal'] != 0){ ?>
                    <th <?= $sailboat_imperial_data['Displ_calc'] == 0? 'colspan="2"':'' ?>><?php _e('S.A. Total (100% Fore + Main Triangles)','sailboat') ?>:</th>
                    <td <?= $sailboat_imperial_data['Displ_calc'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['SATotal'] ?></td>
                    <?php }
                    if($sailboat_imperial_data['Displ_calc'] != 0){ ?>
                    <th <?= $sailboat_imperial_data['SATotal'] == 0? 'colspan="2"':'' ?>><?php _e('S.A./Displ. (calc.)','sailboat') ?>:</th>
                    <td <?= $sailboat_imperial_data['SATotal'] == 0? 'colspan="2"':'' ?>><?= $sailboat_data['Displ_calc'] ?></td>
                    <?php } ?>
                </tr>
                <tr>
                <?php if($sailboat_imperial_data['EstForestayLen'] != 0){ ?>
                    <th colspan="2"><?php _e('Est. Forestay Length','sailboat') ?>:</th>
                    <td colspan="2" ><?= $sailboat_data['EstForestayLen'] ?></td>
                    
                    
                <?php } ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php } ?>

    <!-- Sailboat Links -->
    <?php if($sailboat_term_data['designers'] || $sailboat_term_data['builders'] || $sailboat_term_data['associations']
    || $sailboat_term_data['products']){?>
    <div class="spec">
        <h4><?php _e('Sailboat Organizations','sailboat') ?></h4>
        <div class="spec-bord">
            <table class="table">
                <tbody class="table-light">
                    <tr>
                    <?php if($sailboat_term_data['designers']){?>
                        <th colspan="1"><?php _e('Designer','sailboat') ?>:</th>
                        <td><span class="<?= $designers_text_class ?>"><?= $sailboat_term_data['designers'] ?></span></td>
                        <?php }?>
                    </tr>
                    <tr>
                    <?php if($sailboat_term_data['builders']){?>
                        <th colspan="1"><?php _e('Builders','sailboat') ?>:</th>
                        <td><span class="<?= $builders_text_class ?>"><?= $sailboat_term_data['builders'] ?></span></td>
                        <?php }?>
                    </tr>
                    <tr>
                    <?php if($sailboat_term_data['associations']){?>
                        <th colspan="1"><?php _e('Associations','sailboat') ?>:</th>
                        <td><span class="<?= $associations_text_class ?>"><?= $sailboat_term_data['associations'] ?></span></td>
                        <?php }?>
                    </tr>
                    <tr>
                        <?php if($sailboat_term_data['products']){?>
                        <th><?php _e('Products','sailboat') ?>:</th>
                        <td><span class="<?= $products_text_class ?>"><?= $sailboat_term_data['products'] ?></span></td>
                        <?php }?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php }?>
    <?php if($listing_id){ ?>
        <div class="spec">
            <h4><?php _e('Sailboat Links', 'sailboat'); ?></h4>
            <div class="spec-bord">
                <table class="table">
                    <tbody class="table-light">
                        <?php 
                        include get_stylesheet_directory() . '/templates/general/sailboat/sailboat-designer-row.php';
                        include get_stylesheet_directory() . '/templates/general/sailboat/sailboat-builder-row.php';
                        include get_stylesheet_directory() . '/templates/general/sailboat/sailboat-association-row.php';
                        include get_stylesheet_directory() . '/templates/general/sailboat/sailboat-dealer-row.php';
                        include get_stylesheet_directory() . '/templates/general/sailboat/sailboat-product-row.php';
                        include get_stylesheet_directory() . '/templates/general/sailboat/sailboat-realted-sailboats-row.php';
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
    <?php
    if ($post->post_content) {
        ?>
        <div class="spec">
            <h4><?php _e('Additional Notes', 'sailboat') ?></h4>
            <div class="spec-bord">
                <div class="spec-notes">
                    <?php echo nl2br($post->post_content); ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>